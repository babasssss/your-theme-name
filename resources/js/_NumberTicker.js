(() => {
  /**
   * Format a number with optional decimals
   * @param {number} value 
   * @param {number} decimals 
   * @returns {string}
   */
  const formatNumber = (value, decimals = 0) => {
    return Number(value).toLocaleString(undefined, {
      minimumFractionDigits: decimals,
      maximumFractionDigits: decimals,
    });
  };

  /**
   * Animate a number from start to target over time
   * @param {HTMLElement} el 
   */
  const animateCounter = (el) => {
    const target = parseFloat(el.dataset.value || '0');
    const start = parseFloat(el.dataset.start || '0');
    const decimals = parseInt(el.dataset.decimals || '0', 10);
    const delay = parseFloat(el.dataset.delay || '0') * 1000;
    const unit = el.dataset.unit || '';
    const duration = 1000; // in ms
    const frameRate = 30; // ms per frame

    const steps = Math.ceil(duration / frameRate);
    const increment = (target - start) / steps;

    let current = start;
    let frame = 0;

    const update = () => {
      current += increment;
      frame++;

      if (frame < steps) {
        el.textContent = formatNumber(current, decimals) + unit;
        setTimeout(update, frameRate);
      } else {
        el.textContent = formatNumber(target, decimals) + unit;
      }
    };

    setTimeout(update, delay);
  };

  /**
   * Observe elements and trigger animation when visible
   */
  const observeTickers = () => {
    const tickers = document.querySelectorAll('.number-ticker');

    if (!tickers.length) return;

    const observer = new IntersectionObserver((entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          if (!el.classList.contains('number-ticker--animated')) {
            el.classList.add('number-ticker--animated');
            animateCounter(el);
          }
        }
      });
    }, {
      threshold: 0.5,
    });

    tickers.forEach(el => observer.observe(el));
  };

  // Initialize on DOM ready
  document.addEventListener('DOMContentLoaded', observeTickers);
})();
