<?php
// Load experience from JSON
$experience = json_decode(file_get_contents('data/experience.json'), true);

// Load education from JSON
$education = json_decode(file_get_contents('data/education.json'), true);

// Load skills from JSON
$skills = json_decode(file_get_contents('data/skills.json'), true);
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
                                        <?php if (isset($exp['status'])): ?>
                                             <br><strong>Status:</strong> <span class="<?php echo $exp['isActive'] ? 'status-ongoing' : 'status-completed'; ?>"><?php echo htmlspecialchars($exp['status']); ?></span>
                                        <?php endif; ?>
                                   </p>
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
                              <div class="skill-icon">
                                   <ion-icon name="<?php echo htmlspecialchars($skill['icon']); ?>"></ion-icon>
                              </div>
                              <div class="skill-info">
                                   <div class="title-wrapper">
                                        <h5 class="h5"><?php echo htmlspecialchars($skill['category']); ?></h5>
                                        <data value="<?php echo $skill['percentage']; ?>" class="skill-percentage"><?php echo $skill['percentage']; ?>%</data>
                                   </div>
                                   <p class="skill-tech"><?php echo htmlspecialchars($skill['technologies']); ?></p>
                              </div>
                         </div>
                         <div class="skill-progress-bg">
                              <div class="skill-progress-fill" data-width="<?php echo $skill['percentage']; ?>" style="width: 0%;">
                                   <span class="progress-shine"></span>
                              </div>
                         </div>
                    </li>
               <?php endforeach; ?>
          </ul>
     </section>

</article>