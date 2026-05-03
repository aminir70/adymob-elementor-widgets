(function () {
  'use strict';

  // ── Calculator ───────────────────────────────────────────────
  function initCalc(root) {
    var vs = root.querySelector('.adymob-views-slider');
    var rs = root.querySelector('.adymob-rpm-slider');
    var vd = root.querySelector('.adymob-views-display');
    var rd = root.querySelector('.adymob-rpm-display');
    var rev = root.querySelector('.adymob-revenue-display');
    var dol = root.querySelector('.adymob-dollar-display');
    if (!vs || !rs) return;

    function update() {
      var views = parseInt(vs.value);
      var rpm   = parseFloat(rs.value);
      if (vd) vd.value = views + 'K';
      if (rd) rd.value = '$' + rpm;
      var revenue = Math.round(views * rpm * 88400 / 1000) * 1000;
      if (rev) rev.textContent = revenue.toLocaleString('fa-IR');
      if (dol) dol.textContent = '$' + Math.round(views * rpm);
    }
    vs.addEventListener('input', update);
    rs.addEventListener('input', update);
    update();
  }

  // ── Live Rates ───────────────────────────────────────────────
  function initRates(root) {
    var table = root.querySelector('.adymob-rates-table');
    if (!table) return;

    var data = [
      {v:88400,  c: 0.4},
      {v:96200,  c: 0.2},
      {v:24050,  c: 0.3},
      {v:112300, c:-0.1},
      {v:88100,  c:-0.2},
      {v:2720,   c: 0.8},
    ];

    function tick() {
      data.forEach(function(r, i) {
        r.v = Math.round(r.v * (1 + (Math.random() - 0.5) * 0.002));
        r.c = +(r.c + (Math.random() - 0.5) * 0.1).toFixed(2);
        var valEl = root.querySelector('[data-rate-val="' + i + '"]');
        var chgEl = root.querySelector('[data-rate-chg="' + i + '"]');
        if (valEl) valEl.textContent = r.v.toLocaleString('en');
        if (chgEl) {
          chgEl.textContent = (r.c >= 0 ? '▲ ' : '▼ ') + Math.abs(r.c).toFixed(2) + '٪';
          chgEl.className = 'chg' + (r.c < 0 ? ' neg' : '');
        }
      });
    }
    setInterval(tick, 3500);
  }

  // ── FAQ Accordion ────────────────────────────────────────────
  function initFaq(root) {
    root.querySelectorAll('.adymob-faq-q').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var item   = btn.parentElement;
        var isOpen = item.classList.contains('open');
        root.querySelectorAll('.adymob-faq-item').forEach(function(el) {
          el.classList.remove('open');
        });
        if (!isOpen) item.classList.add('open');
      });
    });
  }

  // ── Reveal on Scroll ─────────────────────────────────────────
  function initReveal() {
    if (!window.IntersectionObserver) return;
    var io = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting) e.target.classList.add('adymob-in');
      });
    }, { threshold: 0.08 });
    document.querySelectorAll('.adymob-reveal').forEach(function(el) {
      io.observe(el);
    });
  }

  // ── Init all widgets ─────────────────────────────────────────
  function initAll() {
    document.querySelectorAll('.adymob-hero').forEach(function(el) {
      initCalc(el);
    });
    document.querySelectorAll('.adymob-rates-board').forEach(function(el) {
      initRates(el);
    });
    document.querySelectorAll('.adymob-faq-wrap').forEach(function(el) {
      initFaq(el);
    });
    initReveal();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }

  // Elementor editor re-init
  if (window.elementorFrontend) {
    window.elementorFrontend.hooks.addAction('frontend/element_ready/global', function($el) {
      initCalc($el[0]);
      initRates($el[0]);
      initFaq($el[0]);
    });
  }
})();
