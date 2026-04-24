export function initTypingAnimation() {
     const typingElement = document.querySelector('[data-typing-text]');
     if (!typingElement) return;

     const phrases = [
          'Full Stack Developer',
          'Laravel Developer',
          'PHP Web Developer'
     ];

     let phraseIndex = 0;
     let charIndex = 0;
     let isDeleting = false;

     typingElement.style.minWidth = '240px';
     typingElement.style.minHeight = '26px';

     const tick = () => {
          const phrase = phrases[phraseIndex];

          if (isDeleting) {
               charIndex -= 1;
          } else {
               charIndex += 1;
          }

          typingElement.textContent = phrase.slice(0, charIndex);

          let nextDelay = isDeleting ? 45 : 90;

          if (!isDeleting && charIndex === phrase.length) {
               isDeleting = true;
               nextDelay = 1300;
          }

          if (isDeleting && charIndex === 0) {
               isDeleting = false;
               phraseIndex = (phraseIndex + 1) % phrases.length;
               nextDelay = 350;
          }

          setTimeout(tick, nextDelay);
     };

     tick();
}
