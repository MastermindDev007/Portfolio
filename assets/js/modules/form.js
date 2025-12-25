// Form Module

export function initForm() {
     const form = document.querySelector("[data-form]");
     const formInputs = document.querySelectorAll("[data-form-input]");
     const formBtn = document.querySelector("[data-form-btn]");

     if (!form || !formBtn) return;

     formInputs.forEach((input) => {
          input.addEventListener("input", () => {
               if (form.checkValidity()) {
                    formBtn.removeAttribute("disabled");
               } else {
                    formBtn.setAttribute("disabled", "");
               }
          });
     });
}