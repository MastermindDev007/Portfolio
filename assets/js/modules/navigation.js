// Navigation Module

export function initNavigation() {
     const navigationLinks = document.querySelectorAll("[data-nav-link]");
     const pageTriggers = document.querySelectorAll("[data-page-trigger]");
     const pages = document.querySelectorAll("[data-page]");

     const goToPage = (targetPage) => {
          const normalized = String(targetPage || '').trim().toLowerCase();
          const targetElement = document.querySelector(`[data-page="${normalized}"]`);

          if (!targetElement) {
               console.warn(`Page with data-page="${normalized}" not found`);
               return;
          }

          pages.forEach((page) => page.classList.remove("active"));
          targetElement.classList.add("active");

          navigationLinks.forEach((navLink) => {
               const navTarget = navLink.textContent.trim().toLowerCase();
               navLink.classList.toggle("active", navTarget === normalized);
          });

          window.scrollTo({ top: 0, behavior: 'smooth' });
     };

     navigationLinks.forEach((link) => {
          link.addEventListener("click", function (event) {
               event.preventDefault();
               event.stopPropagation();
               goToPage(this.textContent);
          });
     });

     pageTriggers.forEach((trigger) => {
          trigger.addEventListener('click', () => {
               goToPage(trigger.dataset.pageTrigger);
          });
     });
}
