<!DOCTYPE html>
<html lang="en">

<head>
     <?php
     require_once __DIR__ . '/../config/constants.php';
     $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
     $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
     $scriptDir = dirname($_SERVER['SCRIPT_NAME'] ?? '/');
     $basePath = $scriptDir === DIRECTORY_SEPARATOR ? '' : rtrim(str_replace('\\', '/', $scriptDir), '/');
     $siteUrl = $scheme . '://' . $host . $basePath;
     $ogImageUrl = $siteUrl . '/assets/images/og-image.svg';
     ?>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- SEO Meta Tags -->
     <title>Dev Davda - Full Stack Developer | Laravel, PHP, Python Portfolio</title>
     <meta name="description" content="Dev Davda is a Full Stack Developer with hands-on experience in Laravel, PHP, Python, SQL, and modern frontend technologies for scalable web applications.">
     <meta name="keywords" content="Dev Davda, Full Stack Developer, Laravel Developer, PHP Developer, Python Developer, SQL Developer, Web Developer, Jamnagar, Portfolio">
     <meta name="author" content="Dev Davda">
     <meta name="robots" content="index, follow">
     <meta name="language" content="English">
     <meta name="revisit-after" content="7 days">

     <!-- Open Graph / Facebook -->
     <meta property="og:type" content="website">
     <meta property="og:url" content="<?php echo htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8'); ?>/">
     <meta property="og:title" content="Dev Davda - Full Stack Developer Portfolio">
     <meta property="og:description" content="Full Stack Developer specializing in Laravel, PHP, Python, SQL, and scalable web application development.">
     <meta property="og:image" content="<?php echo htmlspecialchars($ogImageUrl, ENT_QUOTES, 'UTF-8'); ?>">

     <!-- Twitter -->
     <meta property="twitter:card" content="summary_large_image">
     <meta property="twitter:url" content="<?php echo htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8'); ?>/">
     <meta property="twitter:title" content="Dev Davda - Full Stack Developer Portfolio">
     <meta property="twitter:description" content="Full Stack Developer specializing in Laravel, PHP, Python, SQL, and scalable web application development.">
     <meta property="twitter:image" content="<?php echo htmlspecialchars($ogImageUrl, ENT_QUOTES, 'UTF-8'); ?>">

     <!-- Canonical URL -->
     <link rel="canonical" href="<?php echo htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8'); ?>/">
     <meta name="theme-color" content="#14141a">
     <link rel="manifest" href="manifest.json">

     <!-- Favicon -->
     <link rel="shortcut icon" href="assets/images/logo.ico" type="image/x-icon">
     <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">

     <!-- CSS - Modular Structure -->
     <link rel="stylesheet" href="assets/css/variables.css">
     <link rel="stylesheet" href="assets/css/base.css">
     <link rel="stylesheet" href="assets/css/utilities.css">
     <link rel="stylesheet" href="assets/css/layout.css">
     <link rel="stylesheet" href="assets/css/animations.css">

     <!-- Component Styles -->
     <link rel="stylesheet" href="assets/css/components/preloader.css">
     <link rel="stylesheet" href="assets/css/components/sidebar.css">
     <link rel="stylesheet" href="assets/css/components/navbar.css">
     <link rel="stylesheet" href="assets/css/components/project-modal.css">
     <link rel="stylesheet" href="assets/css/components/back-to-top.css">
     <link rel="stylesheet" href="assets/css/components/tech-stack.css">
     <link rel="stylesheet" href="assets/css/components/enhancements.css">
     <link rel="stylesheet" href="assets/css/components/footer.css">

     <!-- Page Styles -->
     <link rel="stylesheet" href="assets/css/pages/about.css">
     <link rel="stylesheet" href="assets/css/pages/resume.css">
     <link rel="stylesheet" href="assets/css/pages/projects.css">
     <link rel="stylesheet" href="assets/css/pages/blog.css">
     <link rel="stylesheet" href="assets/css/pages/contact.css">

     <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

     <!-- Animate.css -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

     <!-- Structured Data (JSON-LD) -->
     <script type="application/ld+json">
          {
               "@context": "https://schema.org",
               "@type": "Person",
               "name": "Dev Davda",
               "url": "<?php echo htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8'); ?>",
               "image": "<?php echo htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8'); ?>/assets/images/my-avatar.png",
               "jobTitle": "Full Stack Developer",
               "worksFor": {
                    "@type": "Organization",
                    "name": "Mehta Websolution"
               },
               "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Jamnagar",
                    "addressRegion": "Gujarat",
                    "addressCountry": "IN"
               },
               "email": "devndavda59425@gmail.com",
               "telephone": "+917779092005",
               "sameAs": [
                    "<?php echo htmlspecialchars(DEV_GITHUB_URL, ENT_QUOTES, 'UTF-8'); ?>",
                    "<?php echo htmlspecialchars(DEV_LINKEDIN_URL, ENT_QUOTES, 'UTF-8'); ?>",
                    "https://wa.me/7779092005"
               ],
               "knowsAbout": ["Full Stack Development", "Laravel", "PHP", "Python", "JavaScript", "SQL", "UI/UX Design"]
          }
     </script>
</head>

<body>
     <canvas class="particles-canvas" data-particles-canvas aria-hidden="true"></canvas>
     <div class="cursor-dot" data-cursor-dot aria-hidden="true"></div>
     <div class="cursor-ring" data-cursor-ring aria-hidden="true"></div>
     <div class="scroll-progress" data-scroll-progress aria-hidden="true"></div>

     <div class="hire-banner" data-hire-banner>
          <p>
               Open to Work: Available for Full Stack, Laravel, and PHP freelance projects.
               <span class="visitor-count" data-visitor-count>Visitors: --</span>
          </p>
          <button type="button" class="hire-banner-close" data-hire-banner-close aria-label="Close banner">
               <ion-icon name="close-outline"></ion-icon>
          </button>
     </div>

     <!-- Preloader -->
     <div class="preloader" id="preloader">
          <div class="preloader-content">
               <div class="preloader-logo">
                    <div class="code-bracket left">{</div>
                    <div class="preloader-text">
                         <span class="dev-text">DEV</span>
                         <span class="ampersand">&</span>
                         <span class="design-text">DESIGN</span>
                    </div>
                    <div class="code-bracket right">}</div>
               </div>
               <div class="preloader-progress">
                    <div class="progress-bar"></div>
               </div>
               <div class="preloader-percentage">
                    <span class="percentage-text">0</span><span>%</span>
               </div>
          </div>
     </div>

     <!-- Back to Top Button -->
     <button class="back-to-top" data-back-to-top>
          <ion-icon name="chevron-up-outline"></ion-icon>
     </button>
