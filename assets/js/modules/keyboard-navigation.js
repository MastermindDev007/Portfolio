export function initKeyboardNavigation() {
     const projectCards = Array.from(document.querySelectorAll('[data-project-item]'));

     projectCards.forEach((card, index) => {
          card.setAttribute('tabindex', '0');
          card.addEventListener('keydown', (event) => {
               if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    const openBtn = card.querySelector('[data-project-eye]');
                    if (openBtn) openBtn.click();
               }

               if (event.key === 'ArrowRight') {
                    event.preventDefault();
                    const next = projectCards[index + 1] || projectCards[0];
                    next.focus();
               }

               if (event.key === 'ArrowLeft') {
                    event.preventDefault();
                    const prev = projectCards[index - 1] || projectCards[projectCards.length - 1];
                    prev.focus();
               }
          });
     });
}
