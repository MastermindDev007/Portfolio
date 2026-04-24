export function initLazyMedia() {
     const lazyImages = document.querySelectorAll('img[loading="lazy"], img[data-lazy-blur]');
     if (!lazyImages.length) return;

     lazyImages.forEach((image) => {
          image.classList.add('lazy-blur');

          const onLoaded = () => {
               image.classList.add('loaded');
               image.removeEventListener('load', onLoaded);
          };

          if (image.complete) {
               image.classList.add('loaded');
          } else {
               image.addEventListener('load', onLoaded);
          }
     });
}
