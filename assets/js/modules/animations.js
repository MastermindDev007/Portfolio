let wowInstance = null;

// ─── Core WOW bootstrap (called once preloader is done) ──────────────────────
function bootWOW() {
     if (typeof WOW === 'undefined') return;

     if (wowInstance) wowInstance = null;

     wowInstance = new WOW({
          boxClass:      'wow',
          animateClass:  'animated',
          offset:        80,   // px from viewport bottom before triggering on scroll
          mobile:        true,
          live:          true,
          scrollContainer: null
     });
     wowInstance.init();

     // Immediately reveal any .wow elements that are already in the viewport
     // (the ones visible right after the preloader fades out)
     const allWow = document.querySelectorAll('.wow');
     allWow.forEach(el => {
          const rect = el.getBoundingClientRect();
          const inView = rect.top < window.innerHeight && rect.bottom > 0;
          if (inView && !el.classList.contains('animated')) {
               el.style.visibility = 'visible';
               el.classList.add('animated');
          }
     });
}

export function initAnimations() {
     // ✅ Wait for the preloader to fully disappear before starting any animation
     window.addEventListener('preloaderDone', () => {
          bootWOW();
     }, { once: true });

     // ─── Re-sync WOW when the user switches pages ─────────────────────────────
     const pages = document.querySelectorAll('[data-page]');

     const pageObserver = new MutationObserver(mutations => {
          mutations.forEach(mutation => {
               if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const target = mutation.target;
                    if (target.classList.contains('active')) {
                         setTimeout(() => {
                              if (wowInstance) {
                                   wowInstance.sync();
                              }
                         }, 100);
                    }
               }
          });
     });

     pages.forEach(page => {
          pageObserver.observe(page, {
               attributes: true,
               attributeFilter: ['class']
          });
     });
}

export function syncAnimations() {
     if (wowInstance) wowInstance.sync();
}