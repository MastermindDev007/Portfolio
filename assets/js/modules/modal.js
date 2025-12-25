// Modal Module

export function initModal() {
     const companiesItem = document.querySelectorAll("[data-companies-item]");
     const modalContainer = document.querySelector("[data-modal-container]");
     const modalCloseBtn = document.querySelector("[data-modal-close-btn]");
     const overlay = document.querySelector("[data-overlay]");
     const modalImg = document.querySelector("[data-modal-img]");
     const modalTitle = document.querySelector("[data-modal-title]");
     const modalText = document.querySelector("[data-modal-text]");

     const toggleModal = () => {
          if (modalContainer && overlay) {
               modalContainer.classList.toggle("active");
               overlay.classList.toggle("active");
          }
     };

     companiesItem.forEach((item) => {
          item.addEventListener("click", function () {
               if (modalImg && modalTitle && modalText) {
                    modalImg.src = this.querySelector("[data-companies-avatar]").src;
                    modalImg.alt = this.querySelector("[data-companies-avatar]").alt;
                    modalTitle.innerHTML = this.querySelector("[data-companies-title]").innerHTML;
                    modalText.innerHTML = this.querySelector("[data-companies-text]").innerHTML;
                    toggleModal();
               }
          });
     });

     if (modalCloseBtn) {
          modalCloseBtn.addEventListener("click", toggleModal);
     }
}