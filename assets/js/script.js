'use strict';



// element toggle function
const elementToggleFunc = function (elem) { elem.classList.toggle("active"); }



// sidebar variables
const sidebar = document.querySelector("[data-sidebar]");
const sidebarBtn = document.querySelector("[data-sidebar-btn]");

// sidebar toggle functionality for mobile
sidebarBtn.addEventListener("click", function () { elementToggleFunc(sidebar); });



// companies modal variables
const companiesItem = document.querySelectorAll("[data-companies-item]");
const modalContainer = document.querySelector("[data-modal-container]");
const modalCloseBtn = document.querySelector("[data-modal-close-btn]");
const overlay = document.querySelector("[data-overlay]");

// modal variables
const modalImg = document.querySelector("[data-modal-img]");
const modalTitle = document.querySelector("[data-modal-title]");
const modalText = document.querySelector("[data-modal-text]");

// modal toggle function
const companiesModalFunc = function () {
  modalContainer.classList.toggle("active");
  overlay.classList.toggle("active");
}

// add click event to all company items
for (let i = 0; i < companiesItem.length; i++) {
  companiesItem[i].addEventListener("click", function () {
    modalImg.src = this.querySelector("[data-companies-avatar]").src;
    modalImg.alt = this.querySelector("[data-companies-avatar]").alt;
    modalTitle.innerHTML = this.querySelector("[data-companies-title]").innerHTML;
    modalText.innerHTML = this.querySelector("[data-companies-text]").innerHTML;

    companiesModalFunc();
  });
}

// add click event to modal close button only
modalCloseBtn.addEventListener("click", companiesModalFunc);

// Note: Modal is static - does NOT close on escape key or outside click



// custom select variables
const select = document.querySelector("[data-select]");
const selectItems = document.querySelectorAll("[data-select-item]");
const selectValue = document.querySelector("[data-selecct-value]");
const filterBtn = document.querySelectorAll("[data-filter-btn]");

select.addEventListener("click", function () { elementToggleFunc(this); });

// add event in all select items
for (let i = 0; i < selectItems.length; i++) {
  selectItems[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    elementToggleFunc(select);
    filterFunc(selectedValue);

  });
}

// filter variables
const filterItems = document.querySelectorAll("[data-filter-item]");

const filterFunc = function (selectedValue) {

  for (let i = 0; i < filterItems.length; i++) {

    if (selectedValue === "all") {
      filterItems[i].classList.add("active");
    } else if (selectedValue === filterItems[i].dataset.category) {
      filterItems[i].classList.add("active");
    } else {
      filterItems[i].classList.remove("active");
    }

  }

}

// add event in all filter button items for large screen
let lastClickedBtn = filterBtn[0];

for (let i = 0; i < filterBtn.length; i++) {

  filterBtn[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    selectValue.innerText = this.innerText;
    filterFunc(selectedValue);

    lastClickedBtn.classList.remove("active");
    this.classList.add("active");
    lastClickedBtn = this;

  });

}



// contact form variables
const form = document.querySelector("[data-form]");
const formInputs = document.querySelectorAll("[data-form-input]");
const formBtn = document.querySelector("[data-form-btn]");

// add event to all form input field
for (let i = 0; i < formInputs.length; i++) {
  formInputs[i].addEventListener("input", function () {

    // check form validation
    if (form.checkValidity()) {
      formBtn.removeAttribute("disabled");
    } else {
      formBtn.setAttribute("disabled", "");
    }

  });
}



// page navigation variables
const navigationLinks = document.querySelectorAll("[data-nav-link]");
const pages = document.querySelectorAll("[data-page]");

// add event to all nav link
for (let i = 0; i < navigationLinks.length; i++) {
  navigationLinks[i].addEventListener("click", function (event) {
    event.preventDefault();
    event.stopPropagation();

    // Remove active class from all nav links
    for (let j = 0; j < navigationLinks.length; j++) {
      navigationLinks[j].classList.remove("active");
    }

    // Remove active class from all pages
    for (let j = 0; j < pages.length; j++) {
      pages[j].classList.remove("active");
    }

    // Add active class to clicked nav link
    this.classList.add("active");

    // Find and activate the corresponding page
    const targetPage = this.textContent.trim().toLowerCase();
    const targetElement = document.querySelector(`[data-page="${targetPage}"]`);
    
    if (targetElement) {
      targetElement.classList.add("active");
    } else {
      console.warn(`Page with data-page="${targetPage}" not found`);
    }

    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}


// auto-slide companies
const companiesList = document.querySelector('.companies-list');
let companiesIndex = 0;

setInterval(() => {
  companiesIndex = (companiesIndex + 2) % 4; // Show 2 companies at a time
  const container = companiesList;
  if (container) {
    const item = container.children[companiesIndex];
    if (item) {
      const itemLeft = item.offsetLeft - container.offsetLeft;
      container.scrollTo({
        left: itemLeft,
        behavior: 'smooth'
      });
    }
  }
}, 3000);

// Content Protection
// Disable right-click
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});

// Disable keyboard shortcuts for developer tools and view source
document.addEventListener('keydown', function(e) {
  // Prevent Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U, F12
  if (
    (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J')) ||
    (e.ctrlKey && e.key === 'U') ||
    e.key === 'F12'
  ) {
    e.preventDefault();
    return false;
  }
});