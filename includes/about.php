<?php
// Load services from JSON
$services = json_decode(file_get_contents('data/services.json'), true);
$companies = json_decode(file_get_contents('data/companies.json'), true);
$techStack = json_decode(file_get_contents('data/tech-stack.json'), true);
?>

<article class="about active" data-page="about">

    <header>
        <h2 class="h2 article-title wow animate__animated animate__fadeInDown">About me</h2>
    </header>

    <!-- Intro Section - Redesigned -->
    <section class="about-intro wow animate__animated animate__fadeInUp">
        <div class="intro-content">
            <h3 class="h3">Full-Stack Developer & Digital Craftsman</h3>
            <p>
                I transform ideas into elegant digital solutions. With a passion for clean code and innovative
                design,
                I specialize in building scalable web applications that drive business growth and deliver
                exceptional user experiences.
            </p>
            <div class="intro-stats">
                <div class="stat-item">
                    <h4 class="stat-number">15+</h4>
                    <p class="stat-label">Projects Completed</p>
                </div>
                <div class="stat-item">
                    <h4 class="stat-number">4</h4>
                    <p class="stat-label">Companies Worked With</p>
                </div>
                <div class="stat-item">
                    <h4 class="stat-number">2+</h4>
                    <p class="stat-label">Years Experience</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Redesigned -->
    <section class="service">
        <h3 class="h3 service-title wow animate__animated animate__fadeInUp">What I Do</h3>
        <ul class="service-list">
            <?php foreach ($services as $service): ?>
                <li class="service-item wow animate__animated animate__fadeIn<?php echo $service['id'] % 2 == 0 ? 'Right' : 'Left'; ?>"
                    data-wow-delay="<?php echo $service['delay']; ?>">
                    <div class="service-icon-box">
                        <img src="<?php echo htmlspecialchars($service['icon']); ?>"
                            alt="<?php echo htmlspecialchars($service['title']); ?> icon" width="40">
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
                                data-companies-avatar>
                        </figure>
                        <h4 class="h4 companies-item-title" data-companies-title>
                            <?php echo htmlspecialchars($company['name']); ?></h4>
                        <div class="companies-text" data-companies-text>
                            <p><?php echo htmlspecialchars($company['description']); ?></p>
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
                    <img src="assets/images/avatar-1.png" alt="Company" width="80" data-modal-img>
                </figure>
                <img src="assets/images/icon-quote.svg" alt="quote icon">
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