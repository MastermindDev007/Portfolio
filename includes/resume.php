<?php
// Load experience from JSON
$experience = json_decode(file_get_contents('data/experience.json'), true);

// Load education from JSON
$education = json_decode(file_get_contents('data/education.json'), true);

// Load skills from JSON
$skills = json_decode(file_get_contents('data/skills.json'), true);

// Load certifications from JSON
$certifications = json_decode(file_get_contents('data/certifications.json'), true);
$certifications = is_array($certifications) ? $certifications : [];

// Load interests from JSON
$interests = json_decode(file_get_contents('data/interests.json'), true);
$interests = is_array($interests) ? $interests : [];

$certCount = count($certifications);
$topScore = 0;
foreach ($certifications as $cert) {
     if (preg_match('/(\\d+)\\s*\\/\\s*(\\d+)/', $cert['score'] ?? '', $matches)) {
          $score = (int) $matches[1];
          $total = (int) $matches[2];
          if ($total <= 100 && $score > $topScore) {
               $topScore = $score;
          }
     }
}
?>

<article class="resume" data-page="resume">

     <header>
          <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Resume</h2>
     </header>

     <div class="resume-container">
          <!-- Experience Section -->
          <section class="timeline experience-section wow animate__animated animate__fadeInLeft">
               <div class="title-wrapper">
                    <div class="icon-box">
                         <ion-icon name="briefcase-outline"></ion-icon>
                    </div>
                    <h3 class="h3">Experience</h3>
               </div>
               <ol class="timeline-list">
                    <?php foreach ($experience as $exp): ?>
                         <li class="timeline-item wow animate__animated animate__fadeInLeft" data-wow-delay="<?php echo $exp['delay']; ?>">
                              <div class="timeline-card <?php echo $exp['isActive'] ? 'active-card' : ''; ?>">
                                   <div class="timeline-header">
                                        <h4 class="h4 timeline-item-title"><?php echo htmlspecialchars($exp['title']); ?></h4>
                                        <span class="timeline-badge <?php echo $exp['isActive'] ? 'active-badge' : ''; ?>"><?php echo htmlspecialchars($exp['badge']); ?></span>
                                   </div>
                                   <p class="timeline-text">
                                        <strong>Company:</strong> <?php echo htmlspecialchars($exp['company']); ?><br>
                                        <strong>Location:</strong> <?php echo htmlspecialchars($exp['location']); ?><br>
                                        <strong>Duration:</strong> <?php echo htmlspecialchars($exp['duration']); ?>
                                        <?php if (!empty($exp['website'])): ?>
                                             <br><strong>Website:</strong> <a class="timeline-link" href="<?php echo htmlspecialchars($exp['website']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($exp['website']); ?></a>
                                        <?php endif; ?>
                                        <?php if (isset($exp['status'])): ?>
                                             <br><strong>Status:</strong> <span class="<?php echo $exp['isActive'] ? 'status-ongoing' : 'status-completed'; ?>"><?php echo htmlspecialchars($exp['status']); ?></span>
                                        <?php endif; ?>
                                   </p>
                                   <?php if (!empty($exp['highlights']) && is_array($exp['highlights'])): ?>
                                        <ul class="timeline-highlights">
                                             <?php foreach ($exp['highlights'] as $highlight): ?>
                                                  <li><?php echo htmlspecialchars($highlight); ?></li>
                                             <?php endforeach; ?>
                                        </ul>
                                   <?php endif; ?>
                              </div>
                         </li>
                    <?php endforeach; ?>
               </ol>
          </section>

          <!-- Education Section -->
          <section class="timeline education-section wow animate__animated animate__fadeInRight">
               <div class="title-wrapper">
                    <div class="icon-box">
                         <ion-icon name="school-outline"></ion-icon>
                    </div>
                    <h3 class="h3">Education</h3>
               </div>
               <ol class="timeline-list">
                    <?php foreach ($education as $edu): ?>
                         <li class="timeline-item wow animate__animated animate__fadeInRight" data-wow-delay="<?php echo $edu['delay']; ?>">
                              <div class="timeline-card <?php echo $edu['isActive'] ? 'active-card' : ''; ?>">
                                   <div class="timeline-header">
                                        <h4 class="h4 timeline-item-title"><?php echo htmlspecialchars($edu['title']); ?></h4>
                                        <span class="timeline-badge <?php echo $edu['isActive'] ? 'active-badge' : ''; ?>"><?php echo htmlspecialchars($edu['badge']); ?></span>
                                   </div>
                                   <p class="timeline-text">
                                        <strong>University:</strong> <?php echo htmlspecialchars($edu['university']); ?><br>
                                        <strong>College:</strong> <?php echo htmlspecialchars($edu['college']); ?><br>
                                        <strong>Status:</strong> <span class="<?php echo $edu['isActive'] ? 'status-ongoing' : 'status-completed'; ?>"><?php echo htmlspecialchars($edu['status']); ?></span><br>
                                        <strong>Note:</strong> <?php echo htmlspecialchars($edu['note']); ?>
                                   </p>
                              </div>
                         </li>
                    <?php endforeach; ?>
               </ol>
          </section>
     </div>

     <!-- Certifications Section -->
     <section class="certifications">
          <div class="title-wrapper wow animate__animated animate__fadeInUp">
               <div class="icon-box">
                    <ion-icon name="ribbon-outline"></ion-icon>
               </div>
               <h3 class="h3 certifications-title">Certifications & Achievements</h3>
          </div>
          <div class="cert-metrics">
               <div class="cert-metric">
                    <span class="cert-metric-value" data-counter="<?php echo $certCount; ?>">0</span>
                    <p>Total Credentials</p>
               </div>
               <div class="cert-metric">
                    <span class="cert-metric-value" data-counter="<?php echo $topScore; ?>">0</span>
                    <p>Highest Practical Score</p>
               </div>
          </div>
          <ul class="certifications-list">
               <?php foreach ($certifications as $cert): ?>
                    <li class="certification-item wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $cert['delay']; ?>">
                         <div class="certification-icon certification-<?php echo htmlspecialchars($cert['color']); ?>">
                              <ion-icon name="<?php echo htmlspecialchars($cert['icon']); ?>"></ion-icon>
                         </div>
                         <div class="certification-content">
                              <div class="certification-header">
                                   <h4 class="h4 certification-title"><?php echo htmlspecialchars($cert['title']); ?></h4>
                                   <span class="certification-date"><?php echo htmlspecialchars($cert['date']); ?></span>
                              </div>
                              <p class="certification-meta">
                                   <strong>Issuer:</strong> <?php echo htmlspecialchars($cert['issuer']); ?>
                              </p>
                              <p class="certification-meta">
                                   <strong>Score:</strong> <?php echo htmlspecialchars($cert['score']); ?>
                              </p>
                              <p class="certification-meta">
                                   <strong>Result:</strong> <?php echo htmlspecialchars($cert['grade']); ?>
                              </p>
                         </div>
                    </li>
               <?php endforeach; ?>
          </ul>
     </section>

     <?php if (!empty($interests)): ?>
          <section class="interests">
               <div class="title-wrapper wow animate__animated animate__fadeInUp">
                    <div class="icon-box">
                         <ion-icon name="sparkles-outline"></ion-icon>
                    </div>
                    <h3 class="h3 interests-title">Interests</h3>
               </div>
               <ul class="interests-list">
                    <?php foreach ($interests as $interest): ?>
                         <li class="interest-item wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo htmlspecialchars($interest['delay'] ?? '0s'); ?>">
                              <h4 class="h4 interest-title"><?php echo htmlspecialchars($interest['title']); ?></h4>
                              <p class="interest-text"><?php echo htmlspecialchars($interest['description']); ?></p>
                         </li>
                    <?php endforeach; ?>
               </ul>
          </section>
     <?php endif; ?>

     <!-- Skills Section -->
     <section class="skill">
          <div class="title-wrapper wow animate__animated animate__fadeInUp">
               <div class="icon-box">
                    <ion-icon name="code-slash-outline"></ion-icon>
               </div>
               <h3 class="h3 skills-title">My Skills</h3>
          </div>
          <ul class="skills-list content-card">
               <?php foreach ($skills as $skill): ?>
                    <li class="skills-item wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $skill['delay']; ?>">
                         <div class="skill-header">
                              <div class="skill-ring" data-skill-ring data-skill-value="<?php echo $skill['percentage']; ?>">
                                   <svg viewBox="0 0 100 100" class="skill-ring-svg" aria-hidden="true">
                                        <circle class="ring-bg" cx="50" cy="50" r="42"></circle>
                                        <circle class="ring-progress" cx="50" cy="50" r="42"></circle>
                                   </svg>
                                   <span class="ring-label"><?php echo $skill['percentage']; ?>%</span>
                              </div>
                              <div class="skill-info">
                                   <div class="title-wrapper">
                                        <h5 class="h5"><?php echo htmlspecialchars($skill['category']); ?></h5>
                                        <data value="<?php echo $skill['percentage']; ?>" class="skill-percentage"><?php echo $skill['percentage']; ?> mastery</data>
                                   </div>
                                   <p class="skill-tech"><?php echo htmlspecialchars($skill['technologies']); ?></p>
                              </div>
                         </div>
                    </li>
               <?php endforeach; ?>
          </ul>
     </section>

</article>
