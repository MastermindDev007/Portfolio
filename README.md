# Portfolio Website

A modern, responsive portfolio website built with PHP, showcasing professional work, skills, and achievements. This single-page application features a clean, intuitive interface with smooth navigation and interactive elements.

## Features

- **Preloader**: Modern animated preloader with progress indicator
- **About Section**: Personal introduction and services offered
- **Resume Section**: Professional experience, education, and skills
- **Projects Section**: Dynamic project showcase with JSON-based management and category filtering
- **Blog Section**: Latest articles and blog posts
- **Contact Section**: Get in touch form and social media links
- **Custom Scrollbar**: Themed scrollbar matching the portfolio design

## Technologies Used

- **PHP**: Server-side scripting for modular component structure
- **HTML5**: Semantic markup
- **CSS3**: Modern styling with responsive design
- **JavaScript**: Interactive functionality and dynamic content
- **JSON**: Project data storage

## Project Structure

```
Portfolio/
├── assets/
│   ├── css/
│   │   └── style.css          # Main stylesheet with preloader and scrollbar styles
│   ├── images/                # Images and icons
│   └── js/
│       └── script.js          # JavaScript functionality with preloader
├── config/
│   └── constants.php          # Global constants and configuration
├── data/
│   └── projects.json          # Project data (JSON format)
├── includes/
│   ├── helpers/
│   │   └── projects-helper.php  # Helper functions for project management
│   ├── about.php              # About section
│   ├── blog.php               # Blog section
│   ├── contact.php            # Contact section
│   ├── footer.php             # Footer component
│   ├── header.php             # Header component with preloader
│   ├── navbar.php             # Navigation bar
│   ├── portfolio.php          # Projects section (dynamic JSON-based)
│   ├── resume.php             # Resume section
│   └── sidebar.php            # Sidebar component
├── index.php                  # Main entry point
└── README.md                  # Project documentation
```

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- A web server (Apache, Nginx, or PHP built-in server)
- Modern web browser

### Installation

1. Clone or download this repository
2. Place the project in your web server directory (e.g., `htdocs`, `www`, or `public_html`)
3. Ensure PHP is properly configured on your server
4. Open the project in your web browser

### Running with PHP Built-in Server

If you don't have a web server configured, you can use PHP's built-in server:

```bash
php -S localhost:8000
```

Then navigate to `http://localhost:8000` in your browser.

## Customization

### Adding Projects

Projects are managed through `data/projects.json`. Simply edit the JSON file to add, modify, or remove projects. The filter categories are automatically generated from the projects.

**Project JSON Structure:**
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

**Available Categories:**
- Web development
- Web design
- Applications

Categories are case-sensitive and should match exactly. New categories will automatically appear in the filter tabs.

### Modifying Content

- **About Section**: Edit `includes/about.php`
- **Resume Section**: Edit `includes/resume.php`
- **Projects Section**: Edit `data/projects.json` (projects are loaded dynamically)
- **Blog Section**: Edit `includes/blog.php`
- **Contact Section**: Edit `includes/contact.php`

### Configuration

Global constants and configuration can be modified in `config/constants.php`. This includes:
- Directory paths
- URL paths
- Project categories
- Default settings

### Styling

Customize the appearance by modifying `assets/css/style.css`. The stylesheet uses CSS variables for easy theming and includes:
- Responsive breakpoints for mobile, tablet, and desktop views
- Custom scrollbar styling
- Preloader animations
- Theme color variables (easily customizable)

### Helper Functions

The project includes helper functions in `includes/helpers/projects-helper.php`:
- `load_projects()` - Loads and validates projects from JSON
- `get_project_categories()` - Extracts unique categories from projects
- `filter_projects_by_category()` - Filters projects by category
- `sanitize_project()` - Sanitizes project data for safe output

These functions handle error checking, validation, and data sanitization automatically.

## Features in Detail

### Preloader

The website features a modern, animated preloader that displays during page load:
- Animated code brackets with "DEV & DESIGN" text
- Progress bar with percentage counter
- Smooth fade-out animation
- Performance optimized with fallback timer

### Projects Management

The Projects section uses a JSON-based system for easy management:
- **Dynamic Loading**: Projects are loaded from `data/projects.json`
- **Auto-Generated Filters**: Category filters are automatically created from project data
- **Easy Updates**: Simply edit the JSON file to add/remove/modify projects
- **Category Filtering**: Filter projects by category (Web development, Web design, Applications)
- **Responsive Design**: Works seamlessly on all device sizes

### Custom Scrollbar

The website features a custom-styled scrollbar that matches the portfolio theme:
- Dark theme with yellow/gold accent colors
- Smooth hover effects
- Consistent styling across all scrollable elements
- Cross-browser support (Webkit and Firefox)

### Responsive Design

The website is fully responsive and adapts to different screen sizes:
- Mobile devices (< 768px)
- Tablets (768px - 1024px)
- Desktop (> 1024px)
- Large screens (> 1250px)

### Interactive Elements

- Smooth page transitions between sections
- Modal windows for detailed project views
- Mobile-friendly sidebar navigation
- Dynamic content loading
- Category-based project filtering

### Modern UI/UX

- Clean and minimalist design
- Intuitive navigation
- Smooth animations and transitions
- Accessible color scheme and typography
- Premium scrollbar styling

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## License

This project is open source and available for personal and commercial use.

## Development

### File Organization

The project follows a clean, scalable structure:
- **Config**: Global constants and configuration (`config/constants.php`)
- **Data**: JSON data files for dynamic content (`data/`)
- **Helpers**: Reusable utility functions (`includes/helpers/`)
- **Includes**: Page components and sections (`includes/`)
- **Assets**: Static files (CSS, JS, images) (`assets/`)

### Adding New Features

1. **New Projects**: Add entries to `data/projects.json`
2. **New Categories**: Add new category values in project JSON (filters auto-update)
3. **Constants**: Add global constants in `config/constants.php`
4. **Helpers**: Add utility functions in `includes/helpers/`

### Code Standards

- PHP: Follows PSR-12 coding standards
- Security: All user inputs are sanitized
- Error Handling: Comprehensive error logging
- Documentation: Functions include PHPDoc comments

## Contributing

Feel free to fork this project and customize it for your own portfolio. If you make improvements that could benefit others, pull requests are welcome!

## Contact

For questions or suggestions, please open an issue in the repository.

---

**Note**: This is a template portfolio website. Customize all content, images, and styling to reflect your personal brand and professional work.
