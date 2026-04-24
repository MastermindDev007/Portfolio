export function initScrollProgress() {
     const progressBar = document.querySelector('[data-scroll-progress]');
     if (!progressBar) return;

     const updateProgress = () => {
          const scrollTop = window.scrollY;
          const docHeight = document.documentElement.scrollHeight - window.innerHeight;
          const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
          progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
     };

     updateProgress();
     window.addEventListener('scroll', updateProgress, { passive: true });
     window.addEventListener('resize', updateProgress);
}
