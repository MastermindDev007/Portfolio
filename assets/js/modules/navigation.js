// Navigation Module

export function initNavigation() {
     const navigationLinks = document.querySelectorAll("[data-nav-link]");
     const pages = document.querySelectorAll("[data-page]");

     navigationLinks.forEach((link) => {
          link.addEventListener("click", function (event) {
               event.preventDefault();
               event.stopPropagation();

               navigationLinks.forEach((navLink) => navLink.classList.remove("active"));
               pages.forEach((page) => page.classList.remove("active"));

               this.classList.add("active");

               const targetPage = this.textContent.trim().toLowerCase();
               const targetElement = document.querySelector(`[data-page="${targetPage}"]`);

               if (targetElement) {
                    targetElement.classList.add("active");
               } else {
                    console.warn(`Page with data-page="${targetPage}" not found`);
               }

               window.scrollTo({ top: 0, behavior: 'smooth' });
          });
     });
}