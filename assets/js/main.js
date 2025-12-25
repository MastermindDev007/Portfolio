'use strict';

// Main JavaScript Entry Point

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

// Initialize all modules
document.addEventListener('DOMContentLoaded', () => {
     initPreloader();
     initAnimations();
     initSidebar();
     initModal();
     initNavigation();
     initFilters();
     initForm();
     initSkills();
     initSecurity();
});