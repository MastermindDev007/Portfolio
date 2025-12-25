// Testimonials Auto-Scroll Control Module

let testimonialInterval = null;
let isPaused = false;

export function initTestimonialsControl() {
     const companiesList = document.querySelector('.companies-list');
     const playPauseBtn = document.querySelector('[data-testimonials-toggle]');
     const playIcon = document.querySelector('[data-play-icon]');
     const pauseIcon = document.querySelector('[data-pause-icon]');
     
     if (!companiesList) return;
     
     let companiesIndex = 0;
     
     function autoScroll() {
          if (isPaused) return;
          
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
     testimonialInterval = setInterval(autoScroll, 3000);
     
     // Play/Pause control
     if (playPauseBtn) {
          playPauseBtn.addEventListener('click', () => {
               isPaused = !isPaused;
               
               if (isPaused) {
                    if (playIcon) playIcon.style.display = 'block';
                    if (pauseIcon) pauseIcon.style.display = 'none';
               } else {
                    if (playIcon) playIcon.style.display = 'none';
                    if (pauseIcon) pauseIcon.style.display = 'block';
               }
          });
     }
     
     // Pause on hover
     if (companiesList) {
          companiesList.addEventListener('mouseenter', () => {
               isPaused = true;
          });
          
          companiesList.addEventListener('mouseleave', () => {
               if (playPauseBtn && playIcon && playIcon.style.display !== 'block') {
                    isPaused = false;
               }
          });
     }
}

export function stopTestimonialsScroll() {
     if (testimonialInterval) {
          clearInterval(testimonialInterval);
          testimonialInterval = null;
     }
}