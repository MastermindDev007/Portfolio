export function initStaggerReveal() {
     const groups = [
          '.service-list .service-item',
          '.project-list .project-item',
          '.skills-list .skills-item',
          '.timeline-list .timeline-item',
          '.certifications-list .certification-item',
          '.blog-posts-list .blog-post-item',
          '.tech-stack-grid .tech-item'
     ];

     groups.forEach((selector) => {
          const items = document.querySelectorAll(selector);
          items.forEach((item, index) => {
               if (!item.getAttribute('data-wow-delay')) {
                    item.setAttribute('data-wow-delay', `${(index + 1) * 0.1}s`);
               }
          });
     });
}
