<?php

/**
 * Portfolio / Projects Section - UPDATED
 * 
 * Displays projects loaded from JSON with dynamic filtering and modal.
 */

// Load helper functions
require_once __DIR__ . '/helpers/projects-helper.php';

// Load projects from JSON
$projects = load_projects();

// Get unique categories for filters
$categories = get_project_categories($projects);

// Count projects per category
$categoryCounts = [];
foreach ($projects as $project) {
     $cat = strtolower(trim($project['category']));
     $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
}
$categoryCounts['all'] = count($projects);
?>

<article class="portfolio" data-page="projects">

     <header>
          <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Projects</h2>
     </header>

     <section class="projects">

          <!-- Filter List (Desktop) -->
          <ul class="filter-list">
               <li class="filter-item wow animate__animated animate__fadeInDown" data-wow-delay="0.1s">
                    <button class="active" data-filter-btn>
                         All
                         <span class="category-count"><?php echo $categoryCounts['all']; ?></span>
                    </button>
               </li>

               <?php foreach ($categories as $category):
                    $catLower = strtolower(trim($category));
               ?>
                    <li class="filter-item">
                         <button data-filter-btn>
                              <?php echo htmlspecialchars($category); ?>
                              <span class="category-count"><?php echo $categoryCounts[$catLower] ?? 0; ?></span>
                         </button>
                    </li>
               <?php endforeach; ?>
          </ul>

          <!-- Filter Select (Mobile) -->
          <div class="filter-select-box">
               <button class="filter-select" data-select>
                    <div class="select-value" data-selecct-value>Select category</div>
                    <div class="select-icon">
                         <ion-icon name="chevron-down"></ion-icon>
                    </div>
               </button>

               <ul class="select-list">
                    <li class="select-item">
                         <button data-select-item>All</button>
                    </li>

                    <?php foreach ($categories as $category): ?>
                         <li class="select-item">
                              <button data-select-item><?php echo htmlspecialchars($category); ?></button>
                         </li>
                    <?php endforeach; ?>
               </ul>
          </div>

          <!-- Projects List -->
          <ul class="project-list">
               <?php if (empty($projects)): ?>
                    <li class="project-item">
                         <p style="color: var(--light-gray); text-align: center; padding: 40px;">
                              No projects available at the moment.
                         </p>
                    </li>
                    <?php else:
                    $delay = 0.1;
                    foreach ($projects as $project):
                         $project = sanitize_project($project);
                         $category_lower = strtolower(trim($project['category']));
                         $projectImages = json_encode($project['images'] ?? [$project['image']]);
                         $projectTech = json_encode($project['technologies'] ?? []);
                    ?>
                         <li class="project-item active wow animate__animated animate__fadeInUp" data-filter-item
                              data-category="<?php echo htmlspecialchars($category_lower); ?>"
                              data-wow-delay="<?php echo number_format($delay, 1); ?>s"
                              data-project-item="<?php echo $project['id']; ?>"
                              data-project-title="<?php echo $project['title']; ?>"
                              data-project-category="<?php echo $project['category']; ?>"
                              data-project-description="<?php echo $project['description']; ?>"
                              data-project-images='<?php echo $projectImages; ?>' data-project-tech='<?php echo $projectTech; ?>'
                              data-project-demo="<?php echo $project['demoUrl'] ?? '#'; ?>">
                              <a href="<?php echo $project['link'] ?? '#'; ?>">
                                   <figure class="project-img">
                                        <div class="project-item-icon-box" data-project-eye>
                                             <ion-icon name="eye-outline"></ion-icon>
                                        </div>
                                        <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['alt']; ?>"
                                             loading="lazy">
                                   </figure>
                                   <h3 class="project-title"><?php echo $project['title']; ?></h3>
                                   <p class="project-category"><?php echo $project['category']; ?></p>
                              </a>
                         </li>
               <?php
                         $delay += 0.1;
                         if ($delay > 0.9) $delay = 0.1;
                    endforeach;
               endif; ?>
          </ul>

     </section>

     <!-- Project Modal -->
     <div class="project-modal-container" data-project-modal-container>
          <div class="project-overlay" data-project-overlay></div>

          <section class="project-modal">
               <button class="project-modal-close-btn" data-project-modal-close>
                    <ion-icon name="close-outline"></ion-icon>
               </button>

               <!-- Header -->
               <div class="project-modal-header">
                    <h3 class="project-modal-title" data-modal-project-title>Project Name</h3>
                    <p class="project-modal-category" data-modal-project-category>Category</p>
               </div>

               <!-- Image Gallery -->
               <div class="project-gallery">
                    <div class="gallery-main">
                         <img src="" alt="Project" data-gallery-image>
                         <div class="gallery-nav">
                              <button class="gallery-btn" data-gallery-prev>
                                   <ion-icon name="chevron-back-outline"></ion-icon>
                              </button>
                              <button class="gallery-btn" data-gallery-next>
                                   <ion-icon name="chevron-forward-outline"></ion-icon>
                              </button>
                         </div>
                    </div>
                    <div class="gallery-indicators">
                         <span class="gallery-indicator active" data-gallery-indicator></span>
                         <span class="gallery-indicator" data-gallery-indicator></span>
                    </div>
               </div>

               <!-- Description -->
               <div class="project-modal-description">
                    <h4>About This Project</h4>
                    <p data-modal-project-description>Project description will appear here.</p>
               </div>

               <!-- Technologies -->
               <div class="project-technologies">
                    <h4>Technologies Used</h4>
                    <div class="tech-list" data-modal-tech-list>
                         <!-- Tech tags will be inserted here -->
                    </div>
               </div>

               <!-- Actions -->
               <div class="project-modal-actions">
                    <button class="live-demo-btn" data-modal-demo-btn>
                         <ion-icon name="rocket-outline"></ion-icon>
                         <span>Live Preview</span>
                    </button>
               </div>
          </section>
     </div>

</article>