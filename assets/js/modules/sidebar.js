// Sidebar Module

export function initSidebar() {
     const sidebar = document.querySelector("[data-sidebar]");
     const sidebarBtn = document.querySelector("[data-sidebar-btn]");
     const btnLabel = sidebarBtn ? sidebarBtn.querySelector('span') : null;

     if (sidebarBtn && sidebar) {
          sidebarBtn.setAttribute('aria-expanded', 'false');

          sidebarBtn.addEventListener("click", () => {
               sidebar.classList.toggle("active");
               const isActive = sidebar.classList.contains('active');
               sidebarBtn.setAttribute('aria-expanded', isActive ? 'true' : 'false');
               if (btnLabel) {
                    btnLabel.textContent = isActive ? 'Hide Contacts' : 'Show Contacts';
               }
          });
     }
}
