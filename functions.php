<?php
/**
 * Radix Diseños Theme Functions
 * 
 * @package Radix_Disenos
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function radix_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Enable support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'radix-disenos'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'radix_theme_setup');

/**
 * Enqueue scripts and styles
 */
function radix_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('radix-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom CSS
    wp_enqueue_style(
        'radix-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('radix-style'),
        '1.0.0'
    );
    
    // Enqueue Google Fonts
    wp_enqueue_style(
        'radix-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;900&display=swap',
        array(),
        null
    );
    
    // Enqueue Material Symbols Icons
    wp_enqueue_style(
        'radix-material-icons',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        array(),
        null
    );
    
    // Enqueue Tailwind CSS from CDN
    wp_enqueue_script(
        'radix-tailwind',
        'https://cdn.tailwindcss.com?plugins=forms,container-queries',
        array(),
        null,
        false
    );
    
    // Add Tailwind configuration inline
    $tailwind_config = "
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'primary': '#f59e0b',
                        'background-light': '#f6f6f8',
                        'background-dark': '#000000',
                        'surface-dark': '#0a0a0a',
                    },
                    fontFamily: {
                        'display': ['Inter', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    },
                    borderRadius: {
                        'DEFAULT': '0.25rem',
                        'lg': '0.5rem',
                        'xl': '0.75rem',
                        'full': '9999px'
                    },
                },
            },
        }
    ";
    wp_add_inline_script('radix-tailwind', $tailwind_config, 'after');
    
    // Enqueue custom JavaScript
    wp_enqueue_script(
        'radix-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'radix_enqueue_scripts');

/**
 * Customizer Settings
 */
function radix_customize_register($wp_customize) {
    
    // Add Radix Theme Settings Section
    $wp_customize->add_section('radix_theme_settings', array(
        'title'    => __('Radix Theme Settings', 'radix-disenos'),
        'priority' => 30,
    ));
    
    // Hero Section - Headline
    $wp_customize->add_setting('radix_hero_headline', array(
        'default'           => 'Construcción y Muebles a Medida',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('radix_hero_headline', array(
        'label'    => __('Hero Headline', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'text',
    ));
    
    // Hero Section - Sub Headline
    $wp_customize->add_setting('radix_hero_subheadline', array(
        'default'           => 'En el Sur de Chile',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('radix_hero_subheadline', array(
        'label'    => __('Hero Sub-Headline', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'text',
    ));
    
    // Hero Section - Description
    $wp_customize->add_setting('radix_hero_description', array(
        'default'           => 'Especialistas en construcción general, remodelación y muebles a medida. Atendemos toda la zona sur desde Chillán hasta Puerto Varas.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('radix_hero_description', array(
        'label'    => __('Hero Description', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'textarea',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('radix_hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'radix_hero_bg_image', array(
        'label'    => __('Hero Background Image', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
    )));
    
    // Company Email
    $wp_customize->add_setting('radix_company_email', array(
        'default'           => 'contacto@radixdisenos.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('radix_company_email', array(
        'label'    => __('Company Email', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'email',
    ));
    
    // Company Phone
    $wp_customize->add_setting('radix_company_phone', array(
        'default'           => '+56 9 6825 2440',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('radix_company_phone', array(
        'label'    => __('Company Phone', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'text',
    ));
    
    // Company Address
    $wp_customize->add_setting('radix_company_address', array(
        'default'           => 'Panamericana Sur Km 687 - Atendemos todo el Sur de Chile',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('radix_company_address', array(
        'label'    => __('Company Address', 'radix-disenos'),
        'section'  => 'radix_theme_settings',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'radix_customize_register');

// Contact Form Handler
function radix_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'radix_contact_form_nonce')) {
        wp_die('Error de seguridad. Por favor intenta nuevamente.');
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);

    // Prepare email
    $to = get_theme_mod('radix_company_email', 'contacto@radixdisenos.com');
    $subject = 'Nueva Solicitud de Cotización - Radix Diseños';
    $body = "Nueva solicitud de cotización:\n\n";
    $body .= "Nombre: $name\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Servicio: $service\n\n";
    $body .= "Mensaje:\n$message\n";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);

    // Redirect back with status
    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', home_url('/')));
    } else {
        wp_redirect(add_query_arg('contact', 'error', home_url('/')));
    }
    exit;
}
add_action('admin_post_nopriv_radix_contact_form', 'radix_handle_contact_form');
add_action('admin_post_radix_contact_form', 'radix_handle_contact_form');

/**
 * Disable file editing from WordPress admin for security
 */
define('DISALLOW_FILE_EDIT', true);
