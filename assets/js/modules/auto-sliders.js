// Auto-Slider Module - FIXED (No flickering, smooth transitions)

export function initAutoSliders() {
     // Companies Slider - 2 items at a time
     const companiesList = document.querySelector('.companies-list');

     if (companiesList) {
          let companiesIndex = 0;
          const scrollDelay = 4000; // 4 seconds
          let companiesInterval;

          function autoScrollCompanies() {
               const items = companiesList.children;
               const itemWidth = items[0]?.offsetWidth || 0;
               const gap = 30; // Gap between items

               // Scroll 2 items at a time
               companiesIndex = (companiesIndex + 2) % items.length;

               const scrollPosition = companiesIndex * (itemWidth + gap);

               companiesList.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
               });
          }

          // Start auto-scroll
          companiesInterval = setInterval(autoScrollCompanies, scrollDelay);

          // Pause on hover
          companiesList.addEventListener('mouseenter', () => {
               clearInterval(companiesInterval);
          });

          companiesList.addEventListener('mouseleave', () => {
               companiesInterval = setInterval(autoScrollCompanies, scrollDelay);
          });
     }

     // Tech Stack Slider - Auto-slide
     const techStackGrid = document.querySelector('.tech-stack-grid');

     if (techStackGrid) {
          let techIndex = 0;
          const scrollDelay = 3500; // 3.5 seconds
          let techInterval;

          function autoScrollTech() {
               const items = techStackGrid.children;
               const itemWidth = items[0]?.offsetWidth || 0;
               const gap = 25;

               techIndex = (techIndex + 1) % items.length;

               const scrollPosition = techIndex * (itemWidth + gap);

               techStackGrid.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
               });
          }

          // Start auto-scroll
          techInterval = setInterval(autoScrollTech, scrollDelay);

          // Pause on hover
          techStackGrid.addEventListener('mouseenter', () => {
               clearInterval(techInterval);
          });

          techStackGrid.addEventListener('mouseleave', () => {
               techInterval = setInterval(autoScrollTech, scrollDelay);
          });
     }
}