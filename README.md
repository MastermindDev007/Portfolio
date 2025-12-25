# Dev Davda - Full-Stack Developer Portfolio

A modern, professional portfolio website showcasing full-stack development expertise with clean design, optimal performance, and complete SEO optimization.

## 🚀 Features

- **Modular Architecture** - Clean, scalable CSS and JavaScript structure
- **SEO Optimized** - Complete meta tags, structured data, sitemap, and robots.txt
- **Responsive Design** - Works flawlessly across all devices
- **Performance Optimized** - Fast loading with efficient animations
- **Security Hardened** - .htaccess security headers and content protection
- **Modern UI/UX** - Clean, professional design suitable for senior developers

## 📁 Project Structure

```
Portfolio/
├── assets/
│   ├── css/
│   │   ├── variables.css          # Design system variables
│   │   ├── base.css                # Reset and base styles
│   │   ├── utilities.css           # Utility classes
│   │   ├── layout.css              # Layout structure
│   │   ├── animations.css          # Animation definitions
│   │   ├── components/
│   │   │   ├── preloader.css       # Preloader component
│   │   │   ├── sidebar.css         # Sidebar component
│   │   │   └── navbar.css          # Navbar component
│   │   └── pages/
│   │       ├── about.css           # About page styles
│   │       ├── resume.css          # Resume page styles
│   │       ├── projects.css        # Projects page styles
│   │       ├── blog.css            # Blog page styles
│   │       └── contact.css         # Contact page styles
│   ├── images/                     # Images and icons
│   └── js/
│       ├── main.js                 # Main entry point (ES6 modules)
│       ├── script.js               # Fallback bundle
│       └── modules/
│           ├── preloader.js        # Preloader module
│           ├── animations.js       # WOW.js animations
│           ├── sidebar.js          # Sidebar functionality
│           ├── modal.js            # Modal functionality
│           ├── navigation.js       # Page navigation
│           ├── filters.js          # Project filters
│           ├── form.js             # Form validation
│           ├── skills.js           # Skills progress bars
│           └── security.js         # Security features
├── config/
│   └── constants.php               # Global configuration
├── data/
│   └── projects.json               # Project data
├── includes/
│   ├── helpers/
│   │   └── projects-helper.php     # Project utilities
│   ├── about.php                   # About section
│   ├── blog.php                    # Blog section
│   ├── contact.php                 # Contact section
│   ├── footer.php                  # Footer with scripts
│   ├── header.php                  # Header with SEO
│   ├── navbar.php                  # Navigation bar
│   ├── portfolio.php               # Projects section
│   ├── resume.php                  # Resume section
│   └── sidebar.php                 # Sidebar component
├── .htaccess                       # Apache configuration & security
├── robots.txt                      # Search engine directives
├── sitemap.xml                     # XML sitemap
├── index.php                       # Main entry point
└── README.md                       # Documentation
```

## 🛠️ Technologies

- **Frontend**: HTML5, CSS3 (Modular), JavaScript (ES6 Modules)
- **Backend**: PHP 7.4+
- **Animations**: WOW.js, Animate.css
- **Icons**: Ionicons
- **Fonts**: Google Fonts (Poppins)
- **Data Management**: JSON

## ⚙️ Installation

### Prerequisites
- PHP 7.4 or higher
- Apache server with mod_rewrite enabled
- Modern web browser

### Setup

1. **Clone or download the repository**
   ```bash
   git clone https://github.com/yourusername/portfolio.git
   cd portfolio
   ```

2. **Configure your web server**
   - Place files in your web root (e.g., `htdocs`, `www`, `public_html`)
   - Ensure `.htaccess` is enabled

3. **Update configuration**
   - Edit `includes/header.php` - Update SEO meta tags and URLs
   - Edit `sitemap.xml` - Replace `yourwebsite.com` with your domain
   - Edit `robots.txt` - Update sitemap URL

4. **Customize content**
   - Update personal information in `includes/sidebar.php`
   - Modify sections in `includes/` directory
   - Add projects to `data/projects.json`

### Running Locally

```bash
php -S localhost:8000
```

Navigate to `http://localhost:8000`

## 📝 Customization

### Adding Projects
Edit `data/projects.json`:
```json
{
  "id": 1,
  "title": "Project Name",
  "category": "Web development",
  "image": "assets/images/project-1.jpg",
  "alt": "project description",
  "link": "#",
  "description": "Project description"
}
```

### Modifying Styles
- **Colors & Variables**: `assets/css/variables.css`
- **Page-specific styles**: `assets/css/pages/`
- **Components**: `assets/css/components/`

### Updating Content
- **About**: `includes/about.php`
- **Resume**: `includes/resume.php`
- **Contact**: `includes/contact.php`
- **Sidebar**: `includes/sidebar.php`

## 🔒 Security Features

- HTTPS enforcement (configurable in `.htaccess`)
- Security headers (XSS, clickjacking protection)
- Content protection (right-click, DevTools disabled)
- File access restrictions
- Input sanitization

## 🎯 SEO Features

- Semantic HTML5 markup
- Meta tags optimization
- Open Graph protocol
- Twitter Cards
- Structured data (JSON-LD)
- XML Sitemap
- Robots.txt
- Clean URLs
- Canonical URLs
- Performance optimization

## 📱 Responsive Breakpoints

- Mobile: < 580px
- Tablet: 580px - 1024px
- Desktop: > 1024px
- Large Desktop: > 1250px

## ⚡ Performance

- Modular CSS (load only what's needed)
- Lazy loading images
- Optimized animations
- Gzip compression
- Browser caching
- Minified assets (production)

## 🧪 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## 📄 License

This project is open source and available for personal and commercial use.

## 👤 Author

**Dev Davda**
- Email: devndavda59425@gmail.com
- Phone: +91 7779092005
- LinkedIn: [dev-davda-ab8378239](https://www.linkedin.com/in/dev-davda-ab8378239)
- Instagram: [@dev_davda_555](https://www.instagram.com/dev_davda_555/)

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## ⭐ Show Your Support

Give a ⭐️ if you like this project!

---

**Built with 💻 by Dev Davda - Full-Stack Developer**