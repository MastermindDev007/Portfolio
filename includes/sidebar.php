<?php
require_once __DIR__ . '/../config/constants.php';
?>

<aside class="sidebar wow animate__animated animate__fadeInLeft" data-sidebar>

  <div class="sidebar-info">

    <figure class="avatar-box wow animate__animated animate__zoomIn" data-wow-delay="0.2s">
      <img src="assets/images/my-avatar.png" alt="Dev Davda" width="80" loading="lazy" data-lazy-blur>
    </figure>

    <div class="info-content wow animate__animated animate__fadeInUp" data-wow-delay="0.3s">
      <h1 class="name" title="Dev Davda">Dev Davda</h1>
      <p class="title" data-typing-text>Full Stack Developer</p>
      <p class="profile-focus">Laravel, PHP, Python, and modern frontend systems.</p>
    </div>

    <button class="info_more-btn" data-sidebar-btn aria-expanded="false" aria-controls="sidebar-info-more">
      <span>Show Contacts</span>
      <ion-icon name="chevron-down"></ion-icon>
    </button>

  </div>

  <div class="sidebar-info_more" id="sidebar-info-more">

    <div class="theme-toggle">
      <button class="theme-toggle-btn" data-theme-toggle>
        <ion-icon name="sunny-outline" class="theme-icon" data-theme-icon></ion-icon>
        <span class="theme-toggle-label">Switch Theme</span>
      </button>
    </div>

    <div class="separator"></div>

    <ul class="contacts-list">

      <li class="contact-item wow animate__animated animate__fadeInLeft" data-wow-delay="0.1s">
        <div class="icon-box">
          <ion-icon name="mail-outline"></ion-icon>
        </div>
        <div class="contact-info">
          <p class="contact-title">Email</p>
          <a href="mailto:<?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>" class="contact-link">
            <?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>
          </a>
        </div>
      </li>

      <li class="contact-item wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s">
        <div class="icon-box">
          <ion-icon name="phone-portrait-outline"></ion-icon>
        </div>
        <div class="contact-info">
          <p class="contact-title">Phone</p>
          <a href="tel:7779092005" class="contact-link">7779092005</a>
        </div>
      </li>

      <li class="contact-item wow animate__animated animate__fadeInLeft" data-wow-delay="0.3s">
        <div class="icon-box">
          <ion-icon name="calendar-outline"></ion-icon>
        </div>
        <div class="contact-info">
          <p class="contact-title">Birthday</p>
          <time datetime="2005-05-05">05/05/2005</time>
        </div>
      </li>

      <li class="contact-item wow animate__animated animate__fadeInLeft" data-wow-delay="0.4s">
        <div class="icon-box">
          <ion-icon name="location-outline"></ion-icon>
        </div>
        <div class="contact-info">
          <p class="contact-title">Location</p>
          <a href="https://www.google.com/maps/place/Jamnagar,+Gujarat+361008" target="_blank"
            rel="noopener noreferrer" class="contact-link">
            Jamnagar, Gujarat 361008
          </a>
        </div>
      </li>

      <li class="contact-item wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">
        <div class="icon-box">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <div class="contact-info">
          <p class="contact-title">Address</p>
          <address>Madhav, Ist State Bank Society, Patel Colony, Road 3, Jamnagar</address>
        </div>
      </li>

    </ul>

    <div class="separator"></div>

    <div class="resume-download wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
      <a href="assets/resume/Dev_Davda.pdf" download="Dev_Davda_CV.pdf" class="resume-btn">
        <ion-icon name="download-outline"></ion-icon>
        <span>Download Resume</span>
      </a>
    </div>

    <div class="separator"></div>

    <div class="sidebar-mini-card">
      <h3>Availability</h3>
      <p>Open for freelance and full-time opportunities in product engineering.</p>
    </div>

    <div class="separator"></div>

    <ul class="social-list wow animate__animated animate__zoomIn" data-wow-delay="0.6s">
      <li class="social-item">
        <a href="<?php echo htmlspecialchars(DEV_GITHUB_URL, ENT_QUOTES, 'UTF-8'); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
          <ion-icon name="logo-github"></ion-icon>
        </a>
      </li>
      <li class="social-item">
        <a href="<?php echo htmlspecialchars(DEV_LINKEDIN_URL, ENT_QUOTES, 'UTF-8'); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a>
      </li>
      <li class="social-item">
        <a href="https://wa.me/7779092005" class="social-link" target="_blank" rel="noopener noreferrer">
          <ion-icon name="logo-whatsapp"></ion-icon>
        </a>
      </li>
    </ul>

  </div>

</aside>
