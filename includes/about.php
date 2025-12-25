<?php
// Load services from JSON
$services = json_decode(file_get_contents('data/services.json'), true);

// Load companies from JSON
$companies = json_decode(file_get_contents('data/companies.json'), true);

// Load tech stack from JSON
$techStack = json_decode(file_get_contents('data/tech-stack.json'), true);
?>

<article class="about active" data-page="about">

    <header>
        <h2 class="h2 article-title wow animate__animated animate__fadeInDown">About me</h2>
    </header>

    <section class="about-text wow animate__animated animate__fadeInUp">
        <p>
            I am a passionate Full-Stack Web Developer dedicated to crafting innovative digital solutions that drive business growth and user engagement.
        </p>
        <p>
            With expertise in modern web technologies, I specialize in building responsive, scalable, and user-centric applications. My approach combines technical proficiency with creative design to deliver exceptional results that exceed client expectations.
        </p>
    </section>

    <!-- Services Section -->
    <section class="service">
        <h3 class="h3 service-title wow animate__animated animate__fadeInUp">What i'm doing</h3>
        <ul class="service-list">
            <?php foreach ($services as $service): ?>
                <li class="service-item wow animate__animated animate__fadeIn<?php echo $service['id'] % 2 == 0 ? 'Right' : 'Left'; ?>" data-wow-delay="<?php echo $service['delay']; ?>">
                    <div class="service-icon-box">
                        <img src="<?php echo htmlspecialchars($service['icon']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?> icon" width="40">
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
                <div class="tech-item wow animate__animated animate__zoomIn" data-wow-delay="<?php echo ($tech['id'] * 0.1); ?>s">
                    <ion-icon name="<?php echo htmlspecialchars($tech['icon']); ?>" class="tech-icon"></ion-icon>
                    <p class="tech-name"><?php echo htmlspecialchars($tech['name']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="companies">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 class="h3 companies-title wow animate__animated animate__fadeInUp">Companies I've Worked With</h3>
            <button class="theme-toggle-btn" data-testimonials-toggle style="padding: 8px 12px;">
                <ion-icon name="pause-outline" class="theme-icon" data-pause-icon></ion-icon>
                <ion-icon name="play-outline" class="theme-icon" data-play-icon style="display: none;"></ion-icon>
            </button>
        </div>
        <ul class="companies-list has-scrollbar">
            <?php foreach ($companies as $company): ?>
                <li class="companies-item wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $company['delay']; ?>">
                    <div class="content-card" data-companies-item>
                        <figure class="companies-avatar-box">
                            <img src="<?php echo htmlspecialchars($company['avatar']); ?>" alt="<?php echo htmlspecialchars($company['name']); ?>" width="60" data-companies-avatar>
                        </figure>
                        <h4 class="h4 companies-item-title" data-companies-title><?php echo htmlspecialchars($company['name']); ?></h4>
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