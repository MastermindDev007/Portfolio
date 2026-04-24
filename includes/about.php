<?php
require_once __DIR__ . '/../config/constants.php';

// Load services from JSON
$services = json_decode(file_get_contents('data/services.json'), true);
$companies = json_decode(file_get_contents('data/companies.json'), true);
$techStack = json_decode(file_get_contents('data/tech-stack.json'), true);
$projects = json_decode(file_get_contents('data/projects.json'), true);
$experience = json_decode(file_get_contents('data/experience.json'), true);

$projectCount = is_array($projects) ? count($projects) : 0;
$companyCount = is_array($companies) ? count($companies) : 0;
$githubUsername = DEV_GITHUB_USERNAME;
$experienceYears = 1;
$currentYear = (int) date('Y');

if (is_array($experience) && !empty($experience)) {
    $firstYear = $currentYear;
    foreach ($experience as $exp) {
        if (preg_match('/(20\\d{2})/', (string) ($exp['badge'] ?? ''), $matches)) {
            $firstYear = min($firstYear, (int) $matches[1]);
        }
    }
    $experienceYears = max(1, $currentYear - $firstYear);
}
?>

<article class="about active" data-page="about">

    <header>
        <h2 class="h2 article-title wow animate__animated animate__fadeInDown">About me</h2>
    </header>

    <!-- Intro Section - Redesigned -->
    <section class="about-intro wow animate__animated animate__fadeInUp">
        <div class="intro-content">
            <h3 class="h3">Full Stack Developer</h3>
            <p>
                Web Developer with hands-on experience in building and optimizing web applications using Laravel
                and modern front end technologies. Started as an intern and transitioned into a full-time role,
                gaining practical experience in performance optimization, debugging, UI improvements, and scalable
                back end development. Focused on writing efficient code, handling real-world issues, and delivering
                high-quality solutions.
            </p>
            <p class="intro-objective">
                Objective: Build scalable and efficient web applications by leveraging strong front end and back end
                development skills while continuously improving performance, code quality, and user experience.
            </p>
            <div class="intro-stats">
                <div class="stat-item">
                    <h4 class="stat-number"><?php echo $projectCount; ?></h4>
                    <p class="stat-label">Projects Completed</p>
                </div>
                <div class="stat-item">
                    <h4 class="stat-number"><?php echo $companyCount; ?></h4>
                    <p class="stat-label">Companies Worked With</p>
                </div>
                <div class="stat-item">
                    <h4 class="stat-number"><?php echo $experienceYears; ?>+</h4>
                    <p class="stat-label">Years Experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Redesigned -->
    <section class="service">
        <h3 class="h3 service-title wow animate__animated animate__fadeInUp">Core Focus Areas</h3>
        <ul class="service-list">
            <?php foreach ($services as $service): ?>
                <li class="service-item wow animate__animated animate__fadeIn<?php echo $service['id'] % 2 == 0 ? 'Right' : 'Left'; ?>"
                    data-wow-delay="<?php echo $service['delay']; ?>">
                    <div class="service-icon-box">
                        <img src="<?php echo htmlspecialchars($service['icon']); ?>"
                            alt="<?php echo htmlspecialchars($service['title']); ?> icon" width="40" loading="lazy" data-lazy-blur>
                    </div>
                    <div class="service-content-box">
                        <h4 class="h4 service-item-title"><?php echo htmlspecialchars($service['title']); ?></h4>
                        <p class="service-item-text">
                            <?php echo htmlspecialchars($service['description']); ?>
                        </p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Tech Stack Section -->
    <section class="tech-stack-section">
        <h3 class="h3 tech-stack-title wow animate__animated animate__fadeInUp">Tech Stack</h3>
        <div class="tech-stack-grid">
            <?php foreach ($techStack as $tech): ?>
                <div class="tech-item wow animate__animated animate__zoomIn"
                    data-wow-delay="<?php echo ($tech['id'] * 0.1); ?>s">
                    <ion-icon name="<?php echo htmlspecialchars($tech['icon']); ?>" class="tech-icon"></ion-icon>
                    <p class="tech-name"><?php echo htmlspecialchars($tech['name']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- GitHub Stats Section -->
    <section class="github-activity">
        <h3 class="h3 github-activity-title wow animate__animated animate__fadeInUp">GitHub Activity</h3>
        <div class="github-stats-grid">
            <figure class="github-stat-card wow animate__animated animate__fadeInLeft">
                <img loading="lazy" data-lazy-blur
                    src="https://github-readme-stats.vercel.app/api?username=<?php echo urlencode($githubUsername); ?>&show_icons=true&theme=transparent&hide_border=true&title_color=fdd663&text_color=e8eaef&icon_color=fdd663"
                    alt="GitHub stats for <?php echo htmlspecialchars($githubUsername); ?>">
            </figure>
            <figure class="github-stat-card wow animate__animated animate__fadeInRight">
                <img loading="lazy" data-lazy-blur
                    src="https://github-readme-streak-stats.herokuapp.com/?user=<?php echo urlencode($githubUsername); ?>&theme=transparent&hide_border=true&stroke=fdd663&ring=fdd663&fire=fdd663&currStreakLabel=fdd663"
                    alt="GitHub streak for <?php echo htmlspecialchars($githubUsername); ?>">
            </figure>
        </div>

        <div class="github-repo-feed wow animate__animated animate__fadeInUp" data-github-repos>
            <p class="github-fallback">Loading latest repositories...</p>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="companies">
        <h3 class="h3 companies-title wow animate__animated animate__fadeInUp">Companies I've Worked With</h3>
        <ul class="companies-list has-scrollbar">
            <?php foreach ($companies as $company): ?>
                <li class="companies-item wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo $company['delay']; ?>">
                    <div class="content-card" data-companies-item>
                        <figure class="companies-avatar-box">
                            <img src="<?php echo htmlspecialchars($company['avatar']); ?>"
                                alt="<?php echo htmlspecialchars($company['name']); ?>" width="60"
                                data-companies-avatar loading="lazy" data-lazy-blur>
                        </figure>
                        <h4 class="h4 companies-item-title" data-companies-title>
                            <?php echo htmlspecialchars($company['name']); ?></h4>
                        <?php if (!empty($company['position']) || !empty($company['period'])): ?>
                            <p class="companies-role" data-companies-period>
                                <?php echo htmlspecialchars(trim(($company['position'] ?? '') . ' | ' . ($company['period'] ?? ''), ' |')); ?>
                            </p>
                        <?php endif; ?>
                        <div class="companies-text" data-companies-text>
                            <p><?php echo htmlspecialchars($company['description']); ?></p>
                            <?php if (!empty($company['website'])): ?>
                                <p><a href="<?php echo htmlspecialchars($company['website']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($company['website']); ?></a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Modal -->
    <div class="modal-container" data-modal-container>
        <div class="overlay" data-overlay></div>
        <section class="companies-modal">
            <button class="modal-close-btn" data-modal-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <div class="modal-img-wrapper">
                <figure class="modal-avatar-box">
                    <img src="assets/images/avatar-1.png" alt="Company" width="80" data-modal-img loading="lazy" data-lazy-blur>
                </figure>
                <img src="assets/images/icon-quote.svg" alt="quote icon" loading="lazy" data-lazy-blur>
            </div>
            <div class="modal-content">
                <h4 class="h3 modal-title" data-modal-title>Company Name</h4>
                <time datetime="2025-01-15" data-modal-time>Period</time>
                <div data-modal-text>
                    <p>Description</p>
                </div>
            </div>
        </section>
    </div>

</article>
