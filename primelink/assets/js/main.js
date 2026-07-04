/**
 * PrimeLink Corporate – Main JS v2.0
 * Bootstrap 5 + Vanilla JS | No jQuery
 */
(function () {
  'use strict';

  /* ─── Sticky header ─────────────────────────────────────────── */
  const header = document.getElementById('site-header');
  if (header) {
    const tick = () => header.classList.toggle('scrolled', window.scrollY > 50);
    window.addEventListener('scroll', tick, { passive: true });
    tick();
  }

  /* ─── Mobile nav toggle ─────────────────────────────────────── */
  const hamburger = document.getElementById('pl-hamburger');
  const mobileNav = document.getElementById('pl-mobile-nav');

  if (hamburger && mobileNav) {
    const open = () => {
      hamburger.classList.add('open');
      hamburger.setAttribute('aria-expanded', 'true');
      mobileNav.classList.add('open');
      mobileNav.removeAttribute('hidden');
      document.body.style.overflow = 'hidden';
    };
    const close = () => {
      hamburger.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      mobileNav.classList.remove('open');
      mobileNav.setAttribute('hidden', '');
      document.body.style.overflow = '';
    };
    hamburger.addEventListener('click', () =>
      mobileNav.classList.contains('open') ? close() : open()
    );
    // Close on link click
    mobileNav.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
    // Close on outside click
    document.addEventListener('click', e => {
      if (!header.contains(e.target) && !mobileNav.contains(e.target)) close();
    });
    // Escape key
    document.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
  }

  /* ─── Active nav link — handled server-side by Primelink_Nav_Walker ─── */
  // Walker sets aria-current="page" and class="active" on the current item.
  // No client-side detection needed; avoids duplicate class on page load.

  /* ─── Scroll to top ─────────────────────────────────────────── */
  const scrollBtn = document.getElementById('pl-scroll-top');
  if (scrollBtn) {
    window.addEventListener('scroll', () => {
      scrollBtn.classList.toggle('visible', window.scrollY > 500);
    }, { passive: true });
    scrollBtn.addEventListener('click', () =>
      window.scrollTo({ top: 0, behavior: 'smooth' })
    );
  }

  /* ─── Lazy image fade-in ─────────────────────────────────────── */
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries, obs) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('loaded');
          obs.unobserve(e.target);
        }
      });
    }, { rootMargin: '120px' });
    document.querySelectorAll('img.lazy').forEach(img => io.observe(img));
  } else {
    document.querySelectorAll('img.lazy').forEach(img => img.classList.add('loaded'));
  }

  /* ─── Smooth anchor scroll ───────────────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = (header ? header.offsetHeight : 80) + 24;
        window.scrollTo({
          top: target.getBoundingClientRect().top + window.scrollY - offset,
          behavior: 'smooth',
        });
      }
    });
  });

  /* ─── Counter animation ──────────────────────────────────────── */
  const counters = document.querySelectorAll('.pl-stat-num, .pl-hero-stat-num');
  if ('IntersectionObserver' in window && counters.length) {
    const countIO = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const text = el.textContent;
        const match = text.match(/(\d+)/);
        if (!match) return;
        const end = parseInt(match[1], 10);
        const duration = 1400;
        const start = performance.now();
        const inner = el.innerHTML; // preserve suffix markup

        const update = (now) => {
          const elapsed = now - start;
          const progress = Math.min(elapsed / duration, 1);
          const ease = 1 - Math.pow(1 - progress, 3);
          el.innerHTML = inner.replace(/\d+/, Math.round(ease * end));
          if (progress < 1) requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
        obs.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(c => countIO.observe(c));
  }

  /* ─── AJAX Form handler ──────────────────────────────────────── */
  function initForm(formId, msgId) {
    const form = document.getElementById(formId);
    const msg  = document.getElementById(msgId);
    if (!form || !msg) return;

    form.addEventListener('submit', async e => {
      e.preventDefault();

      // Validate required fields
      let valid = true;
      form.querySelectorAll('[required]').forEach(f => {
        const ok = f.value.trim() !== '';
        f.style.borderColor = ok ? '' : 'var(--pl-danger)';
        f.style.boxShadow   = ok ? '' : '0 0 0 3px rgba(239,68,68,.1)';
        if (!ok) valid = false;
      });
      if (!valid) { showMsg(msg, 'error', 'Please fill in all required fields.'); return; }

      const btn = form.querySelector('[type="submit"]');
      btn.disabled = true;
      const orig = btn.innerHTML;
      btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin fa-sm"></i> Sending…';

      try {
        const data = new FormData(form);
        data.set('action', 'primelink_form');
        data.set('nonce', (typeof PrimeLink !== 'undefined') ? PrimeLink.nonce : '');

        const r = await fetch(
          (typeof PrimeLink !== 'undefined') ? PrimeLink.ajax_url : '/wp-admin/admin-ajax.php',
          { method: 'POST', body: data, credentials: 'same-origin' }
        );
        const json = await r.json();

        if (json.success) {
          showMsg(msg, 'success', json.data.msg || 'Message sent successfully!');
          form.reset();
          form.querySelectorAll('input,select,textarea').forEach(f => {
            f.style.borderColor = '';
            f.style.boxShadow = '';
          });
        } else {
          showMsg(msg, 'error', json.data.msg || 'Something went wrong. Please try again.');
        }
      } catch {
        showMsg(msg, 'error', 'Network error. Please email us at info@primelink.com.lk');
      } finally {
        btn.disabled = false;
        btn.innerHTML = orig;
      }
    });

    // Clear validation highlight on input
    form.querySelectorAll('[required]').forEach(f => {
      f.addEventListener('input', () => {
        f.style.borderColor = '';
        f.style.boxShadow = '';
      });
    });
  }

  function showMsg(el, type, text) {
    el.textContent = text;
    el.className = 'form-msg ' + type;
    el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    setTimeout(() => { el.className = 'form-msg'; }, 7000);
  }

  // Wire up all forms
  ['quote-form','contact-form','eng-quote-form','it-quote-form'].forEach(id =>
    initForm(id, id + '-msg')
  );

})();
