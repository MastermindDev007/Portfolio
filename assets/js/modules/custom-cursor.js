export function initCustomCursor() {
     const dot = document.querySelector('[data-cursor-dot]');
     const ring = document.querySelector('[data-cursor-ring]');

     if (!dot || !ring) return;
     if (window.matchMedia('(pointer: coarse)').matches) return;

     document.body.classList.add('cursor-active');

     let mouseX = window.innerWidth / 2;
     let mouseY = window.innerHeight / 2;
     let ringX = mouseX;
     let ringY = mouseY;

     const interactiveSelector = 'a, button, .project-item, .project-item-icon-box, .social-link, input, textarea, [role="button"]';

     const onMove = (event) => {
          mouseX = event.clientX;
          mouseY = event.clientY;
          dot.style.transform = `translate(${mouseX - 4}px, ${mouseY - 4}px)`;
     };

     const animateRing = () => {
          ringX += (mouseX - ringX) * 0.16;
          ringY += (mouseY - ringY) * 0.16;
          ring.style.transform = `translate(${ringX - 17}px, ${ringY - 17}px)`;
          requestAnimationFrame(animateRing);
     };

     document.addEventListener('mousemove', onMove);

     document.addEventListener('mouseover', (event) => {
          if (event.target.closest(interactiveSelector)) {
               document.body.classList.add('cursor-hover');
          }
     });

     document.addEventListener('mouseout', (event) => {
          if (event.target.closest(interactiveSelector)) {
               document.body.classList.remove('cursor-hover');
          }
     });

     animateRing();
}
