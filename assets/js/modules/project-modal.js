export function initProjectModal() {
     const projectItems = document.querySelectorAll('[data-project-item]');
     const modalContainer = document.querySelector('[data-project-modal-container]');
     const modalCloseBtn = document.querySelector('[data-project-modal-close]');
     const overlay = document.querySelector('[data-project-overlay]');

     if (!modalContainer) return;

     let currentProjectData = null;
     let currentImageIndex = 0;

     projectItems.forEach((item) => {
          const eyeIcon = item.querySelector('[data-project-eye]');
          if (!eyeIcon) return;

          eyeIcon.addEventListener('click', (event) => {
               event.preventDefault();
               event.stopPropagation();
               loadProjectData(item);
          });
     });

     if (modalCloseBtn) {
          modalCloseBtn.addEventListener('click', closeModal);
     }

     if (overlay) {
          overlay.addEventListener('click', closeModal);
     }

     const prevBtn = document.querySelector('[data-gallery-prev]');
     const nextBtn = document.querySelector('[data-gallery-next]');

     if (prevBtn) prevBtn.addEventListener('click', () => changeImage(-1));
     if (nextBtn) nextBtn.addEventListener('click', () => changeImage(1));

     function loadProjectData(projectElement) {
          const id = Number(projectElement.dataset.projectItem || 0);
          const title = projectElement.dataset.projectTitle || 'Project';
          const category = projectElement.dataset.projectCategory || 'Web';
          const description = projectElement.dataset.projectDescription || '';
          const images = JSON.parse(projectElement.dataset.projectImages || '[]');
          const technologies = JSON.parse(projectElement.dataset.projectTech || '[]');
          const demoUrl = projectElement.dataset.projectDemo || '#';

          currentProjectData = {
               id,
               title,
               category,
               description,
               images,
               technologies,
               demoUrl,
               detailsUrl: `project.php?id=${id}`
          };
          currentImageIndex = 0;

          updateModalContent();
          openModal();
     }

     function updateModalContent() {
          if (!currentProjectData) return;

          const titleEl = document.querySelector('[data-modal-project-title]');
          if (titleEl) titleEl.textContent = currentProjectData.title;

          const categoryEl = document.querySelector('[data-modal-project-category]');
          if (categoryEl) categoryEl.textContent = currentProjectData.category;

          const descEl = document.querySelector('[data-modal-project-description]');
          if (descEl) descEl.textContent = currentProjectData.description;

          updateGalleryImage();

          const techContainer = document.querySelector('[data-modal-tech-list]');
          if (techContainer) {
               techContainer.innerHTML = (currentProjectData.technologies || [])
                    .map((tech) => `<span class="tech-tag">${tech}</span>`)
                    .join('');
          }

          const demoBtn = document.querySelector('[data-modal-demo-btn]');
          if (demoBtn) {
               demoBtn.onclick = () => window.open(currentProjectData.demoUrl, '_blank', 'noopener,noreferrer');
          }

          const detailsBtn = document.querySelector('[data-modal-details-btn]');
          if (detailsBtn) {
               detailsBtn.onclick = () => window.open(currentProjectData.detailsUrl, '_blank', 'noopener,noreferrer');
          }

          updateIndicators();
     }

     function updateGalleryImage() {
          if (!currentProjectData || !currentProjectData.images || !currentProjectData.images.length) return;

          const imgEl = document.querySelector('[data-gallery-image]');
          if (imgEl) {
               imgEl.src = currentProjectData.images[currentImageIndex];
               imgEl.alt = currentProjectData.title;
          }
     }

     function changeImage(direction) {
          if (!currentProjectData || !currentProjectData.images || currentProjectData.images.length < 2) return;

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
          const indicatorsWrap = document.querySelector('[data-gallery-indicators]');
          if (!indicatorsWrap || !currentProjectData?.images) return;

          indicatorsWrap.innerHTML = '';
          currentProjectData.images.forEach((_, index) => {
               const button = document.createElement('button');
               button.type = 'button';
               button.className = `gallery-indicator ${index === currentImageIndex ? 'active' : ''}`;
               button.setAttribute('aria-label', `Show image ${index + 1}`);
               button.addEventListener('click', () => {
                    currentImageIndex = index;
                    updateGalleryImage();
                    updateIndicators();
               });
               indicatorsWrap.appendChild(button);
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

     document.addEventListener('keydown', (event) => {
          if (!modalContainer.classList.contains('active')) return;

          if (event.key === 'Escape') closeModal();
          if (event.key === 'ArrowLeft') changeImage(-1);
          if (event.key === 'ArrowRight') changeImage(1);
     });
}
