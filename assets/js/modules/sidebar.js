// Sidebar Module

export function initSidebar() {
     const sidebar = document.querySelector("[data-sidebar]");
     const sidebarBtn = document.querySelector("[data-sidebar-btn]");

     if (sidebarBtn && sidebar) {
          sidebarBtn.addEventListener("click", () => {
               sidebar.classList.toggle("active");
          });
     }
}