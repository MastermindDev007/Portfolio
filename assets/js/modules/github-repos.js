function formatRepoDate(dateString) {
     try {
          return new Intl.DateTimeFormat('en-IN', {
               day: '2-digit',
               month: 'short',
               year: 'numeric'
          }).format(new Date(dateString));
     } catch {
          return dateString;
     }
}

export async function initGithubRepos() {
     const containers = document.querySelectorAll('[data-github-repos]');
     if (!containers.length) return;

     const cfg = window.PORTFOLIO_CONFIG || {};
     const username = cfg.githubUsername || 'devndavda59425';

     try {
          const res = await fetch(`https://api.github.com/users/${encodeURIComponent(username)}/repos?sort=updated&per_page=6`);
          if (!res.ok) throw new Error('GitHub request failed');

          const repos = await res.json();
          if (!Array.isArray(repos) || !repos.length) {
               containers.forEach((container) => {
                    container.innerHTML = '<p class="github-fallback">No repositories found yet.</p>';
               });
               return;
          }

          const markup = repos
               .filter((repo) => !repo.fork)
               .slice(0, 4)
               .map((repo) => {
                    const stars = repo.stargazers_count || 0;
                    const language = repo.language || 'Code';
                    const updated = formatRepoDate(repo.updated_at);
                    return `
                         <article class="github-card">
                              <h4><a href="${repo.html_url}" target="_blank" rel="noopener noreferrer">${repo.name}</a></h4>
                              <p>${repo.description || 'Repository synced from GitHub.'}</p>
                              <div class="github-meta">
                                   <span>${language}</span>
                                   <span>★ ${stars}</span>
                                   <span>Updated ${updated}</span>
                              </div>
                         </article>
                    `;
               })
               .join('');

          containers.forEach((container) => {
               container.innerHTML = markup;
          });
     } catch (error) {
          containers.forEach((container) => {
               container.innerHTML = '<p class="github-fallback">GitHub data is temporarily unavailable.</p>';
          });
     }
}
