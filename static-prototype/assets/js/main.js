const notices = [
  'UG/PG Admission 2026 application window opened via CAP integration.',
  'Semester VI model examination timetable published for April 2026.',
  'NSS unit wins University-level recognition for 2025-26 social outreach.',
  'M.Sc. Food Science rank holders honored in academic excellence ceremony.',
  'Scholarship verification camp scheduled on campus auditorium this Friday.'
];

const admissionStatusSeed = {
  SGC2026001: { status: 'Shortlisted', remarks: 'Report for document verification on 20 May 2026.' },
  SGC2026002: { status: 'Admitted', remarks: 'Seat confirmed. Fee payment link sent to your email.' },
  SGC2026003: { status: 'Pending', remarks: 'Application under scrutiny by admissions committee.' },
  SGC2026004: { status: 'Rejected', remarks: 'Eligibility criteria not met for selected program.' }
};

const statusClassMap = {
  Admitted: 'status-box status-box-green',
  Shortlisted: 'status-box status-box-blue',
  Pending: 'status-box status-box-amber',
  Rejected: 'status-box status-box-red'
};

const headerTemplate = (page) => `
  <div class="text-white text-xs md:text-sm" style="background-color: var(--sgc-navy);">
    <div class="mx-auto max-w-7xl px-4 py-2 flex flex-wrap items-center justify-between gap-2">
      <p>Affiliated to Mahatma Gandhi University, Kottayam | NAAC A++ Accredited</p>
      <div class="flex items-center gap-4">
        <a class="hover:text-amber-300 focus-ring" href="mailto:info@sgcaruvithura.ac.in">info@sgcaruvithura.ac.in</a>
        <span>+91 4822 273 235</span>
      </div>
    </div>
  </div>
  <header class="bg-white/95 backdrop-blur border-b border-slate-200 sticky top-0 z-40">
    <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between gap-4">
      <a href="/index.html" class="flex items-center gap-3 focus-ring">
        <div class="w-11 h-11 rounded-full text-white grid place-items-center font-semibold" style="background-color: var(--sgc-navy);">SG</div>
        <div>
          <p class="font-heading text-lg leading-tight" style="color: var(--sgc-navy);">St. George's College Aruvithura</p>
          <p class="text-xs text-slate-500">Since 1965 | Erattupetta, Kerala</p>
        </div>
      </a>
      <button id="mobile-menu-btn" class="md:hidden px-3 py-2 border border-slate-300 rounded-lg focus-ring" aria-controls="site-nav" aria-expanded="false">Menu</button>
      <nav id="site-nav" class="hidden md:flex items-center gap-5 text-sm font-medium" aria-label="Primary">
        ${[
          { href: '/index.html', label: 'Home', key: 'home' },
          { href: '/pages/about.html', label: 'About', key: 'about' },
          { href: '/pages/academics.html', label: 'Academics', key: 'academics' },
          { href: '/pages/departments.html', label: 'Departments', key: 'departments' },
          { href: '/pages/admissions.html', label: 'Admissions', key: 'admissions' },
          { href: '/pages/placements.html', label: 'Placements', key: 'placements' },
          { href: '/pages/facilities.html', label: 'Facilities', key: 'facilities' },
          { href: '/pages/notices-events.html', label: 'Notices', key: 'notices' },
          { href: '/pages/gallery.html', label: 'Gallery', key: 'gallery' },
          { href: '/pages/contact.html', label: 'Contact', key: 'contact' }
        ]
          .map(
            (link) => `<a href="${link.href}" class="focus-ring ${
              page === link.key ? 'nav-active' : 'nav-link'
            }">${link.label}</a>`
          )
          .join('')}
        <a href="/pages/admissions-apply.html" class="nav-apply focus-ring">Quick Apply</a>
      </nav>
    </div>
    <nav id="mobile-nav-panel" class="md:hidden hidden border-t border-slate-200 px-4 py-3 bg-white" aria-label="Mobile Primary">
      <div class="grid gap-2 text-sm">
        ${[
          ['/index.html', 'Home'],
          ['/pages/about.html', 'About'],
          ['/pages/academics.html', 'Academics'],
          ['/pages/departments.html', 'Departments'],
          ['/pages/admissions.html', 'Admissions'],
          ['/pages/placements.html', 'Placements'],
          ['/pages/facilities.html', 'Facilities'],
          ['/pages/notices-events.html', 'Notices'],
          ['/pages/gallery.html', 'Gallery'],
          ['/pages/contact.html', 'Contact'],
          ['/pages/admissions-apply.html', 'Apply Online']
        ]
          .map(([href, label]) => `<a class="px-2 py-2 rounded hover:bg-slate-100 focus-ring" href="${href}">${label}</a>`)
          .join('')}
      </div>
    </nav>
  </header>
`;

const footerTemplate = `
  <footer class="text-slate-100 mt-16" style="background-color: var(--sgc-navy);">
    <div class="mx-auto max-w-7xl px-4 py-12 grid md:grid-cols-4 gap-8">
      <div>
        <h3 class="font-heading text-xl mb-3">St. George's College Aruvithura</h3>
        <p class="text-sm leading-relaxed">Government-aided minority institution established in 1965, serving 2,100+ students with NAAC A++ excellence.</p>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Quick Links</h4>
        <ul class="space-y-2 text-sm">
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/admissions.html">Admissions</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/academics.html">Programs & Syllabus</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/notices-events.html">Notices & Events</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/contact.html">Contact Directory</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Portals</h4>
        <ul class="space-y-2 text-sm">
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/student/dashboard.html">Student Portal</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/faculty-portal/dashboard.html">Faculty Portal</a></li>
          <li><a class="hover:text-amber-300 focus-ring" href="/pages/admin/dashboard.html">Admin Panel</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-semibold mb-3 text-amber-300">Contact</h4>
        <p class="text-sm">Aruvithura, Erattupetta, Kottayam District, Kerala 686122</p>
        <p class="text-sm mt-2">Phone: +91 4822 273 235</p>
        <p class="text-sm">Email: info@sgcaruvithura.ac.in</p>
      </div>
    </div>
    <div class="border-t border-white/20 py-4 text-center text-xs text-slate-300">
      <p>&copy; <span id="year"></span> St. George's College Aruvithura. All rights reserved.</p>
    </div>
  </footer>
`;

const mountLayout = () => {
  const page = document.body.dataset.page || '';
  const headerHost = document.getElementById('site-header');
  const footerHost = document.getElementById('site-footer');

  if (headerHost) {
    headerHost.innerHTML = headerTemplate(page);
  }
  if (footerHost) {
    footerHost.innerHTML = footerTemplate;
  }

  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileNav = document.getElementById('mobile-nav-panel');
  if (mobileMenuBtn && mobileNav) {
    mobileMenuBtn.addEventListener('click', () => {
      const isOpen = !mobileNav.classList.contains('hidden');
      mobileNav.classList.toggle('hidden');
      mobileMenuBtn.setAttribute('aria-expanded', String(!isOpen));
    });
  }

  const yearEl = document.getElementById('year');
  if (yearEl) {
    yearEl.textContent = String(new Date().getFullYear());
  }
};

const mountTicker = () => {
  const ticker = document.querySelector('[data-notice-ticker]');
  if (!ticker) return;

  const repeated = notices.concat(notices);
  ticker.innerHTML = repeated
    .map((item) => `<span class="inline-flex items-center gap-2"><span class="text-amber-400">*</span><span>${item}</span></span>`)
    .join('');
};

const animateCounters = () => {
  const counters = document.querySelectorAll('[data-count]');
  if (!counters.length) return;

  const animate = (el) => {
    const target = Number(el.dataset.count || 0);
    const suffix = el.dataset.suffix || '';
    const duration = 1300;
    const start = performance.now();

    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = Math.floor(target * eased);
      el.textContent = `${value.toLocaleString()}${suffix}`;
      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };

    requestAnimationFrame(step);
  };

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !entry.target.dataset.done) {
          animate(entry.target);
          entry.target.dataset.done = 'true';
        }
      });
    },
    { threshold: 0.45 }
  );

  counters.forEach((counter) => observer.observe(counter));
};

const initFilters = () => {
  const groups = document.querySelectorAll('[data-filter-group]');
  groups.forEach((group) => {
    const controls = group.querySelectorAll('[data-filter-control]');
    const items = group.querySelectorAll('[data-filter-item]');

    controls.forEach((control) => {
      control.addEventListener('click', () => {
        const value = control.dataset.filterControl;
        controls.forEach((btn) => btn.classList.remove('filter-active'));
        control.classList.add('filter-active');

        items.forEach((item) => {
          const itemValue = item.dataset.filterItem;
          if (value === 'all' || itemValue.split(',').includes(value)) {
            item.classList.remove('is-hidden');
          } else {
            item.classList.add('is-hidden');
          }
        });
      });
    });
  });
};

const initAdmissionApply = () => {
  const form = document.getElementById('admission-apply-form');
  const result = document.getElementById('admission-apply-result');
  if (!form || !result) return;

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const applicationId = `SGC${new Date().getFullYear()}${Math.floor(1000 + Math.random() * 9000)}`;
    result.classList.remove('hidden');
    result.innerHTML = `Application submitted successfully. Your ID is <strong>${applicationId}</strong>. Use it in the status tracker.`;
    form.reset();
    window.scrollTo({ top: result.offsetTop - 120, behavior: 'smooth' });
  });
};

const initAdmissionStatus = () => {
  const form = document.getElementById('admission-status-form');
  const output = document.getElementById('admission-status-result');
  if (!form || !output) return;

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const id = String(document.getElementById('application-id-input').value || '').trim().toUpperCase();

    if (!id) {
      output.className = 'status-box status-box-red';
      output.textContent = 'Please enter an application ID.';
      return;
    }

    const record = admissionStatusSeed[id];
    if (!record) {
      output.className = 'status-box status-box-amber';
      output.textContent = 'No matching application found. Please verify your ID or contact the admissions office.';
      return;
    }

    output.className = statusClassMap[record.status] || 'status-box status-box-blue';
    output.innerHTML = `<p><strong>Status:</strong> ${record.status}</p><p class="mt-1"><strong>Remarks:</strong> ${record.remarks}</p>`;
  });
};

const initActivePanelLinks = () => {
  const sideLinks = document.querySelectorAll('[data-panel-link]');
  if (!sideLinks.length) return;
  const current = window.location.pathname;
  sideLinks.forEach((link) => {
    if (current.endsWith(link.getAttribute('href'))) {
      link.classList.add('panel-active');
    }
  });
};

document.addEventListener('DOMContentLoaded', () => {
  mountLayout();
  mountTicker();
  animateCounters();
  initFilters();
  initAdmissionApply();
  initAdmissionStatus();
  initActivePanelLinks();
});
