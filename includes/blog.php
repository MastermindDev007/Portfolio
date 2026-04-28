<?php
$blogFile = __DIR__ . '/../data/blog.json';
$posts = [];

if (file_exists($blogFile)) {
  $decoded = json_decode(file_get_contents($blogFile), true);
  if (is_array($decoded)) {
    $posts = $decoded;
  }
}
?>

<article class="blog" data-page="blog">

  <header>
    <h2 class="h2 article-title wow animate__animated animate__fadeInDown">Blog</h2>
  </header>

  <section class="blog-intro wow animate__animated animate__fadeInUp">
    <p>
      Engineering notes, architecture patterns, and practical lessons from real client delivery.
    </p>
  </section>

  <section class="blog-posts">
    <ul class="blog-posts-list">
      <?php if (empty($posts)): ?>
        <li class="blog-post-item blog-empty-state">
          <p>No blog posts available yet. Add posts from the admin panel.</p>
        </li>
      <?php else: ?>
        <?php foreach ($posts as $index => $post): ?>
          <?php
          $title = htmlspecialchars((string) ($post['title'] ?? 'Untitled Post'), ENT_QUOTES, 'UTF-8');
          $category = htmlspecialchars((string) ($post['category'] ?? 'General'), ENT_QUOTES, 'UTF-8');
          $excerpt = htmlspecialchars((string) ($post['excerpt'] ?? 'Article summary will be added soon.'), ENT_QUOTES, 'UTF-8');
          $image = htmlspecialchars((string) ($post['image'] ?? 'assets/images/blog-1.jpg'), ENT_QUOTES, 'UTF-8');
          $alt = htmlspecialchars((string) ($post['alt'] ?? $title), ENT_QUOTES, 'UTF-8');
          $dateRaw = (string) ($post['date'] ?? date('Y-m-d'));
          $readTime = htmlspecialchars((string) ($post['readTime'] ?? '5 min read'), ENT_QUOTES, 'UTF-8');
          $url = htmlspecialchars((string) ($post['url'] ?? '#'), ENT_QUOTES, 'UTF-8');
          $delay = number_format(($index + 1) * 0.1, 1) . 's';
          $parsedDate = strtotime($dateRaw);
          if ($parsedDate === false) {
            $parsedDate = time();
            $dateRaw = date('Y-m-d', $parsedDate);
          }
          $displayDate = date('M d, Y', $parsedDate);
          ?>
          <li class="blog-post-item wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>">
            <a href="<?php echo $url; ?>" aria-label="<?php echo $title; ?>" target="<?php echo $url === '#' ? '_self' : '_blank'; ?>" rel="noopener noreferrer">
              <figure class="blog-banner-box">
                <img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" loading="lazy" data-lazy-blur>
              </figure>
              <div class="blog-content">
                <div class="blog-meta">
                  <p class="blog-category"><?php echo $category; ?></p>
                  <span class="dot"></span>
                  <time datetime="<?php echo htmlspecialchars($dateRaw, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($displayDate, ENT_QUOTES, 'UTF-8'); ?></time>
                  <span class="dot"></span>
                  <span class="blog-read-time"><?php echo $readTime; ?></span>
                </div>
                <h3 class="h3 blog-item-title"><?php echo $title; ?></h3>
                <p class="blog-text"><?php echo $excerpt; ?></p>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </section>

</article>
