<?php
require_once __DIR__ . '/../config/constants.php';
?>

<article class="contact" data-page="contact">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Contact</h2>
  </header>

  <section class="contact-hero wow animate__animated animate__fadeInUp">
    <div class="contact-hero-copy">
      <h3 class="h3">Let’s discuss your next product build</h3>
      <p>
        Share your scope, timeline, and goals. I’ll reply with a practical build strategy, suggested stack,
        and clear delivery roadmap.
      </p>
      <ul class="contact-highlights">
        <li><ion-icon name="flash-outline"></ion-icon><span>Fast technical response</span></li>
        <li><ion-icon name="layers-outline"></ion-icon><span>Scalable architecture planning</span></li>
        <li><ion-icon name="rocket-outline"></ion-icon><span>Production-focused implementation</span></li>
      </ul>
    </div>
    <div class="contact-hero-cards">
      <article>
        <h4>Email</h4>
        <a href="mailto:<?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>">
          <?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>
        </a>
      </article>
      <article>
        <h4>Call / WhatsApp</h4>
        <a href="tel:7779092005">+91 77790 92005</a>
      </article>
      <article>
        <h4>Location</h4>
        <p>Jamnagar, Gujarat, India</p>
      </article>
    </div>
  </section>

  <section class="contact-grid">
    <section class="mapbox wow animate__animated animate__fadeInUp" data-wow-delay="0.1s" data-mapbox>
      <figure>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118143.42698739018!2d70.00000000000001!3d22.47!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c98ac71cdf0f%3A0x76dd15cfbe93ad7b!2sJamnagar%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1640000000000!5m2!1sen!2sin"
          width="400" height="400" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </figure>
      <div class="map-overlay">
        <div class="map-info">
          <ion-icon name="location"></ion-icon>
          <span>Jamnagar, Gujarat</span>
        </div>
      </div>
    </section>

    <section class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
      <h3 class="h3 form-title">Start a Conversation</h3>
      <p class="form-note">Messages are delivered via EmailJS and logged into admin inquiries.</p>

      <div class="form-status" data-form-status aria-live="polite"></div>

      <form class="form" data-form
        data-emailjs-service="<?php echo htmlspecialchars(EMAILJS_SERVICE_ID, ENT_QUOTES, 'UTF-8'); ?>"
        data-emailjs-template="<?php echo htmlspecialchars(EMAILJS_TEMPLATE_ID, ENT_QUOTES, 'UTF-8'); ?>"
        data-emailjs-public="<?php echo htmlspecialchars(EMAILJS_PUBLIC_KEY, ENT_QUOTES, 'UTF-8'); ?>"
        data-contact-email="<?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>">

        <div class="input-wrapper">
          <div class="form-group">
            <label for="fullname">Your Name</label>
            <input type="text" name="fullname" id="fullname" class="form-input" placeholder="Full Name"
              required data-form-input>
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-input" placeholder="you@example.com"
              required data-form-input>
          </div>
        </div>

        <div class="form-group">
          <label for="subject">Project Subject</label>
          <input type="text" name="subject" id="subject" class="form-input" placeholder="Website revamp / Full stack product" required data-form-input>
        </div>

        <div class="form-group form-honeypot">
          <label for="company">Company</label>
          <input type="text" name="company" id="company" autocomplete="off">
        </div>

        <div class="form-group">
          <label for="message">Project Brief</label>
          <textarea name="message" id="message" class="form-input" placeholder="Share scope, timeline, budget range, and goals."
            required data-form-input></textarea>
        </div>

        <button class="form-btn" type="submit" disabled data-form-btn>
          <ion-icon name="paper-plane"></ion-icon>
          <span>Send Message</span>
        </button>

      </form>
    </section>
  </section>

</article>
