// Theme Toggle Module

export function initThemeToggle() {
     const themeToggleBtn = document.querySelector('[data-theme-toggle]');
     const html = document.documentElement;

     if (!themeToggleBtn) return;

     // Check for saved theme preference or default to 'dark'
     const currentTheme = localStorage.getItem('theme') || 'dark';
     html.setAttribute('data-theme', currentTheme);

     // Update button icon
     updateThemeIcon(currentTheme);

     themeToggleBtn.addEventListener('click', () => {
          const theme = html.getAttribute('data-theme');
          const newTheme = theme === 'dark' ? 'light' : 'dark';

          html.setAttribute('data-theme', newTheme);
          localStorage.setItem('theme', newTheme);
          updateThemeIcon(newTheme);
     });
}

function updateThemeIcon(theme) {
     const icon = document.querySelector('[data-theme-icon]');
     if (!icon) return;

     icon.setAttribute('name', theme === 'dark' ? 'sunny-outline' : 'moon-outline');
}