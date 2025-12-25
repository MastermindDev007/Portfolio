// Testimonials Auto-Scroll Control Module

let testimonialInterval = null;
let isPaused = false;

export function initTestimonialsControl() {
     const companiesList = document.querySelector('.companies-list');

     if (!companiesList) return;

     let companiesIndex = 0;
     const scrollDelay = 2000; // 2 seconds (faster than before)

     function autoScroll() {
          companiesIndex = (companiesIndex + 1) % companiesList.children.length;
          const item = companiesList.children[companiesIndex];

          if (item) {
               const itemLeft = item.offsetLeft - companiesList.offsetLeft;
               companiesList.scrollTo({
                    left: itemLeft,
                    behavior: 'smooth'
               });
          }
     }

     // Start auto-scroll
     setInterval(autoScroll, scrollDelay);

     // Optional: Pause on hover for better UX
     companiesList.addEventListener('mouseenter', () => {
          clearInterval(window.companiesInterval);
     });

     companiesList.addEventListener('mouseleave', () => {
          window.companiesInterval = setInterval(autoScroll, scrollDelay);
     });

     // Store interval globally for cleanup
     window.companiesInterval = setInterval(autoScroll, scrollDelay);
}

export function stopTestimonialsScroll() {
     if (testimonialInterval) {
          clearInterval(testimonialInterval);
          testimonialInterval = null;
     }
}