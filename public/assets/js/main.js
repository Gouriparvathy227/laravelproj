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

const mountLayout = () => {
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
