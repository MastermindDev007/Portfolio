export async function initVisitorBanner() {
     const banner = document.querySelector('[data-hire-banner]');
     const closeBtn = document.querySelector('[data-hire-banner-close]');
     const visitorCounter = document.querySelector('[data-visitor-count]');

     if (!banner || !closeBtn || !visitorCounter) return;

     const storageKey = 'hireBannerDismissed';
     if (localStorage.getItem(storageKey) === 'true') {
          banner.classList.add('hide');
          return;
     }

     closeBtn.addEventListener('click', () => {
          banner.classList.add('hide');
          localStorage.setItem(storageKey, 'true');
     });

     const cfg = window.PORTFOLIO_CONFIG || {};
     const namespace = cfg.visitorNamespace || 'dev-davda-portfolio';
     const endpoint = `https://api.countapi.xyz/hit/${encodeURIComponent(namespace)}/visits`;

     try {
          const response = await fetch(endpoint, { cache: 'no-store' });
          if (!response.ok) throw new Error('Visitor counter request failed');
          const result = await response.json();
          if (typeof result.value === 'number') {
               visitorCounter.textContent = `Visitors: ${result.value.toLocaleString()}`;
          }
     } catch (error) {
          visitorCounter.textContent = 'Visitors: private';
     }
}
