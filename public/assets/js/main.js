const notices = [
  'UG/PG Admission 2026 application window opened via CAP integration.',
  'Semester VI model examination timetable published for April 2026.',
  'NSS unit wins University-level recognition for 2025-26 social outreach.',
  'M.Sc. Food Science rank holders honored in academic excellence ceremony.',
  'Scholarship verification camp scheduled on campus auditorium this Friday.'
];

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

const initHeroSlider = () => {
  const slides = Array.from(document.querySelectorAll('[data-hero-slide]'));
  if (slides.length <= 1) return;

  const titleEl = document.querySelector('[data-hero-title]');
  const captionEl = document.querySelector('[data-hero-caption]');
  const dots = Array.from(document.querySelectorAll('[data-hero-dot]'));
  let currentIndex = 0;

  const showSlide = (nextIndex) => {
    currentIndex = nextIndex;

    slides.forEach((slide, index) => {
      slide.classList.toggle('opacity-100', index === currentIndex);
      slide.classList.toggle('opacity-0', index !== currentIndex);
      slide.setAttribute('aria-hidden', String(index !== currentIndex));
    });

    if (titleEl) {
      titleEl.textContent = slides[currentIndex].dataset.slideTitle || titleEl.textContent;
    }

    if (captionEl) {
      captionEl.textContent = slides[currentIndex].dataset.slideCaption || captionEl.textContent;
    }

    dots.forEach((dot, index) => {
      dot.classList.toggle('bg-white', index === currentIndex);
      dot.classList.toggle('bg-white/40', index !== currentIndex);
    });
  };

  dots.forEach((dot) => {
    dot.addEventListener('click', () => {
      const next = Number(dot.dataset.heroDot || '0');
      showSlide(next);
    });
  });

  setInterval(() => {
    const next = (currentIndex + 1) % slides.length;
    showSlide(next);
  }, 5000);
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
  initHeroSlider();
  animateCounters();
  initFilters();
  initActivePanelLinks();
});
