export function initTiltEffects() {
     if (typeof window.VanillaTilt === 'undefined') return;

     const tiltTargets = document.querySelectorAll('.project-item > a, .skills-item, .timeline-card, .certification-item');
     if (!tiltTargets.length) return;

     window.VanillaTilt.init(tiltTargets, {
          max: 9,
          speed: 380,
          perspective: 900,
          glare: true,
          'max-glare': 0.16,
          scale: 1.02
     });
}
