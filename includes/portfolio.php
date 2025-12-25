<?php
/**
 * Portfolio / Projects Section
 * 
 * Displays projects loaded from JSON with dynamic filtering.
 * 
 * @package Portfolio
 * @version 1.0.0
 */

// Load helper functions
require_once __DIR__ . '/helpers/projects-helper.php';

// Load projects from JSON
$projects = load_projects();

// Get unique categories for filters
$categories = get_project_categories($projects);

// Default active category
$active_category = 'all';
?>

<article class="portfolio" data-page="projects">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Projects</h2>
  </header>

  <section class="projects">

    <!-- Filter List (Desktop) -->
    <ul class="filter-list">

      <li class="filter-item">
        <button class="active" data-filter-btn>All</button>
      </li>

      <?php foreach ($categories as $category): ?>
        <li class="filter-item">
          <button data-filter-btn><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></button>
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
            <button data-select-item><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></button>
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
        ?>
          <li class="project-item active wow animate__animated animate__fadeInUp" data-filter-item data-category="<?php echo htmlspecialchars($category_lower, ENT_QUOTES, 'UTF-8'); ?>" data-wow-delay="<?php echo number_format($delay, 1); ?>s">
            <a href="<?php echo $project['link']; ?>">
              <figure class="project-img">
                <div class="project-item-icon-box">
                  <ion-icon name="eye-outline"></ion-icon>
                </div>
                <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['alt']; ?>" loading="lazy">
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
      <?php endif; ?>

    </ul>

  </section>

</article>
