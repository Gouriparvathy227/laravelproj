import fs from 'node:fs';
import path from 'node:path';
import process from 'node:process';
import { chromium } from '@playwright/test';

const baseUrl = process.env.E2E_BASE_URL ?? 'http://127.0.0.1:8000';
const outDir = path.resolve('test-artifacts', 'e2e');
const screenshotDir = path.join(outDir, 'screenshots');
const videoDir = path.join(outDir, 'video');
const uploadDir = path.join(outDir, 'uploads');
const tracePath = path.join(outDir, 'whitebox-trace.zip');
const actionLogPath = path.join(outDir, 'browser-action-log.md');
const resultPath = path.join(outDir, 'browser-result.json');

for (const dir of [outDir, screenshotDir, videoDir, uploadDir]) {
  fs.mkdirSync(dir, { recursive: true });
}

const actionLog = [];
const consoleErrors = [];

const now = new Date();
const runStamp = now.toISOString().replace(/[:.]/g, '-');
const uniqueSuffix = `${Date.now()}`.slice(-6);
const contactEmail = `whitebox.${runStamp}@example.com`;

function logStep(step, detail) {
  actionLog.push(`## ${step}`);
  actionLog.push(`- ${detail}`);
}

function createTinyPdf(filePath, label) {
  const content = `%PDF-1.1
1 0 obj
<< /Type /Catalog /Pages 2 0 R >>
endobj
2 0 obj
<< /Type /Pages /Kids [3 0 R] /Count 1 >>
endobj
3 0 obj
<< /Type /Page /Parent 2 0 R /MediaBox [0 0 300 144] /Contents 4 0 R >>
endobj
4 0 obj
<< /Length 49 >>
stream
BT /F1 12 Tf 20 80 Td (${label}) Tj ET
endstream
endobj
trailer
<< /Root 1 0 R >>
%%EOF
`;
  fs.writeFileSync(filePath, content, 'utf8');
}

let browser;
let context;
let page;
let appId = null;
let finalVideoPath = null;

try {
  browser = await chromium.launch({ headless: true });
  context = await browser.newContext({
    viewport: { width: 1440, height: 900 },
    recordVideo: { dir: videoDir, size: { width: 1440, height: 900 } },
  });

  await context.tracing.start({ screenshots: true, snapshots: true, sources: true });

  page = await context.newPage();
  page.on('console', (msg) => {
    if (msg.type() === 'error') {
      consoleErrors.push(msg.text());
    }
  });
  page.on('pageerror', (err) => {
    consoleErrors.push(err.message);
  });

  await page.goto(`${baseUrl}/`, { waitUntil: 'networkidle' });
  logStep('Home Loaded', `Opened ${page.url()}`);
  await page.screenshot({ path: path.join(screenshotDir, '01-home.png'), fullPage: true });

  await page.mouse.wheel(0, 1200);
  await page.waitForTimeout(600);
  logStep('Mouse Scroll', 'Scrolled down on home page with mouse wheel.');
  await page.screenshot({ path: path.join(screenshotDir, '02-home-after-scroll.png'), fullPage: true });

  await page.goto(`${baseUrl}/contact`, { waitUntil: 'networkidle' });
  await page.click('#name');
  await page.keyboard.type(`White Box Tester ${uniqueSuffix}`);
  await page.keyboard.press('Tab');
  await page.keyboard.type(contactEmail);
  await page.keyboard.press('Tab');
  await page.keyboard.type('9999988888');
  logStep('Keyboard Input', 'Typed contact form fields using keyboard Tab navigation.');

  await page.selectOption('#topic', 'Admissions');
  await page.click('#message');
  await page.keyboard.type('Automated white-box E2E test inquiry with keyboard and mouse interactions.');
  await page.click('input[name="captcha_confirmed"]');
  await page.click('button[type="submit"]');
  await page.waitForLoadState('networkidle');
  await page.waitForSelector('text=Message submitted successfully', { timeout: 15000 });
  logStep('Contact Form Submit', 'Submitted contact inquiry successfully.');
  await page.screenshot({ path: path.join(screenshotDir, '03-contact-success.png'), fullPage: true });

  const marksheetPdf = path.join(uploadDir, 'marksheet.pdf');
  const tcPdf = path.join(uploadDir, 'tc.pdf');
  createTinyPdf(marksheetPdf, 'Marksheet Test PDF');
  createTinyPdf(tcPdf, 'TC Test PDF');

  await page.goto(`${baseUrl}/admissions/apply`, { waitUntil: 'networkidle' });
  await page.click('#full_name');
  await page.keyboard.type(`Applicant ${uniqueSuffix}`);
  await page.fill('#dob', '2005-04-12');
  await page.selectOption('#gender', 'Male');
  await page.selectOption('#category', 'General');
  await page.fill('#religion', 'Christian');
  await page.fill('#phone', '9876543210');
  await page.fill('#email', contactEmail);
  await page.fill('#address', 'White box test address, Aruvithura');
  await page.fill('#school', 'St Georges HSS');
  await page.fill('#board', 'State Board');
  await page.fill('#pass_year', '2024');
  await page.fill('#subject_combo', 'Physics Chemistry Maths');
  await page.fill('#percentage', '88.5');
  await page.selectOption('#pref1', { label: 'B.Sc. Physics' });
  await page.selectOption('#pref2', { label: 'B.Sc. Botany' });
  await page.selectOption('#pref3', { label: 'B.A. History' });
  await page.setInputFiles('#doc_marksheet', marksheetPdf);
  await page.setInputFiles('#doc_tc', tcPdf);
  await page.check('input[name="declaration_confirmed"]');
  await page.check('input[name="captcha_confirmed"]');
  await page.mouse.wheel(0, 400);
  await page.click('button[type="submit"]');
  await page.waitForLoadState('networkidle');
  await page.waitForSelector('text=Application submitted successfully', { timeout: 15000 });
  logStep('Admissions Submit', 'Submitted admission application with uploaded PDF documents.');
  await page.screenshot({ path: path.join(screenshotDir, '04-admissions-success.png'), fullPage: true });

  const bodyText = await page.locator('body').innerText();
  const match = bodyText.match(/SGC\d{8}/);
  if (match) {
    appId = match[0];
    logStep('Application ID Captured', `Captured generated application id: ${appId}`);
    await page.goto(`${baseUrl}/admissions/status/${appId}`, { waitUntil: 'networkidle' });
    await page.screenshot({ path: path.join(screenshotDir, '05-admission-status.png'), fullPage: true });
  }

  await page.goto(`${baseUrl}/login`, { waitUntil: 'networkidle' });
  await page.click('#email');
  await page.keyboard.type('gouriparvathy32@gmail.com');
  await page.keyboard.press('Tab');
  await page.keyboard.type('Admin@1234');
  await page.click('button:has-text("Log in")');
  await page.waitForURL(/dashboard/, { timeout: 15000 });
  logStep('Admin Login', `Logged in as seeded admin user; landed on ${page.url()}`);
  await page.screenshot({ path: path.join(screenshotDir, '06-after-login.png'), fullPage: true });

  await page.goto(`${baseUrl}/admin/dashboard`, { waitUntil: 'networkidle' });
  await page.screenshot({ path: path.join(screenshotDir, '07-admin-dashboard.png'), fullPage: true });
  logStep('Admin Dashboard', 'Visited admin dashboard endpoint successfully.');

  await page.goto(`${baseUrl}/admin/inquiries`, { waitUntil: 'networkidle' });
  await page.screenshot({ path: path.join(screenshotDir, '08-admin-inquiries.png'), fullPage: true });
  logStep('Admin Inquiries', 'Visited admin inquiries endpoint to verify submitted inquiry visibility.');

  const videoHandle = page.video();
  await page.close();
  await context.tracing.stop({ path: tracePath });
  await context.close();
  await browser.close();

  if (videoHandle) {
    const rawVideoPath = await videoHandle.path();
    finalVideoPath = path.join(videoDir, 'whitebox-flow.webm');
    fs.copyFileSync(rawVideoPath, finalVideoPath);
  }
} catch (error) {
  actionLog.push('## Failure');
  actionLog.push(`- ${error instanceof Error ? error.message : String(error)}`);

  if (context) {
    try {
      await context.tracing.stop({ path: tracePath });
    } catch {}
  }
  if (page) {
    try {
      await page.close();
    } catch {}
  }
  if (context) {
    try {
      await context.close();
    } catch {}
  }
  if (browser) {
    try {
      await browser.close();
    } catch {}
  }

  fs.writeFileSync(actionLogPath, actionLog.join('\n'), 'utf8');
  fs.writeFileSync(
    resultPath,
    JSON.stringify(
      {
        ok: false,
        error: error instanceof Error ? error.message : String(error),
        trace: tracePath,
        screenshots: screenshotDir,
      },
      null,
      2
    ),
    'utf8'
  );
  throw error;
}

actionLog.unshift(`# Browser White-Box Action Log (${new Date().toISOString()})`);
actionLog.push('## Console Errors');
if (consoleErrors.length === 0) {
  actionLog.push('- No browser console errors captured.');
} else {
  for (const err of consoleErrors) {
    actionLog.push(`- ${err}`);
  }
}

fs.writeFileSync(actionLogPath, actionLog.join('\n'), 'utf8');
fs.writeFileSync(
  resultPath,
  JSON.stringify(
    {
      ok: true,
      baseUrl,
      appId,
      trace: tracePath,
      screenshots: screenshotDir,
      video: finalVideoPath,
      consoleErrors,
    },
    null,
    2
  ),
  'utf8'
);

console.log(`Browser white-box flow completed. Results written to ${resultPath}`);
