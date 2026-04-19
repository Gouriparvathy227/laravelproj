import fs from 'node:fs';
import path from 'node:path';
import process from 'node:process';
import { execSync } from 'node:child_process';

const baseUrl = process.env.E2E_BASE_URL ?? 'http://127.0.0.1:8000';
const outDir = path.resolve('test-artifacts', 'e2e');
const jsonOut = path.join(outDir, 'endpoint-probe.json');
const csvOut = path.join(outDir, 'endpoint-probe.csv');
const mdOut = path.join(outDir, 'endpoint-probe.md');

fs.mkdirSync(outDir, { recursive: true });

const rawRoutes = execSync('php artisan route:list --json --except-vendor', {
  encoding: 'utf8',
  stdio: ['ignore', 'pipe', 'pipe'],
});
const routes = JSON.parse(rawRoutes);

const paramFallbacks = {
  slug: 'sample-slug',
  token: 'sample-token',
  hash: 'sample-hash',
  id: '1',
  department: '1',
  faculty: '1',
  inquiry: '1',
};

function pickMethod(methodField) {
  const parts = String(methodField)
    .split('|')
    .map((part) => part.trim())
    .filter(Boolean);
  if (parts.includes('GET')) return 'GET';
  if (parts.includes('POST')) return 'POST';
  if (parts.includes('PATCH')) return 'PATCH';
  if (parts.includes('PUT')) return 'PUT';
  if (parts.includes('DELETE')) return 'DELETE';
  return parts[0] ?? 'GET';
}

function materializeUri(uri) {
  if (uri === '/' || uri === '') return '/';
  let normalized = uri.startsWith('/') ? uri : `/${uri}`;
  normalized = normalized.replace(/\{([^}]+)\}/g, (_all, rawName) => {
    const cleanName = String(rawName).replace(/\?$/, '');
    return paramFallbacks[cleanName] ?? '1';
  });
  return normalized;
}

function statusNote(status, method, routeUri) {
  if (status === 419) return 'CSRF token required for state-changing web route.';
  if (status === 302 || status === 301) return 'Redirect (auth/guest middleware likely active).';
  if (status === 404 && routeUri.includes('{')) return 'Placeholder parameter likely does not exist in DB.';
  if (status === 405) return `Method ${method} not allowed for concrete URL.`;
  return '';
}

function csvEsc(value) {
  const text = String(value ?? '');
  const escaped = text.replaceAll('"', '""');
  return `"${escaped}"`;
}

const rows = [];

for (const route of routes) {
  const method = pickMethod(route.method);
  const concretePath = materializeUri(route.uri);
  const url = `${baseUrl}${concretePath}`;

  let status = null;
  let ok = false;
  let error = '';
  let note = '';

  try {
    const response = await fetch(url, {
      method,
      redirect: 'manual',
      headers: {
        Accept: 'text/html,application/json;q=0.9,*/*;q=0.8',
      },
    });
    status = response.status;
    ok = response.status >= 200 && response.status < 400;
    note = statusNote(status, method, route.uri);
  } catch (err) {
    error = err instanceof Error ? err.message : String(err);
  }

  rows.push({
    method: route.method,
    probe_method: method,
    uri: route.uri,
    probed_url: url,
    name: route.name ?? '',
    middleware: Array.isArray(route.middleware) ? route.middleware.join('|') : String(route.middleware ?? ''),
    status,
    ok,
    note,
    error,
  });
}

const statusCounts = rows.reduce((acc, row) => {
  const key = row.status === null ? 'null' : String(row.status);
  acc[key] = (acc[key] ?? 0) + 1;
  return acc;
}, {});

fs.writeFileSync(
  jsonOut,
  JSON.stringify(
    {
      baseUrl,
      generated_at: new Date().toISOString(),
      total_routes: rows.length,
      status_counts: statusCounts,
      rows,
    },
    null,
    2
  ),
  'utf8'
);

const csvHeader = [
  'method',
  'probe_method',
  'uri',
  'probed_url',
  'name',
  'middleware',
  'status',
  'ok',
  'note',
  'error',
];
const csvLines = [csvHeader.join(',')];
for (const row of rows) {
  csvLines.push(
    [
      row.method,
      row.probe_method,
      row.uri,
      row.probed_url,
      row.name,
      row.middleware,
      row.status ?? '',
      row.ok,
      row.note,
      row.error,
    ]
      .map(csvEsc)
      .join(',')
  );
}
fs.writeFileSync(csvOut, csvLines.join('\n'), 'utf8');

const mdLines = [];
mdLines.push(`# Endpoint Probe Report`);
mdLines.push(`- Generated: ${new Date().toISOString()}`);
mdLines.push(`- Base URL: ${baseUrl}`);
mdLines.push(`- Total routes: ${rows.length}`);
mdLines.push(`- Status counts: ${JSON.stringify(statusCounts)}`);
mdLines.push('');
mdLines.push('| Method | Probe | URI | Status | Name | Note |');
mdLines.push('|---|---|---|---:|---|---|');
for (const row of rows) {
  mdLines.push(
    `| ${row.method} | ${row.probe_method} | ${row.uri} | ${row.status ?? ''} | ${row.name} | ${row.note || row.error} |`
  );
}
fs.writeFileSync(mdOut, mdLines.join('\n'), 'utf8');

console.log(`Endpoint probe completed. Routes: ${rows.length}`);
console.log(`JSON report: ${jsonOut}`);
console.log(`CSV report: ${csvOut}`);
console.log(`Markdown report: ${mdOut}`);
