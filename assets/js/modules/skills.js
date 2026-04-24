// Skills Progress Module

export function initSkills() {
     const skillProgressBars = document.querySelectorAll('.skill-progress-fill');

     const animateProgressBar = (bar) => {
          const width = bar.getAttribute('data-width');
          if (width) {
               bar.style.width = width + '%';
          }
     };

     // Scroll-triggered: animate bars as they enter the viewport
     const progressObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
               if (entry.isIntersecting) {
                    animateProgressBar(entry.target);
                    progressObserver.unobserve(entry.target);
               }
          });
     }, {
          threshold: 0.3,
          rootMargin: '0px 0px -50px 0px'
     });

     skillProgressBars.forEach(bar => {
          progressObserver.observe(bar);
     });

     // ✅ After preloader is gone, animate any bars already in the viewport
     window.addEventListener('preloaderDone', () => {
          skillProgressBars.forEach(bar => {
               const rect = bar.getBoundingClientRect();
               const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
               if (isVisible) {
                    animateProgressBar(bar);
               }
          });
     }, { once: true });
}