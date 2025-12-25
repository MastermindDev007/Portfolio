// Filters Module

import { syncAnimations } from './animations.js';

export function initFilters() {
     const select = document.querySelector("[data-select]");
     const selectItems = document.querySelectorAll("[data-select-item]");
     const selectValue = document.querySelector("[data-selecct-value]");
     const filterBtn = document.querySelectorAll("[data-filter-btn]");
     const filterItems = document.querySelectorAll("[data-filter-item]");

     const filterFunc = (selectedValue) => {
          filterItems.forEach((item) => {
               if (selectedValue === "all") {
                    item.classList.add("active");
               } else if (selectedValue === item.dataset.category) {
                    item.classList.add("active");
               } else {
                    item.classList.remove("active");
               }
          });

          setTimeout(() => {
               syncAnimations();
          }, 300);
     };

     if (select) {
          select.addEventListener("click", () => {
               select.classList.toggle("active");
          });
     }

     selectItems.forEach((item) => {
          item.addEventListener("click", function () {
               const selectedValue = this.innerText.toLowerCase();
               if (selectValue) selectValue.innerText = this.innerText;
               if (select) select.classList.toggle("active");
               filterFunc(selectedValue);
          });
     });

     let lastClickedBtn = filterBtn[0];

     filterBtn.forEach((btn) => {
          btn.addEventListener("click", function () {
               const selectedValue = this.innerText.toLowerCase();
               if (selectValue) selectValue.innerText = this.innerText;
               filterFunc(selectedValue);

               if (lastClickedBtn) lastClickedBtn.classList.remove("active");
               this.classList.add("active");
               lastClickedBtn = this;
          });
     });
}