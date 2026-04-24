export function initSkills() {
     const skillRings = document.querySelectorAll('[data-skill-ring]');
     const counters = document.querySelectorAll('[data-counter]');

     const animateRing = (ringElement) => {
          const value = Number(ringElement.dataset.skillValue || 0);
          const progressCircle = ringElement.querySelector('.ring-progress');
          if (!progressCircle) return;

          const radius = 42;
          const circumference = 2 * Math.PI * radius;
          const offset = circumference - (Math.min(100, Math.max(0, value)) / 100) * circumference;
          progressCircle.style.strokeDasharray = `${circumference}`;
          progressCircle.style.strokeDashoffset = `${offset}`;
     };

     const animateCounter = (counterEl) => {
          const target = Number(counterEl.dataset.counter || 0);
          const duration = 1200;
          const startTime = performance.now();

          const tick = (now) => {
               const progress = Math.min(1, (now - startTime) / duration);
               const current = Math.floor(progress * target);
               counterEl.textContent = `${current}`;
               if (progress < 1) {
                    requestAnimationFrame(tick);
               } else {
                    counterEl.textContent = `${target}`;
               }
          };

          requestAnimationFrame(tick);
     };

     const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach((entry) => {
               if (!entry.isIntersecting) return;

               if (entry.target.matches('[data-skill-ring]')) {
                    animateRing(entry.target);
               }

               if (entry.target.matches('[data-counter]')) {
                    animateCounter(entry.target);
               }

               obs.unobserve(entry.target);
          });
     }, { threshold: 0.25 });

     skillRings.forEach((ring) => observer.observe(ring));
     counters.forEach((counter) => observer.observe(counter));
}
