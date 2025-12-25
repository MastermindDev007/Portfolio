export function initProjectModal() {
     const projectItems = document.querySelectorAll('[data-project-item]');
     const modalContainer = document.querySelector('[data-project-modal-container]');
     const modalCloseBtn = document.querySelector('[data-project-modal-close]');
     const overlay = document.querySelector('[data-project-overlay]');

     if (!modalContainer) return;

     const PROJECTS_ROOT = 'projects'; // Root folder for all projects
     let currentProjectData = null;
     let currentImageIndex = 0;

     // Open modal
     projectItems.forEach((item) => {
          const eyeIcon = item.querySelector('[data-project-eye]');

          if (eyeIcon) {
               eyeIcon.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();

                    const projectId = item.dataset.projectItem;
                    loadProjectData(projectId, item);
               });
          }
     });

     // Close modal
     if (modalCloseBtn) {
          modalCloseBtn.addEventListener('click', closeModal);
     }

     if (overlay) {
          overlay.addEventListener('click', closeModal);
     }

     // Gallery navigation
     const prevBtn = document.querySelector('[data-gallery-prev]');
     const nextBtn = document.querySelector('[data-gallery-next]');

     if (prevBtn) {
          prevBtn.addEventListener('click', () => changeImage(-1));
     }

     if (nextBtn) {
          nextBtn.addEventListener('click', () => changeImage(1));
     }

     function loadProjectData(projectId, projectElement) {
          const title = projectElement.dataset.projectTitle;
          const category = projectElement.dataset.projectCategory;
          const description = projectElement.dataset.projectDescription;
          const images = JSON.parse(projectElement.dataset.projectImages || '[]');
          const technologies = JSON.parse(projectElement.dataset.projectTech || '[]');
          const demoUrl = projectElement.dataset.projectDemo;

          // Build full path: projects/{folder}/index.html or projects/{folder}/index.php
          const projectFolder = title.toLowerCase().replace(/\s+/g, '-');
          const fullDemoPath = `${PROJECTS_ROOT}/${projectFolder}/${demoUrl}`;

          currentProjectData = {
               title,
               category,
               description,
               images,
               technologies,
               demoUrl: fullDemoPath
          };
          currentImageIndex = 0;

          updateModalContent();
          openModal();
     }

     function updateModalContent() {
          if (!currentProjectData) return;

          // Update title
          const titleEl = document.querySelector('[data-modal-project-title]');
          if (titleEl) titleEl.textContent = currentProjectData.title;

          // Update category
          const categoryEl = document.querySelector('[data-modal-project-category]');
          if (categoryEl) categoryEl.textContent = currentProjectData.category;

          // Update description
          const descEl = document.querySelector('[data-modal-project-description]');
          if (descEl) descEl.textContent = currentProjectData.description;

          // Update image
          updateGalleryImage();

          // Update technologies
          const techContainer = document.querySelector('[data-modal-tech-list]');
          if (techContainer && currentProjectData.technologies) {
               techContainer.innerHTML = currentProjectData.technologies
                    .map(tech => `<span class="tech-tag">${tech}</span>`)
                    .join('');
          }

          // Update demo button - opens in new tab
          const demoBtn = document.querySelector('[data-modal-demo-btn]');
          if (demoBtn && currentProjectData.demoUrl) {
               demoBtn.onclick = () => window.open(currentProjectData.demoUrl, '_blank');
          }

          // Update indicators
          updateIndicators();
     }

     function updateGalleryImage() {
          if (!currentProjectData || !currentProjectData.images) return;

          const imgEl = document.querySelector('[data-gallery-image]');
          if (imgEl) {
               imgEl.src = currentProjectData.images[currentImageIndex];
               imgEl.alt = currentProjectData.title;
          }
     }

     function changeImage(direction) {
          if (!currentProjectData || !currentProjectData.images) return;

          currentImageIndex += direction;

          if (currentImageIndex < 0) {
               currentImageIndex = currentProjectData.images.length - 1;
          } else if (currentImageIndex >= currentProjectData.images.length) {
               currentImageIndex = 0;
          }

          updateGalleryImage();
          updateIndicators();
     }

     function updateIndicators() {
          const indicators = document.querySelectorAll('[data-gallery-indicator]');
          indicators.forEach((indicator, index) => {
               if (index === currentImageIndex) {
                    indicator.classList.add('active');
               } else {
                    indicator.classList.remove('active');
               }
          });
     }

     function openModal() {
          if (modalContainer && overlay) {
               modalContainer.classList.add('active');
               overlay.classList.add('active');
               document.body.style.overflow = 'hidden';
          }
     }

     function closeModal() {
          if (modalContainer && overlay) {
               modalContainer.classList.remove('active');
               overlay.classList.remove('active');
               document.body.style.overflow = '';
          }
     }

     // Close modal on Escape key
     document.addEventListener('keydown', (e) => {
          if (e.key === 'Escape' && modalContainer.classList.contains('active')) {
               closeModal();
          }
     });
}