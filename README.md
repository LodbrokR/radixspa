# Radix Diseños - WordPress Theme

A premium WordPress theme designed for architecture and interior design firms, featuring a stunning dark mode design, modern aesthetics, and smooth animations.

## Features

- **Modern Dark Theme**: Sleek dark design with custom color palette
- **Tailwind CSS**: Utility-first CSS framework via CDN for rapid styling
- **Google Fonts**: Professional Inter font family
- **Material Icons**: Google Material Symbols for crisp iconography
- **Responsive Design**: Fully responsive across all devices
- **WordPress Customizer Integration**: Easy customization of hero section and company info
- **Custom Navigation**: WordPress menu system with mobile support
- **Custom Logo Support**: Upload your own logo
- **SEO Optimized**: Clean, semantic HTML5 markup

## Installation

1. Download the theme ZIP file
2. In WordPress admin, navigate to **Appearance > Themes > Add New**
3. Click **Upload Theme** and select the ZIP file
4. Click **Install Now** and then **Activate**

## Configuration

### 1. Set Homepage

1. Go to **Settings > Reading**
2. Under "Your homepage displays", select "A static page"
3. Set "Homepage" to the page you want as front page (or create a new page)

### 2. Create Navigation Menu

1. Go to **Appearance > Menus**
2. Create a new menu
3. Add your pages/links to the menu
4. Under "Menu Settings", check **Primary Menu**
5. Click **Save Menu**

### 3. Customize Content

1. Go to **Appearance > Customize**
2. Navigate to **Radix Theme Settings**
3. Edit:
   - Hero Headline
   - Hero Sub-Headline
   - Hero Description
   - Hero Background Image
   - Company Email
   - Company Phone
   - Company Address

### 4. Upload Logo (Optional)

1. Go to **Appearance > Customize > Site Identity**
2. Click **Select Logo** and upload your logo image
3. Recommended size: 300px wide × 100px tall

## Theme Structure

```
radix-theme/
├── style.css              # Main stylesheet with theme metadata
├── functions.php          # Theme setup and functionality
├── screenshot.png         # Theme preview image
├── README.md              # Documentation (this file)
├── header.php             # Header template
├── footer.php             # Footer template
├── front-page.php         # Homepage template
├── index.php              # Blog/archive template
├── page.php               # Single page template
├── single.php             # Single post template
└── assets/
    ├── css/
    │   └── custom.css     # Additional custom styles
    └── js/
        └── main.js        # Custom JavaScript
```

## Customization

### Colors

The theme uses these primary colors (defined in Tailwind config):

- **Primary**: `#135bec` (Blue)
- **Background Dark**: `#101622`
- **Surface Dark**: `#161b26`
- **Background Light**: `#f6f6f8`

### Fonts

- **Display Font**: Inter (300, 400, 500, 700, 900)
- **Body Font**: Inter

### Modifying Service Cards

Service cards on the homepage are currently static. To edit them:

1. Edit `front-page.php` in a child theme or theme editor
2. Locate the "Services Grid" section
3. Modify card titles, descriptions, and background images

## Support

For support, contact: <hello@radixdisenos.com>

## Credits

- **Tailwind CSS**: <https://tailwindcss.com>
- **Google Fonts (Inter)**: <https://fonts.google.com>
- **Material Symbols**: <https://fonts.google.com/icons>

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0.0

- Initial release
- Dark mode design
- Tailwind CSS integration
- WordPress Customizer settings
- Responsive navigation
- Custom logo support
