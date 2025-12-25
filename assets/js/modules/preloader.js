// Preloader Module

export function initPreloader() {
     const preloader = document.getElementById('preloader');
     const progressBar = document.querySelector('.progress-bar');
     const percentageText = document.querySelector('.percentage-text');

     if (!preloader || !progressBar || !percentageText) return;

     document.body.classList.add('preloader-active');

     let progress = 0;
     const duration = 2000; // 2 seconds
     const interval = 20; // Update every 20ms
     const increment = (100 / duration) * interval;
     let progressInterval;

     // Reset progress bar immediately
     progressBar.style.width = '0%';
     percentageText.textContent = '0';

     const updateProgress = () => {
          progress += increment;

          if (progress >= 100) {
               progress = 100;
               clearInterval(progressInterval);
               // Small delay before hiding
               setTimeout(hidePreloader, 200);
          }

          progressBar.style.width = Math.floor(progress) + '%';
          percentageText.textContent = Math.floor(progress);
     };

     // Start progress animation immediately
     setTimeout(() => {
          progressInterval = setInterval(updateProgress, interval);
     }, 100);

     const hidePreloader = () => {
          preloader.classList.add('hidden');
          document.body.classList.remove('preloader-active');

          document.documentElement.style.overflow = '';
          document.body.style.overflow = '';
          document.body.style.position = '';
          document.body.style.width = '';

          setTimeout(() => {
               if (preloader && preloader.parentNode) {
                    preloader.remove();
               }
          }, 500);
     };

     // Fallback: Force hide after 3 seconds max
     setTimeout(() => {
          if (preloader && !preloader.classList.contains('hidden')) {
               clearInterval(progressInterval);
               progress = 100;
               progressBar.style.width = '100%';
               percentageText.textContent = '100';
               setTimeout(hidePreloader, 200);
          }
     }, 3000);
}