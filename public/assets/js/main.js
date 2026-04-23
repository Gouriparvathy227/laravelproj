const notices = [
  "UG/PG Admission 2026 application window opened via CAP integration.",
  "Semester VI model examination timetable published for April 2026.",
  "NSS unit wins University-level recognition for 2025-26 social outreach.",
  "M.Sc. Food Science rank holders honored in academic excellence ceremony.",
  "Scholarship verification camp scheduled on campus auditorium this Friday."
];

const mountLayout = () => {
  const mobileMenuBtn = document.getElementById("mobile-menu-btn");
  const mobileNav = document.getElementById("mobile-nav-panel");

  if (mobileMenuBtn && mobileNav) {
    const closeMenu = () => {
      mobileNav.classList.add("hidden");
      mobileMenuBtn.setAttribute("aria-expanded", "false");
    };

    const openMenu = () => {
      mobileNav.classList.remove("hidden");
      mobileMenuBtn.setAttribute("aria-expanded", "true");
    };

    mobileMenuBtn.addEventListener("click", () => {
      const isOpen = !mobileNav.classList.contains("hidden");
      if (isOpen) {
        closeMenu();
      } else {
        openMenu();
      }
    });

    mobileNav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });

    document.addEventListener("click", (event) => {
      if (mobileNav.classList.contains("hidden")) return;
      const target = event.target;
      if (!(target instanceof Element)) return;
      if (target.closest("#mobile-nav-panel") || target.closest("#mobile-menu-btn")) return;
      closeMenu();
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") {
        closeMenu();
      }
    });
  }

  const yearEl = document.getElementById("year");
  if (yearEl) {
    yearEl.textContent = String(new Date().getFullYear());
  }
};

const mountTicker = () => {
  const ticker = document.querySelector("[data-notice-ticker]");
  if (!ticker) return;

  const repeated = notices.concat(notices);
  ticker.innerHTML = repeated
    .map((item) => `<span class="inline-flex items-center gap-2"><span class="text-amber-400">*</span><span>${item}</span></span>`)
    .join("");
};

const animateCounters = () => {
  const counters = document.querySelectorAll("[data-count]");
  if (!counters.length) return;

  const animate = (el) => {
    const target = Number(el.dataset.count || 0);
    const suffix = el.dataset.suffix || "";
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
          entry.target.dataset.done = "true";
        }
      });
    },
    { threshold: 0.45 }
  );

  counters.forEach((counter) => observer.observe(counter));
};

const initHeroSlider = () => {
  const slides = Array.from(document.querySelectorAll("[data-hero-slide]"));
  if (slides.length <= 1) return;

  const titleEl = document.querySelector("[data-hero-title]");
  const captionEl = document.querySelector("[data-hero-caption]");
  const dots = Array.from(document.querySelectorAll("[data-hero-dot]"));
  let currentIndex = 0;
  let timerId = null;

  const showSlide = (nextIndex) => {
    currentIndex = nextIndex;

    slides.forEach((slide, index) => {
      slide.classList.toggle("opacity-100", index === currentIndex);
      slide.classList.toggle("opacity-0", index !== currentIndex);
      slide.setAttribute("aria-hidden", String(index !== currentIndex));
    });

    if (titleEl) {
      titleEl.textContent = slides[currentIndex].dataset.slideTitle || titleEl.textContent;
    }

    if (captionEl) {
      captionEl.textContent = slides[currentIndex].dataset.slideCaption || captionEl.textContent;
    }

    dots.forEach((dot, index) => {
      dot.classList.toggle("bg-white", index === currentIndex);
      dot.classList.toggle("bg-white/40", index !== currentIndex);
    });
  };

  const startAutoPlay = () => {
    if (timerId) return;
    timerId = window.setInterval(() => {
      const next = (currentIndex + 1) % slides.length;
      showSlide(next);
    }, 5000);
  };

  const stopAutoPlay = () => {
    if (!timerId) return;
    window.clearInterval(timerId);
    timerId = null;
  };

  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const next = Number(dot.dataset.heroDot || "0");
      showSlide(next);
      startAutoPlay();
    });
  });

  const heroSection = slides[0].closest("section");
  if (heroSection) {
    heroSection.addEventListener("mouseenter", stopAutoPlay);
    heroSection.addEventListener("mouseleave", startAutoPlay);
  }

  document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
      stopAutoPlay();
    } else {
      startAutoPlay();
    }
  });

  startAutoPlay();
};

const initFilters = () => {
  const groups = document.querySelectorAll("[data-filter-group]");
  groups.forEach((group) => {
    const controls = group.querySelectorAll("[data-filter-control]");
    const items = group.querySelectorAll("[data-filter-item]");

    controls.forEach((control) => {
      control.addEventListener("click", () => {
        const value = control.dataset.filterControl;
        controls.forEach((btn) => btn.classList.remove("filter-active"));
        control.classList.add("filter-active");

        items.forEach((item) => {
          const itemValue = item.dataset.filterItem;
          if (value === "all" || itemValue.split(",").includes(value)) {
            item.classList.remove("is-hidden");
          } else {
            item.classList.add("is-hidden");
          }
        });
      });
    });
  });
};

const initActivePanelLinks = () => {
  const sideLinks = document.querySelectorAll("[data-panel-link]");
  if (!sideLinks.length) return;

  const currentPath = window.location.pathname.replace(/\/+$/, "");
  sideLinks.forEach((link) => {
    const href = link.getAttribute("href");
    if (!href) return;
    const linkPath = href.replace(/\/+$/, "");
    if (currentPath === linkPath || currentPath.endsWith(linkPath)) {
      link.classList.add("panel-active");
    }
  });
};

const initRevealAnimations = () => {
  const targets = Array.from(
    document.querySelectorAll(
      "[data-reveal], .stat-card, .feature-card, .panel-card, main section > .rounded-2xl, main section > .rounded-xl"
    )
  ).filter((el) => !el.hasAttribute("data-no-reveal"));

  if (!targets.length) return;

  targets.forEach((target) => target.classList.add("reveal-on-scroll"));

  if (!("IntersectionObserver" in window)) {
    targets.forEach((target) => target.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("is-visible");
        obs.unobserve(entry.target);
      });
    },
    { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
  );

  targets.forEach((target) => observer.observe(target));

  window.setTimeout(() => {
    document.querySelectorAll(".reveal-on-scroll:not(.is-visible)").forEach((el) => {
      el.classList.add("is-visible");
    });
  }, 2200);
};

const mountScrollTop = () => {
  const button = document.getElementById("scroll-top-btn");
  if (!button) return;

  const setState = () => {
    button.classList.toggle("is-visible", window.scrollY > 420);
  };

  setState();
  window.addEventListener("scroll", setState, { passive: true });

  button.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
};

document.addEventListener("DOMContentLoaded", () => {
  mountLayout();
  mountTicker();
  initHeroSlider();
  animateCounters();
  initFilters();
  initActivePanelLinks();
  initRevealAnimations();
  mountScrollTop();
});
