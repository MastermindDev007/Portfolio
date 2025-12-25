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
}