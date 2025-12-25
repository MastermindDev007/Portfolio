// Preloader Module

export function initPreloader() {
     const preloader = document.getElementById('preloader');
     const progressBar = document.querySelector('.progress-bar');
     const percentageText = document.querySelector('.percentage-text');

     if (!preloader || !progressBar || !percentageText) return;

     document.body.classList.add('preloader-active');

     let progress = 0;
     let progressInterval;

     const updateProgress = () => {
          progress += Math.random() * 15;

          if (progress >= 100) {
               progress = 100;
               clearInterval(progressInterval);
          }

          percentageText.textContent = Math.floor(progress);
     };

     progressInterval = setInterval(updateProgress, 100);

     const hidePreloader = () => {
          progress = 100;
          percentageText.textContent = '100';
          clearInterval(progressInterval);

          setTimeout(() => {
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
          }, 300);
     };

     window.addEventListener('load', hidePreloader);

     setTimeout(() => {
          if (preloader && !preloader.classList.contains('hidden')) {
               hidePreloader();
          }
     }, 3000);

     document.addEventListener('DOMContentLoaded', () => {
          setTimeout(() => {
               if (preloader && !preloader.classList.contains('hidden')) {
                    hidePreloader();
               }
          }, 1000);
     });
}