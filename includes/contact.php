<article class="contact" data-page="contact">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Contact</h2>
  </header>

  <section class="mapbox wow animate__animated animate__fadeInUp" data-mapbox>
    <figure>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199666.5651251294!2d-121.58334177520186!3d38.56165006739519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809ac672b28397f9%3A0x921f6aaa74197fdb!2sSacramento%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1647608789441!5m2!1sen!2sbd"
        width="400" height="300" loading="lazy"></iframe>
    </figure>
  </section>

  <section class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">

    <h3 class="h3 form-title">Contact Form</h3>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = htmlspecialchars($_POST['fullname']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Simple validation
        if (!empty($fullname) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Here you can add code to send email or save to database
            echo "<p class='success-message'>Thank you, $fullname! Your message has been sent.</p>";
        } else {
            echo "<p class='error-message'>Please fill in all fields correctly.</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" data-form>

      <div class="input-wrapper">
        <input type="text" name="fullname" class="form-input" placeholder="Full name" required data-form-input>

        <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input>
      </div>

      <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>

      <button class="form-btn" type="submit" disabled data-form-btn>
        <ion-icon name="paper-plane"></ion-icon>
        <span>Send Message</span>
      </button>

    </form>

  </section>

</article>