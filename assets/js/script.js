'use strict';



//-----------------------------------*\
//  #WOW.JS INITIALIZATION
//\*-----------------------------------*/

let wowInstance = null;

// Initialize WOW.js for scroll animations
function initWOW() {
  if (typeof WOW !== 'undefined') {
    // Destroy existing instance if it exists
    if (wowInstance) {
      wowInstance = null;
    }

    wowInstance = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 80,
      mobile: true,
      live: true,
      callback: function (box) {
        // Optional callback when animation triggers
      },
      scrollContainer: null
    });
    wowInstance.init();
  }
}

// Initialize on page load
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initWOW);
} else {
  initWOW();
}

// Re-initialize WOW.js when page changes (for single-page app)
const pages = document.querySelectorAll("[data-page]");
const navigationLinks = document.querySelectorAll("[data-nav-link]");

// Observe page changes and reinitialize animations
const pageObserver = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
      const target = mutation.target;
      if (target.classList.contains('active')) {
        // Small delay to ensure DOM is ready
        setTimeout(function () {
          if (wowInstance) {
            wowInstance.sync();
          } else {
            initWOW();
          }
        }, 100);
      }
    }
  });
});

// Observe all pages for class changes
pages.forEach(function (page) {
  pageObserver.observe(page, {
    attributes: true,
    attributeFilter: ['class']
  });
});

//-----------------------------------*\
//  #PRELOADER
//\*-----------------------------------*/

const preloader = document.getElementById('preloader');
const progressBar = document.querySelector('.progress-bar');
const percentageText = document.querySelector('.percentage-text');

// Prevent body scroll during preload
document.body.classList.add('preloader-active');

let progress = 0;
let progressInterval;

// Simulate loading progress
function updateProgress() {
  progress += Math.random() * 15;

  if (progress >= 100) {
    progress = 100;
    clearInterval(progressInterval);
  }

  if (percentageText) {
    percentageText.textContent = Math.floor(progress);
  }
}

// Start progress animation
progressInterval = setInterval(updateProgress, 100);

// Hide preloader function
function hidePreloader() {
  progress = 100;
  if (percentageText) percentageText.textContent = '100';
  clearInterval(progressInterval);

  setTimeout(function () {
    if (preloader) {
      preloader.classList.add('hidden');
      document.body.classList.remove('preloader-active');

      // Re-enable body scroll and fix overflow
      document.documentElement.style.overflow = '';
      document.body.style.overflow = '';
      document.body.style.position = '';
      document.body.style.width = '';

      // Remove preloader from DOM after animation
      setTimeout(function () {
        if (preloader && preloader.parentNode) {
          preloader.remove();
        }
      }, 500);
    }
  }, 300);
}

// Hide preloader when page is fully loaded
window.addEventListener('load', hidePreloader);

// Fallback: Hide preloader after max 3 seconds (performance safeguard)
setTimeout(function () {
  if (preloader && !preloader.classList.contains('hidden')) {
    hidePreloader();
  }
}, 3000);

// Also trigger on DOMContentLoaded as backup
document.addEventListener('DOMContentLoaded', function () {
  // If everything loads super fast, hide after 1 second minimum for UX
  setTimeout(function () {
    if (preloader && !preloader.classList.contains('hidden')) {
      hidePreloader();
    }
  }, 1000);
});



// element toggle function
const elementToggleFunc = function (elem) { elem.classList.toggle("active"); }



// sidebar variables
const sidebar = document.querySelector("[data-sidebar]");
const sidebarBtn = document.querySelector("[data-sidebar-btn]");

// sidebar toggle functionality for mobile
if (sidebarBtn) {
  sidebarBtn.addEventListener("click", function () { elementToggleFunc(sidebar); });
}



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
  if (modalContainer && overlay) {
    modalContainer.classList.toggle("active");
    overlay.classList.toggle("active");
  }
}

// add click event to all company items
for (let i = 0; i < companiesItem.length; i++) {
  companiesItem[i].addEventListener("click", function () {
    if (modalImg && modalTitle && modalText) {
      modalImg.src = this.querySelector("[data-companies-avatar]").src;
      modalImg.alt = this.querySelector("[data-companies-avatar]").alt;
      modalTitle.innerHTML = this.querySelector("[data-companies-title]").innerHTML;
      modalText.innerHTML = this.querySelector("[data-companies-text]").innerHTML;

      companiesModalFunc();
    }
  });
}

// add click event to modal close button only
if (modalCloseBtn) {
  modalCloseBtn.addEventListener("click", companiesModalFunc);
}

// Note: Modal is static - does NOT close on escape key or outside click



// custom select variables
const select = document.querySelector("[data-select]");
const selectItems = document.querySelectorAll("[data-select-item]");
const selectValue = document.querySelector("[data-selecct-value]");
const filterBtn = document.querySelectorAll("[data-filter-btn]");

if (select) {
  select.addEventListener("click", function () { elementToggleFunc(this); });
}

// add event in all select items
for (let i = 0; i < selectItems.length; i++) {
  selectItems[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    if (selectValue) selectValue.innerText = this.innerText;
    if (select) elementToggleFunc(select);
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

  // Re-trigger WOW.js animations for visible items
  setTimeout(function () {
    if (wowInstance) {
      wowInstance.sync();
    }
  }, 300);

}

// add event in all filter button items for large screen
let lastClickedBtn = filterBtn[0];

for (let i = 0; i < filterBtn.length; i++) {

  filterBtn[i].addEventListener("click", function () {

    let selectedValue = this.innerText.toLowerCase();
    if (selectValue) selectValue.innerText = this.innerText;
    filterFunc(selectedValue);

    if (lastClickedBtn) lastClickedBtn.classList.remove("active");
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
    if (form && form.checkValidity()) {
      if (formBtn) formBtn.removeAttribute("disabled");
    } else {
      if (formBtn) formBtn.setAttribute("disabled", "");
    }

  });
}



// page navigation variables
// const navigationLinks = document.querySelectorAll("[data-nav-link]"); // Already declared above
// const pages = document.querySelectorAll("[data-page]"); // Already declared above

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

if (companiesList) {
  setInterval(() => {
    companiesIndex = (companiesIndex + 2) % 4; // Show 2 companies at a time
    const container = companiesList;
    if (container && container.children.length > 0) {
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
}

//-----------------------------------*\
//  #SKILLS PROGRESS ANIMATION
//\*-----------------------------------*/

const skillProgressBars = document.querySelectorAll('.skill-progress-fill');

// Function to animate progress bars
function animateProgressBar(bar) {
  const width = bar.getAttribute('data-width');
  if (width) {
    bar.style.width = width + '%';
  }
}

// Intersection Observer for scroll-triggered animations
const progressObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateProgressBar(entry.target);
      progressObserver.unobserve(entry.target);
    }
  });
}, {
  threshold: 0.3,
  rootMargin: '0px 0px -50px 0px'
});

// Observe all progress bars
skillProgressBars.forEach(bar => {
  progressObserver.observe(bar);
});

// Animate on page load if already visible
window.addEventListener('load', function () {
  skillProgressBars.forEach(bar => {
    const rect = bar.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
    if (isVisible) {
      animateProgressBar(bar);
    }
  });
});

// Content Protection
// Disable right-click
document.addEventListener('contextmenu', function (e) {
  e.preventDefault();
});

// Disable keyboard shortcuts for developer tools and view source
document.addEventListener('keydown', function (e) {
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