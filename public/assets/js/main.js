const notices = [
  'UG/PG Admission 2026 application window opened via CAP integration.',
  'Semester VI model examination timetable published for April 2026.',
  'NSS unit wins University-level recognition for 2025-26 social outreach.',
  'M.Sc. Food Science rank holders honored in academic excellence ceremony.',
  'Scholarship verification camp scheduled on campus auditorium this Friday.'
];

const THEME_KEY = 'site_theme';

const initTheme = () => {
  const root = document.documentElement;
  const savedTheme = localStorage.getItem(THEME_KEY);
  const preferredTheme = savedTheme === 'dark' || savedTheme === 'nude' ? savedTheme : 'nude';
  root.setAttribute('data-theme', preferredTheme);

  const setThemeLabel = (theme) => {
    const nextLabel = theme === 'dark' ? 'Nude Mode' : 'Dark Mode';
    const targets = [document.getElementById('theme-toggle'), document.getElementById('theme-toggle-mobile')];
    targets.forEach((button) => {
      if (!button) return;
      button.textContent = nextLabel;
      button.setAttribute('aria-label', `Switch to ${nextLabel}`);
    });
  };

  const toggleTheme = () => {
    const current = root.getAttribute('data-theme') === 'dark' ? 'dark' : 'nude';
    const next = current === 'dark' ? 'nude' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem(THEME_KEY, next);
    setThemeLabel(next);
  };

  [document.getElementById('theme-toggle'), document.getElementById('theme-toggle-mobile')].forEach((button) => {
    if (!button) return;
    button.addEventListener('click', toggleTheme);
  });

  setThemeLabel(preferredTheme);
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

const initRevealAnimations = () => {
  const targets = Array.from(
    document.querySelectorAll(
      'main > header, main section, main section > article, main section > aside, main section > div, main .stat-card, main .feature-card, main .panel-card'
    )
  );

  if (!targets.length) return;

  document.body.classList.add('motion-enabled');

  targets.forEach((target, index) => {
    if (target.closest('.hero-overlay') || target.hasAttribute('data-no-reveal')) {
      return;
    }

    const dir = index % 3 === 0 ? 'reveal-left' : index % 3 === 1 ? 'reveal-right' : 'reveal-bottom';
    target.classList.add('reveal-on-scroll', dir);
  });

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        obs.unobserve(entry.target);
      });
    },
    { threshold: 0.16, rootMargin: '0px 0px -6% 0px' }
  );

  document.querySelectorAll('.reveal-on-scroll').forEach((element) => observer.observe(element));

  // Fallback: ensure nothing remains hidden due to observer edge cases.
  window.setTimeout(() => {
    document.querySelectorAll('.reveal-on-scroll:not(.is-visible)').forEach((element) => {
      element.classList.add('is-visible');
    });
  }, 1400);
};

const initPageTransitions = () => {
  document.body.classList.add('page-enter');
  requestAnimationFrame(() => {
    document.body.classList.add('page-ready');
  });

  const links = document.querySelectorAll('a[href]');
  links.forEach((link) => {
    link.addEventListener('click', (event) => {
      const href = link.getAttribute('href') || '';
      const target = link.getAttribute('target');
      const isModifier = event.metaKey || event.ctrlKey || event.shiftKey || event.altKey;
      const isExternal = href.startsWith('http') && !href.includes(window.location.host);
      const isAnchorOnly = href.startsWith('#');

      if (isModifier || isExternal || isAnchorOnly || target === '_blank' || link.hasAttribute('download')) {
        return;
      }

      if (href.startsWith('javascript:') || href === '' || href === window.location.pathname) {
        return;
      }

      event.preventDefault();
      document.body.classList.add('page-exit');
      setTimeout(() => {
        window.location.href = href;
      }, 220);
    });
  });
};

document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  mountLayout();
  mountTicker();
  initHeroSlider();
  animateCounters();
  initFilters();
  initActivePanelLinks();
  initRevealAnimations();
  initPageTransitions();
});
