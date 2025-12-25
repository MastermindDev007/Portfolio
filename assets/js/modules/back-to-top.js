// Back to Top Module

export function initBackToTop() {
     const backToTopBtn = document.querySelector('[data-back-to-top]');

     if (!backToTopBtn) return;

     // Show/hide button based on scroll position
     window.addEventListener('scroll', () => {
          if (window.scrollY > 300) {
               backToTopBtn.classList.add('active');
          } else {
               backToTopBtn.classList.remove('active');
          }
     });

     // Scroll to top on click
     backToTopBtn.addEventListener('click', () => {
          window.scrollTo({
               top: 0,
               behavior: 'smooth'
          });
     });
}