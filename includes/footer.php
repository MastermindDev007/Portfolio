<?php
require_once __DIR__ . '/../config/constants.php';
$currentYear = date('Y');
?>

<footer class="site-footer">
     <div class="footer-brand">
          <h3>Dev Davda</h3>
          <p>Full Stack Developer crafting scalable web products with premium UX.</p>
          <span>&copy; <?php echo $currentYear; ?> All rights reserved.</span>
     </div>

     <div class="footer-nav">
          <p>Quick Navigation</p>
          <div class="footer-nav-links">
               <button type="button" data-page-trigger="about">About</button>
               <button type="button" data-page-trigger="resume">Resume</button>
               <button type="button" data-page-trigger="projects">Projects</button>
               <button type="button" data-page-trigger="blog">Blog</button>
               <button type="button" data-page-trigger="contact">Contact</button>
          </div>
     </div>

     <div class="footer-connect">
          <p>Let’s Build Something</p>
          <a class="footer-mail" href="mailto:<?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>">
               <?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>
          </a>
          <p class="footer-availability">Open for full stack product builds, optimization, and long-term collaboration.</p>
          <button type="button" class="footer-contact-btn" data-page-trigger="contact">Start a Project</button>
     </div>
</footer>

<!-- WOW.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<!-- Optional enhancement libraries -->
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.1/dist/vanilla-tilt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<!-- Runtime config for JS modules -->
<script>
     window.PORTFOLIO_CONFIG = {
          githubUsername: <?php echo json_encode(DEV_GITHUB_USERNAME); ?>,
          githubProfileUrl: <?php echo json_encode(DEV_GITHUB_URL); ?>,
          linkedinUrl: <?php echo json_encode(DEV_LINKEDIN_URL); ?>,
          visitorNamespace: <?php echo json_encode(VISITOR_COUNTER_NAMESPACE); ?>,
          emailJsServiceId: <?php echo json_encode(EMAILJS_SERVICE_ID); ?>,
          emailJsTemplateId: <?php echo json_encode(EMAILJS_TEMPLATE_ID); ?>,
          emailJsPublicKey: <?php echo json_encode(EMAILJS_PUBLIC_KEY); ?>,
          emailJsEnabled: <?php echo json_encode(!empty(EMAILJS_SERVICE_ID) && !empty(EMAILJS_TEMPLATE_ID) && !empty(EMAILJS_PUBLIC_KEY)); ?>,
          contactReceiverEmail: <?php echo json_encode(CONTACT_RECEIVER_EMAIL); ?>
     };
</script>

<?php if (!empty(GA4_MEASUREMENT_ID)): ?>
     <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars(GA4_MEASUREMENT_ID, ENT_QUOTES, 'UTF-8'); ?>"></script>
     <script>
          window.dataLayer = window.dataLayer || [];
          function gtag() { dataLayer.push(arguments); }
          gtag('js', new Date());
          gtag('config', <?php echo json_encode(GA4_MEASUREMENT_ID); ?>);
     </script>
<?php endif; ?>

<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- Custom JS Modules -->
<script type="module" src="assets/js/main.js"></script>

<!-- Fallback for non-module browsers -->
<script nomodule src="assets/js/script.js"></script>

</body>

</html>
