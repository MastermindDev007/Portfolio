<?php
require_once __DIR__ . '/includes/helpers/projects-helper.php';
require_once __DIR__ . '/config/constants.php';

$projects = load_projects();
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$project = null;
foreach ($projects as $item) {
    if ((int) ($item['id'] ?? 0) === $id) {
        $project = $item;
        break;
    }
}

if (!$project) {
    http_response_code(404);
}

$project = $project ? sanitize_project($project) : null;
$title = $project['title'] ?? 'Project Not Found';
$description = $project['description'] ?? 'The requested project does not exist.';
$images = $project['images'] ?? [];
$technologies = $project['technologies'] ?? [];
$demoUrl = $project['demoUrl'] ?? '#';
$githubUrl = $project['githubUrl'] ?? '#';
$story = $project['story'] ?? $description;
$features = $project['features'] ?? [];

if (!$features || !is_array($features)) {
    $features = [
        'Built responsive UI and polished interactions for all screen sizes.',
        'Implemented scalable architecture with clean component boundaries.',
        'Focused on performance and predictable user flows.'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> | Dev Davda</title>
    <link rel="stylesheet" href="assets/css/variables.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/utilities.css">
    <link rel="stylesheet" href="assets/css/components/enhancements.css">
    <link rel="stylesheet" href="assets/css/pages/project-details.css">
</head>

<body>
    <main class="project-page">
        <a class="project-back" href="index.php">&larr; Back to Portfolio</a>

        <?php if ($project): ?>
            <section class="project-hero">
                <figure class="project-hero-media">
                    <img src="<?php echo htmlspecialchars($images[0] ?? $project['image']); ?>" alt="<?php echo htmlspecialchars($title); ?>" loading="lazy">
                </figure>
                <div class="project-hero-meta">
                    <span class="project-category"><?php echo htmlspecialchars($project['category'] ?? 'Project'); ?></span>
                    <h1><?php echo htmlspecialchars($title); ?></h1>
                    <p><?php echo htmlspecialchars($description); ?></p>
                    <div class="project-actions">
                        <a class="project-btn" href="<?php echo htmlspecialchars($demoUrl); ?>" target="_blank" rel="noopener noreferrer">Live Preview</a>
                        <?php if ($githubUrl !== '#'): ?>
                            <a class="project-btn" href="<?php echo htmlspecialchars($githubUrl); ?>" target="_blank" rel="noopener noreferrer">GitHub Repo</a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section class="project-grid">
                <article class="project-panel">
                    <h2>What I Built & Why</h2>
                    <p><?php echo htmlspecialchars($story); ?></p>
                </article>

                <article class="project-panel">
                    <h2>Core Features</h2>
                    <ul>
                        <?php foreach ($features as $feature): ?>
                            <li><?php echo htmlspecialchars($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>

                <article class="project-panel">
                    <h2>Tech Stack Breakdown</h2>
                    <div class="project-tech-list">
                        <?php foreach ($technologies as $tech): ?>
                            <span><?php echo htmlspecialchars($tech); ?></span>
                        <?php endforeach; ?>
                    </div>
                </article>

                <article class="project-panel">
                    <h2>Screens</h2>
                    <div class="project-gallery-grid">
                        <?php foreach ($images as $image): ?>
                            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?> screen" loading="lazy">
                        <?php endforeach; ?>
                    </div>
                </article>
            </section>
        <?php else: ?>
            <article class="project-panel">
                <h2>Project Not Found</h2>
                <p>The requested project detail page could not be loaded.</p>
            </article>
        <?php endif; ?>
    </main>
</body>

</html>
