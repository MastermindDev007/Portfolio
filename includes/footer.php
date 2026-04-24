<?php
require_once __DIR__ . '/../config/constants.php';
$currentYear = date('Y');
?>

<footer class="site-footer">
     <p>
          &copy; <?php echo $currentYear; ?> Dev Davda.
          <span class="footer-tagline">Built with clean code and strong chai.</span>
     </p>
     <div class="footer-links">
          <a href="https://github.com/<?php echo htmlspecialchars(DEV_GITHUB_USERNAME, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
               <ion-icon name="logo-github"></ion-icon>
          </a>
          <a href="https://www.linkedin.com/in/dev-davda-ab8378239" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
               <ion-icon name="logo-linkedin"></ion-icon>
          </a>
          <a href="mailto:<?php echo htmlspecialchars(CONTACT_RECEIVER_EMAIL, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Email">
               <ion-icon name="mail-outline"></ion-icon>
          </a>
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
          visitorNamespace: <?php echo json_encode(VISITOR_COUNTER_NAMESPACE); ?>,
          emailJsServiceId: <?php echo json_encode(EMAILJS_SERVICE_ID); ?>,
          emailJsTemplateId: <?php echo json_encode(EMAILJS_TEMPLATE_ID); ?>,
          emailJsPublicKey: <?php echo json_encode(EMAILJS_PUBLIC_KEY); ?>,
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
