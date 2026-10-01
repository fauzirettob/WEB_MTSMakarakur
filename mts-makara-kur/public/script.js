/* ============================================================
   MTs MAKARA KUR — Scripts
   ============================================================ */
(function () {
  "use strict";

  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  /* ---------- Mobile menu ---------- */
  const navToggle = $("#navToggle");
  const navLinks = $("#navLinks");

  if (navToggle && navLinks) {
    navToggle.addEventListener("click", () => {
      const open = navLinks.classList.toggle("is-open");
      navToggle.classList.toggle("is-open", open);
      navToggle.setAttribute("aria-expanded", String(open));
      navToggle.setAttribute("aria-label", open ? "Tutup menu" : "Buka menu");
    });

    navLinks.addEventListener("click", (e) => {
      if (e.target.tagName === "A") {
        navLinks.classList.remove("is-open");
        navToggle.classList.remove("is-open");
        navToggle.setAttribute("aria-expanded", "false");
      }
    });
  }

  /* ---------- Navbar shadow on scroll + back to top ---------- */
  const nav = $("#nav");
  const toTop = $("#toTop");

  const onScroll = () => {
    const y = window.scrollY;
    if (nav) nav.classList.toggle("is-scrolled", y > 10);
    if (toTop) toTop.classList.toggle("is-visible", y > 500);
  };
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  /* ---------- Active link based on visible section ---------- */
  const sections = $$("section[id]");
  const linkMap = new Map($$(".nav__links a").map((a) => [a.getAttribute("href"), a]));

  if ("IntersectionObserver" in window && sections.length) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const link = linkMap.get("#" + entry.target.id);
          if (!link) return;
          linkMap.forEach((a) => a.classList.remove("is-active"));
          link.classList.add("is-active");
        });
      },
      { rootMargin: "-45% 0px -50% 0px", threshold: 0 }
    );
    sections.forEach((s) => observer.observe(s));
  }

  /* ---------- Animated statistics ---------- */
  const counters = $$("[data-count]");

  const runCounter = (el) => {
    const target = Number(el.dataset.count) || 0;
    const duration = 1400;
    const start = performance.now();

    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
      el.textContent = Math.round(target * eased).toLocaleString("id-ID");
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  const countInView = () => {
    counters.forEach((el) => {
      if (el.dataset.done || el.getBoundingClientRect().top > window.innerHeight * 0.9) return;
      el.dataset.done = "1";
      runCounter(el);
    });
  };

  if ("IntersectionObserver" in window && counters.length) {
    const counterObserver = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.dataset.done = "1";
          runCounter(entry.target);
          obs.unobserve(entry.target);
        });
      },
      { threshold: 0.4 }
    );
    counters.forEach((el) => counterObserver.observe(el));

    // Jaring pengaman bila observer tidak melapor sama sekali.
    setTimeout(countInView, 2000);
  } else {
    counters.forEach((el) => { el.dataset.done = "1"; runCounter(el); });
  }

  /* ---------- Reveal on scroll ---------- */
  const revealTargets = $$(
    ".section__head, .card, .profil__card, .facility, .org__node, .news__item, .principal, .sambutan__text, .ppdb__text, .form, .contact__item, .contact__map"
  );
  revealTargets.forEach((el) => el.classList.add("reveal"));

  // Hanya elemen yang belum tampil yang diperiksa, agar tiap scroll tetap ringan.
  let pendingReveal = revealTargets.slice();

  const revealInView = () => {
    if (!pendingReveal.length) return;
    pendingReveal = pendingReveal.filter((el) => {
      if (el.getBoundingClientRect().top >= window.innerHeight * 0.92) return true;
      el.classList.add("is-visible");
      return false;
    });
  };

  window.addEventListener("scroll", revealInView, { passive: true });
  window.addEventListener("resize", revealInView, { passive: true });

  if ("IntersectionObserver" in window) {
    const revealObserver = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-visible");
          pendingReveal = pendingReveal.filter((el) => el !== entry.target);
          obs.unobserve(entry.target);
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    revealTargets.forEach((el) => revealObserver.observe(el));
  }

  // Tampilkan apa pun yang sudah berada di layar saat halaman dibuka.
  revealInView();

  /* ---------- PPDB form validation ---------- */
  const form = $("#ppdbForm");
  const success = $("#formSuccess");

  const validators = {
    nama: (v) => (v.trim().length >= 3 ? "" : "Nama minimal 3 karakter."),
    telepon: (v) => (/^(\+62|62|0)8[1-9][0-9]{6,11}$/.test(v.replace(/[\s-]/g, "")) ? "" : "Nomor WhatsApp tidak valid."),
    asal: (v) => (v.trim().length >= 3 ? "" : "Nama sekolah asal minimal 3 karakter."),
  };

  const setFieldError = (input, message) => {
    const field = input.closest(".field");
    const errorEl = message ? field.querySelector(`[data-error-for="${input.name}"]`) : field.querySelector(".error");
    field.classList.toggle("has-error", Boolean(message));
    if (errorEl) errorEl.textContent = message || "";
  };

  const validateField = (input) => {
    const rule = validators[input.name];
    if (!rule) return true;
    const message = rule(input.value);
    setFieldError(input, message);
    return !message;
  };

  if (form) {
    form.addEventListener("input", (e) => {
      const el = e.target;
      if (validators[el.name]) validateField(el);
    });

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const fields = $$("input[name], select[name]", form).filter((el) => validators[el.name]);
      let firstInvalid = null;

      fields.forEach((el) => {
        if (!validateField(el) && !firstInvalid) firstInvalid = el;
      });

      if (firstInvalid) {
        firstInvalid.focus();
        return;
      }

      // Di produksi, kirim data ke backend/Google Form di sini.
      const data = Object.fromEntries(new FormData(form).entries());
      console.info("[PPDB] Pendaftaran terkirim:", data);

      form.reset();
      $$(".field", form).forEach((f) => f.classList.remove("has-error"));
      $$(".error", form).forEach((el) => (el.textContent = ""));
      if (success) {
        success.hidden = false;
        success.scrollIntoView({ behavior: "smooth", block: "nearest" });
        setTimeout(() => { success.hidden = true; }, 8000);
      }
    });
  }

  /* ---------- Lightbox galeri dokumentasi (foto dirender dari database) ---------- */
  const lightbox = $("#lightbox");
  const lightboxImg = $("#lightboxImg");
  const lightboxCaption = $("#lightboxCaption");

  $$("#gallery .gallery__item img").forEach((img) => {
    img.addEventListener("click", () => {
      if (!lightbox) return;
      lightboxImg.src = img.src;
      lightboxImg.alt = img.alt;
      lightboxCaption.textContent = img.dataset.caption || "";
      lightbox.hidden = false;
      document.body.style.overflow = "hidden";
      $("#lightboxClose").focus();
    });
  });

  if (lightbox) {
    $("#lightboxClose").addEventListener("click", () => {
      lightbox.hidden = true;
      lightboxImg.src = "";
      document.body.style.overflow = "";
    });
    lightbox.addEventListener("click", (e) => {
      if (e.target === lightbox) {
        lightbox.hidden = true;
        lightboxImg.src = "";
        document.body.style.overflow = "";
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !lightbox.hidden) {
        lightbox.hidden = true;
        lightboxImg.src = "";
        document.body.style.overflow = "";
      }
    });
  }

})();