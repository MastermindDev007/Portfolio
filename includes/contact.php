<article class="contact" data-page="contact">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Get In Touch</h2>
    <p class="contact-subtitle wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
      Let's build something amazing together. I'm always open to discussing new projects and opportunities.
    </p>
  </header>

  <!-- Contact Info Cards -->
  <section class="contact-info-section wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
    <div class="contact-info-grid">

      <a href="mailto:devndavda59425@gmail.com" class="contact-info-card">
        <div class="contact-card-icon">
          <ion-icon name="mail-outline"></ion-icon>
        </div>
        <h4 class="h4 contact-card-title">Email Me</h4>
        <p class="contact-card-text">devndavda59425@gmail.com</p>
      </a>

      <a href="tel:7779092005" class="contact-info-card">
        <div class="contact-card-icon">
          <ion-icon name="call-outline"></ion-icon>
        </div>
        <h4 class="h4 contact-card-title">Call Me</h4>
        <p class="contact-card-text">+91 7779092005</p>
      </a>

      <a href="https://www.google.com/maps/place/Jamnagar,+Gujarat" target="_blank" class="contact-info-card">
        <div class="contact-card-icon">
          <ion-icon name="location-outline"></ion-icon>
        </div>
        <h4 class="h4 contact-card-title">Location</h4>
        <p class="contact-card-text">Jamnagar, Gujarat, India</p>
      </a>

    </div>
  </section>

  <!-- Map Section -->
  <section class="mapbox wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" data-mapbox>
    <figure>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118143.42698739018!2d70.00000000000001!3d22.47!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad7b!2sJamnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1640000000000!5m2!1sen!2sin"
        width="400"
        height="400"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </figure>
    <div class="map-overlay">
      <div class="map-info">
        <ion-icon name="location"></ion-icon>
        <span>Jamnagar, Gujarat</span>
      </div>
    </div>
  </section>

  <!-- Contact Form Section -->
  <section class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">

    <h3 class="h3 form-title">Send Me a Message</h3>
    <p class="form-subtitle">Fill out the form below and I'll get back to you within 24 hours.</p>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullname = htmlspecialchars($_POST['fullname']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);

      if (!empty($fullname) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='success-message'>
                    <ion-icon name='checkmark-circle-outline'></ion-icon>
                    <p>Thank you, $fullname! Your message has been sent successfully.</p>
                  </div>";
      } else {
        echo "<div class='error-message'>
                    <ion-icon name='alert-circle-outline'></ion-icon>
                    <p>Please fill in all fields correctly.</p>
                  </div>";
      }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" data-form>

      <div class="input-wrapper">
        <div class="form-group">
          <label for="fullname" class="form-label">
            <ion-icon name="person-outline"></ion-icon>
            Full Name
          </label>
          <input type="text" name="fullname" id="fullname" class="form-input" placeholder="John Doe" required data-form-input>
        </div>

        <div class="form-group">
          <label for="email" class="form-label">
            <ion-icon name="mail-outline"></ion-icon>
            Email Address
          </label>
          <input type="email" name="email" id="email" class="form-input" placeholder="john@example.com" required data-form-input>
        </div>
      </div>

      <div class="form-group">
        <label for="message" class="form-label">
          <ion-icon name="chatbubble-outline"></ion-icon>
          Your Message
        </label>
        <textarea name="message" id="message" class="form-input" placeholder="Tell me about your project..." required data-form-input></textarea>
      </div>

      <button class="form-btn" type="submit" disabled data-form-btn>
        <ion-icon name="paper-plane"></ion-icon>
        <span>Send Message</span>
      </button>

    </form>

  </section>

  <!-- Social Links -->
  <section class="contact-social wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
    <h4 class="h4">Connect With Me</h4>
    <ul class="social-list">
      <li class="social-item">
        <a href="https://www.linkedin.com/in/dev-davda-ab8378239" class="social-link" target="_blank">
          <ion-icon name="logo-linkedin"></ion-icon>
          <span>LinkedIn</span>
        </a>
      </li>
      <li class="social-item">
        <a href="https://wa.me/7779092005" class="social-link" target="_blank">
          <ion-icon name="logo-whatsapp"></ion-icon>
          <span>WhatsApp</span>
        </a>
      </li>
      <li class="social-item">
        <a href="https://www.instagram.com/dev_davda_555/" class="social-link" target="_blank">
          <ion-icon name="logo-instagram"></ion-icon>
          <span>Instagram</span>
        </a>
      </li>
      <li class="social-item">
        <a href="mailto:devndavda59425@gmail.com" class="social-link">
          <ion-icon name="mail-outline"></ion-icon>
          <span>Email</span>
        </a>
      </li>
    </ul>
  </section>

</article>