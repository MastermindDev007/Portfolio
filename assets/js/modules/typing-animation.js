// Typing Animation Module

export function initTypingAnimation() {
     const typingElement = document.querySelector('[data-typing-text]');

     if (!typingElement) return;

     const texts = [
          'Full-Stack Web Developer',
          'Laravel Developer',
          'Python Developer',
          'DevOps Engineer',
          'PHP Developer'
     ];

     let textIndex = 0;
     let charIndex = 0;
     let isDeleting = false;
     let typingSpeed = 100;

     // Set fixed min-width to prevent sidebar height changes
     typingElement.style.minWidth = '220px';
     typingElement.style.display = 'inline-block';
     typingElement.style.whiteSpace = 'nowrap';

     function type() {
          const currentText = texts[textIndex];

          if (isDeleting) {
               typingElement.textContent = currentText.substring(0, charIndex - 1);
               charIndex--;
               typingSpeed = 50;
          } else {
               typingElement.textContent = currentText.substring(0, charIndex + 1);
               charIndex++;
               typingSpeed = 100;
          }

          // Add blinking cursor
          typingElement.style.borderRight = '2px solid var(--orange-yellow-crayola)';
          typingElement.style.paddingRight = '5px';

          if (!isDeleting && charIndex === currentText.length) {
               isDeleting = true;
               typingSpeed = 2000; // Pause at end
          } else if (isDeleting && charIndex === 0) {
               isDeleting = false;
               textIndex = (textIndex + 1) % texts.length;
               typingSpeed = 500;
          }

          setTimeout(type, typingSpeed);
     }

     // Start typing animation
     type();

     // Blinking cursor animation
     setInterval(() => {
          typingElement.style.borderRight =
               typingElement.style.borderRight === '2px solid transparent'
                    ? '2px solid var(--orange-yellow-crayola)'
                    : '2px solid transparent';
     }, 500);
}