import { syncAnimations } from './animations.js';

export function initFilters() {
     const select = document.querySelector("[data-select]");
     const selectItems = document.querySelectorAll("[data-select-item]");
     const selectValue = document.querySelector("[data-selecct-value]");
     const filterBtn = document.querySelectorAll("[data-filter-btn]");
     const filterItems = document.querySelectorAll("[data-filter-item]");

     const filterFunc = (selectedValue) => {
          // Normalize the selected value
          const normalizedValue = selectedValue.toLowerCase().trim();

          filterItems.forEach((item) => {
               // Get category from data attribute
               const itemCategory = item.dataset.category?.toLowerCase().trim();

               // Add fade out animation
               item.style.opacity = '0';
               item.style.transform = 'translateY(20px)';

               setTimeout(() => {
                    if (normalizedValue === "all") {
                         item.classList.add("active");
                         item.style.display = 'block';
                    } else if (itemCategory === normalizedValue) {
                         item.classList.add("active");
                         item.style.display = 'block';
                    } else {
                         item.classList.remove("active");
                         item.style.display = 'none';
                    }

                    // Fade in animation
                    if (item.classList.contains('active')) {
                         setTimeout(() => {
                              item.style.opacity = '1';
                              item.style.transform = 'translateY(0)';
                         }, 50);
                    }
               }, 200);
          });

          // Sync WOW animations after filter
          setTimeout(() => {
               syncAnimations();
          }, 400);
     };

     // Mobile select dropdown
     if (select) {
          select.addEventListener("click", () => {
               select.classList.toggle("active");
          });
     }

     // Mobile select items
     selectItems.forEach((item) => {
          item.addEventListener("click", function () {
               const selectedValue = this.innerText.toLowerCase().trim();
               if (selectValue) selectValue.innerText = this.innerText;
               if (select) select.classList.toggle("active");
               filterFunc(selectedValue);
          });
     });

     // Desktop filter buttons
     let lastClickedBtn = filterBtn[0];

     filterBtn.forEach((btn) => {
          btn.addEventListener("click", function () {
               const selectedValue = this.innerText.toLowerCase().trim()
                    .replace(/\d+/g, '') // Remove numbers from category count
                    .trim();

               if (selectValue) selectValue.innerText = this.innerText;
               filterFunc(selectedValue);

               if (lastClickedBtn) lastClickedBtn.classList.remove("active");
               this.classList.add("active");
               lastClickedBtn = this;
          });
     });

     // Initialize with 'all' category on page load
     filterFunc('all');
}

// Add smooth transition styles
const style = document.createElement('style');
style.textContent = `
     [data-filter-item] {
          transition: opacity 0.3s ease, transform 0.3s ease;
     }
`;
document.head.appendChild(style);