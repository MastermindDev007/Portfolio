// Security Module

export function initSecurity() {
     document.addEventListener('contextmenu', (e) => {
          e.preventDefault();
     });

     document.addEventListener('keydown', (e) => {
          if (
               (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J')) ||
               (e.ctrlKey && e.key === 'U') ||
               e.key === 'F12'
          ) {
               e.preventDefault();
               return false;
          }
     });
}