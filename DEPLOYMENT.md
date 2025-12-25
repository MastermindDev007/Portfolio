# Deployment Guide

Complete guide to deploying your portfolio website to production.

## 📋 Pre-Deployment Checklist

### 1. Update Personal Information
- [ ] Update name, title, and bio in `includes/sidebar.php`
- [ ] Update contact information (email, phone, location)
- [ ] Update social media links
- [ ] Update company information in `includes/about.php`

### 2. SEO Configuration
- [ ] Replace `yourwebsite.com` with actual domain in:
  - `includes/header.php` (all meta tags)
  - `sitemap.xml`
  - `robots.txt`
- [ ] Update Open Graph images (create and upload)
- [ ] Update structured data with correct information
- [ ] Update last modified dates in `sitemap.xml`

### 3. Content Updates
- [ ] Add actual projects to `data/projects.json`
- [ ] Upload project images to `assets/images/`
- [ ] Update blog posts in `includes/blog.php`
- [ ] Update resume content in `includes/resume.php`
- [ ] Update about section in `includes/about.php`

### 4. Security Setup
- [ ] Enable HTTPS redirect in `.htaccess` (uncomment lines)
- [ ] Choose WWW or non-WWW and enable in `.htaccess`
- [ ] Review and adjust security headers
- [ ] Set proper file permissions (755 for directories, 644 for files)

### 5. Assets & Media
- [ ] Create favicon set (16x16, 32x32, 180x180)
- [ ] Create Open Graph image (1200x630px recommended)
- [ ] Optimize all images (compress without quality loss)
- [ ] Replace placeholder avatar image

## 🚀 Deployment Steps

### Option 1: Shared Hosting (cPanel)

1. **Prepare Files**
   ```bash
   # Remove development files
   rm -rf .git
   rm .gitignore
   ```

2. **Upload via FTP/cPanel File Manager**
   - Connect to your hosting via FTP
   - Upload all files to `public_html` or `www` directory
   - Ensure `.htaccess` is uploaded (show hidden files)

3. **Set Permissions**
   - Directories: 755
   - Files: 644
   - .htaccess: 644

4. **Verify .htaccess**
   - Ensure `mod_rewrite` is enabled
   - Test clean URLs work

### Option 2: VPS/Cloud Server

1. **Server Requirements**
   ```bash
   # Update system
   sudo apt update && sudo apt upgrade -y
   
   # Install Apache
   sudo apt install apache2 -y
   
   # Install PHP
   sudo apt install php libapache2-mod-php php-mysql -y
   
   # Enable mod_rewrite
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

2. **Deploy Files**
   ```bash
   # Clone/upload to server
   cd /var/www/html
   
   # Set ownership
   sudo chown -R www-data:www-data /var/www/html
   
   # Set permissions
   sudo find /var/www/html -type d -exec chmod 755 {} \;
   sudo find /var/www/html -type f -exec chmod 644 {} \;
   ```

3. **Configure Apache**
   ```bash
   sudo nano /etc/apache2/sites-available/000-default.conf
   ```
   
   Add:
   ```apache
   <Directory /var/www/html>
       Options Indexes FollowSymLinks
       AllowOverride All
       Require all granted
   </Directory>
   ```
   
   ```bash
   sudo systemctl restart apache2
   ```

### Option 3: Using Git Deployment

1. **Setup Git on Server**
   ```bash
   cd /var/www/html
   git init
   git remote add origin YOUR_REPO_URL
   ```

2. **Deploy**
   ```bash
   git pull origin main
   ```

3. **Auto-deployment with GitHub Actions**
   Create `.github/workflows/deploy.yml`:
   ```yaml
   name: Deploy to Server
   
   on:
     push:
       branches: [ main ]
   
   jobs:
     deploy:
       runs-on: ubuntu-latest
       steps:
         - name: Deploy to server
           uses: appleboy/ssh-action@master
           with:
             host: ${{ secrets.HOST }}
             username: ${{ secrets.USERNAME }}
             key: ${{ secrets.SSH_KEY }}
             script: |
               cd /var/www/html
               git pull origin main
               sudo systemctl restart apache2
   ```

## 🔧 Post-Deployment Configuration

### 1. SSL Certificate (Let's Encrypt)

```bash
# Install Certbot
sudo apt install certbot python3-certbot-apache -y

# Get certificate
sudo certbot --apache -d yourdomain.com -d www.yourdomain.com

# Auto-renewal
sudo certbot renew --dry-run
```

### 2. Enable HTTPS in .htaccess
Uncomment these lines:
```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 3. Configure Caching
Already set in `.htaccess`, verify it's working:
```bash
curl -I https://yourdomain.com/assets/css/variables.css | grep -i cache
```

### 4. Test Performance
- Google PageSpeed Insights
- GTmetrix
- WebPageTest

### 5. SEO Verification
- Google Search Console
  - Add property
  - Submit sitemap.xml
  - Verify ownership
- Bing Webmaster Tools
- Test structured data: https://search.google.com/test/rich-results

## 🐛 Troubleshooting

### .htaccess Not Working
```bash
# Check if mod_rewrite is enabled
apache2ctl -M | grep rewrite

# Enable it
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### Clean URLs Not Working
Check Apache config allows `.htaccess` overrides:
```apache
AllowOverride All
```

### Permission Errors
```bash
# Fix ownership
sudo chown -R www-data:www-data /var/www/html

# Fix permissions
sudo find /var/www/html -type d -exec chmod 755 {} \;
sudo find /var/www/html -type f -exec chmod 644 {} \;
```

### PHP Not Executing
```bash
# Check PHP is installed
php -v

# Check PHP module is loaded
apache2ctl -M | grep php

# Restart Apache
sudo systemctl restart apache2
```

## 📊 Monitoring

### Set Up Google Analytics
Add to `includes/header.php` before `</head>`:
```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

### Error Logging
```php
// Add to top of index.php for debugging (remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

## 🔄 Updates & Maintenance

### Regular Tasks
- Update content regularly
- Monitor performance
- Check security headers
- Review analytics
- Update dependencies
- Backup files and database

### Backup Strategy
```bash
# Create backup script
#!/bin/bash
DATE=$(date +%Y%m%d)
tar -czf backup-$DATE.tar.gz /var/www/html
```

## 📱 Testing

Test on:
- [ ] Desktop (Chrome, Firefox, Safari, Edge)
- [ ] Tablet (iPad, Android)
- [ ] Mobile (iOS, Android)
- [ ] Different screen sizes
- [ ] Page load speed
- [ ] Form submissions
- [ ] Navigation
- [ ] All links work
- [ ] Images load correctly
- [ ] Animations smooth

## ✅ Launch Checklist

- [ ] All content updated
- [ ] SEO configured
- [ ] SSL enabled
- [ ] Analytics installed
- [ ] Search Console configured
- [ ] Social media links work
- [ ] Contact form tested
- [ ] Mobile responsive
- [ ] Performance optimized
- [ ] Security headers active
- [ ] Backup configured
- [ ] 404 pages work
- [ ] All pages load correctly

## 🎉 Success!

Your portfolio is now live! Monitor performance and make improvements based on analytics data.

For support: devndavda59425@gmail.com