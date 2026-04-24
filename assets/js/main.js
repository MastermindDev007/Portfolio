'use strict';

// Import modules
import { initPreloader } from './modules/preloader.js';
import { initAnimations } from './modules/animations.js';
import { initSidebar } from './modules/sidebar.js';
import { initModal } from './modules/modal.js';
import { initNavigation } from './modules/navigation.js';
import { initFilters } from './modules/filters.js';
import { initForm } from './modules/form.js';
import { initSkills } from './modules/skills.js';
import { initSecurity } from './modules/security.js';
import { initThemeToggle } from './modules/theme-toggle.js';
import { initTypingAnimation } from './modules/typing-animation.js';
import { initProjectModal } from './modules/project-modal.js';
import { initBackToTop } from './modules/back-to-top.js';
import { initAutoSliders } from './modules/auto-sliders.js';

// Initialize all modules
document.addEventListener('DOMContentLoaded', () => {
     initPreloader();      // ← fires 'preloaderDone' when the overlay is gone
     initAnimations();     // ← listens for 'preloaderDone', then starts WOW.js
     initSidebar();
     initModal();
     initNavigation();
     initFilters();
     initForm();
     initSkills();         // ← listens for 'preloaderDone' for viewport bars
     initSecurity();
     initThemeToggle();
     initTypingAnimation();
     initProjectModal();
     initBackToTop();
     initAutoSliders();
});