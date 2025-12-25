<article class="contact" data-page="contact">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Contact</h2>
  </header>

  <!-- Map Section -->
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

  <!-- Contact Form Section -->
  <section class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">

    <h3 class="h3 form-title">Send Me a Message</h3>

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
          <input type="text" name="fullname" id="fullname" class="form-input" placeholder="Full Name"
            required data-form-input>
        </div>

        <div class="form-group">
          <input type="email" name="email" id="email" class="form-input" placeholder="Email Address"
            required data-form-input>
        </div>
      </div>

      <div class="form-group">
        <textarea name="message" id="message" class="form-input" placeholder="Your Message" required
          data-form-input></textarea>
      </div>

      <button class="form-btn" type="submit" disabled data-form-btn>
        <ion-icon name="paper-plane"></ion-icon>
        <span>Send Message</span>
      </button>

    </form>

  </section>

</article>