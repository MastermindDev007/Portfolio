// Animations Module (WOW.js)

let wowInstance = null;

export function initAnimations() {
     if (typeof WOW === 'undefined') return;

     const initWOW = () => {
          if (wowInstance) {
               wowInstance = null;
          }

          wowInstance = new WOW({
               boxClass: 'wow',
               animateClass: 'animated',
               offset: 80,
               mobile: true,
               live: true,
               scrollContainer: null
          });
          wowInstance.init();
     };

     if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', initWOW);
     } else {
          initWOW();
     }

     const pages = document.querySelectorAll("[data-page]");

     const pageObserver = new MutationObserver((mutations) => {
          mutations.forEach((mutation) => {
               if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const target = mutation.target;
                    if (target.classList.contains('active')) {
                         setTimeout(() => {
                              if (wowInstance) {
                                   wowInstance.sync();
                              } else {
                                   initWOW();
                              }
                         }, 100);
                    }
               }
          });
     });

     pages.forEach((page) => {
          pageObserver.observe(page, {
               attributes: true,
               attributeFilter: ['class']
          });
     });
}

export function syncAnimations() {
     if (wowInstance) {
          wowInstance.sync();
     }
}