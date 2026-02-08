<?php
// Include proyecto description metabox
require_once get_template_directory() . '/inc/proyecto-description-metabox.php';

// Disable wpautop for service pages (prevents auto <br> and <p> tags)
add_filter('the_content', function($content) {
    if (is_page(array('area-de-salud', 'construccion-general', 'muebles-a-medida'))) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_content', 'wptexturize');
    }
    return $content;
}, 9);

// ============================================
// PERFORMANCE OPTIMIZATIONS
// ============================================

// 1. Remove Google Fonts loaded by WordPress/plugins (pero PERMITIR Material Symbols)
add_filter('style_loader_tag', function($html, $handle) {
    // Solo bloquear si contiene fonts.googleapis pero NO Material Symbols
    if (strpos($html, 'fonts.googleapis.com') !== false 
        && strpos($html, 'Material+Symbols') === false
        && strpos($html, 'Material%20Symbols') === false) {
        return '';
    }
    return $html;
}, 10, 2);

add_filter('script_loader_tag', function($html, $handle) {
    if (strpos($html, 'fonts.googleapis.com') !== false 
        && strpos($html, 'Material+Symbols') === false
        && strpos($html, 'Material%20Symbols') === false) {
        return '';
    }
    return $html;
}, 10, 2);

// Block Google Fonts from wp_head (excepto Material Symbols)
add_action('wp_head', function() {
    ob_start(function($buffer) {
        // Buscar y eliminar links de Google Fonts que NO sean Material Symbols
        return preg_replace('/<link[^>]*fonts\.googleapis\.com(?!.*Material[\+%20]?Symbols)[^>]*>/i', '', $buffer);
    });
}, 0);

add_action('wp_footer', function() {
    ob_end_flush();
}, 999);

// 2. Disable WordPress Emoji (saves 5KB+)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// 3. Disable WP Embed (saves bandwidth)
add_action('wp_footer', function() {
    wp_deregister_script('wp-embed');
});

// 4. Remove query strings from static resources (for better caching)
add_filter('style_loader_src', 'remove_query_strings_from_static_resources', 10, 2);
add_filter('script_loader_src', 'remove_query_strings_from_static_resources', 10, 2);
function remove_query_strings_from_static_resources($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// 5. Async CSS Loading - Prevents render blocking
add_filter('style_loader_tag', function($tag, $handle, $href) {
    // Lista de CSS que queremos cargar async (no críticos)
    $async_styles = array('custom-style'); // Handle del custom.css
    
    if (in_array($handle, $async_styles)) {
        // Convertir a preload + async
        return '<link rel="preload" href="' . $href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . 
               '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
    }
    
    return $tag;
}, 10, 3);

// 6. Preconnect to external domains (faster DNS resolution)
add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link rel="dns-prefetch" href="//images.unsplash.com">';
}, 1);

// 7. Defer non-critical CSS (Material Symbols)
add_filter('style_loader_tag', function($html, $handle) {
    if (strpos($html, 'fonts.googleapis.com') !== false && strpos($html, 'Material') !== false) {
        // Cargar con media print y cambiar a all cuando cargue
        return str_replace("rel='stylesheet'", "rel='stylesheet' media='print' onload=\"this.media='all'\"", $html);
    }
    return $html;
}, 20, 2);

// 8. Critical CSS inline (básico)
add_action('wp_head', function() {
    ?>
    <style id="critical-css">
    /* Critical CSS - Above the fold */
    body{margin:0;overflow-x:hidden;background:#0f172a;color:#fff}
    .fixed{position:fixed}
    .z-50{z-index:50}
    .w-full{width:100%}
    .flex{display:flex}
    .items-center{align-items:center}
    .justify-between{justify-content:space-between}
    nav{background:rgba(15,23,42,0.8);backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,0.05)}
    .logo-container{display:flex;align-items:center;gap:20px;color:#fff;text-decoration:none}
    .logo-glassmorphism{display:inline-flex;align-items:center;justify-content:center;padding:10px 18px;background:rgba(255,255,255,0.15);backdrop-filter:blur(16px);border-radius:14px;border:1px solid rgba(255,255,255,0.25)}
    </style>
    <?php
}, 0);


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
        'primary' => __('Menú Principal', 'radix-spa'),
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
 * Register Custom Post Type: Proyectos
 */
function radix_register_proyectos_cpt() {
    $labels = array(
        'name'                  => 'Proyectos',
        'singular_name'         => 'Proyecto',
        'menu_name'             => 'Proyectos',
        'add_new'               => 'Añadir Nuevo',
        'add_new_item'          => 'Añadir Nuevo Proyecto',
        'edit_item'             => 'Editar Proyecto',
        'new_item'              => 'Nuevo Proyecto',
        'view_item'             => 'Ver Proyecto',
        'search_items'          => 'Buscar Proyectos',
        'not_found'             => 'No se encontraron proyectos',
        'not_found_in_trash'    => 'No hay proyectos en la papelera',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'proyectos'),
        'capability_type'       => 'post',
        'menu_icon'             => 'dashicons-portfolio',
        'supports'              => array('title', 'editor', 'thumbnail'),
        'show_in_rest'          => true, // Gutenberg support
    );

    register_post_type('proyecto', $args);

    // Register taxonomy for project categories
    $tax_labels = array(
        'name'              => 'Categorías de Proyecto',
        'singular_name'     => 'Categoría',
        'search_items'      => 'Buscar Categorías',
        'all_items'         => 'Todas las Categorías',
        'edit_item'         => 'Editar Categoría',
        'update_item'       => 'Actualizar Categoría',
        'add_new_item'      => 'Añadir Nueva Categoría',
        'new_item_name'     => 'Nombre de Nueva Categoría',
        'menu_name'         => 'Categorías',
    );

    register_taxonomy('categoria-proyecto', 'proyecto', array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-proyecto'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'radix_register_proyectos_cpt');

/**
 * Add Meta Boxes for Proyecto Gallery
 */
function radix_proyecto_meta_boxes() {
    // Meta box de descripción (más intuitivo)
    add_meta_box(
        'proyecto_descripcion',
        '📝 Información del Proyecto',
        'radix_proyecto_descripcion_callback',
        'proyecto',
        'normal',
        'high'
    );
    
    // Meta box de galería
    add_meta_box(
        'proyecto_gallery',
        '📸 Galería del Proyecto',
        'radix_proyecto_gallery_callback',
        'proyecto',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'radix_proyecto_meta_boxes');

/**
 * Gallery Meta Box Callback
 */
function radix_proyecto_gallery_callback($post) {
    wp_nonce_field('radix_proyecto_gallery_nonce', 'proyecto_gallery_nonce');
    $gallery_ids = get_post_meta($post->ID, '_proyecto_gallery', true);
    ?>
    <div class="radix-gallery-container">
        <div class="radix-gallery-description">
            <p><strong>📷 Añade las imágenes de tu proyecto</strong></p>
            <p>Puedes seleccionar múltiples imágenes a la vez. Estas aparecerán en la galería del proyecto.</p>
        </div>
        
        <div id="proyecto-gallery-images" class="radix-gallery-grid">
            <?php
            if ($gallery_ids) {
                $ids = explode(',', $gallery_ids);
                foreach ($ids as $img_id) {
                    if ($img_id) {
                        $img = wp_get_attachment_image_src($img_id, 'medium');
                        if ($img) {
                            echo '<div class="radix-gallery-item" data-id="' . $img_id . '">
                                <img src="' . $img[0] . '" alt="Imagen de galería" />
                                <button type="button" class="radix-remove-image" title="Eliminar imagen">&times;</button>
                            </div>';
                        }
                    }
                }
            }
            ?>
        </div>
        
        <input type="hidden" id="proyecto_gallery_ids" name="proyecto_gallery_ids" value="<?php echo esc_attr($gallery_ids); ?>" />
        
        <div class="radix-gallery-actions">
            <button type="button" class="button button-primary button-large" id="add-gallery-images">
                <span class="dashicons dashicons-images-alt2" style="margin-top: 3px;"></span>
                Añadir Imágenes
            </button>
        </div>
    </div>
    
    <style>
        .radix-gallery-container {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .radix-gallery-description {
            margin-bottom: 20px;
            padding: 15px;
            background: white;
            border-left: 4px solid #2271b1;
            border-radius: 4px;
        }
        
        .radix-gallery-description p {
            margin: 0 0 8px 0;
        }
        
        .radix-gallery-description p:last-child {
            margin-bottom: 0;
            color: #646970;
            font-size: 13px;
        }
        
        .radix-gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
            min-height: 100px;
        }
        
        .radix-gallery-grid:empty::before {
            content: "📷 No hay imágenes en la galería. Haz clic en 'Añadir Imágenes' para comenzar.";
            grid-column: 1 / -1;
            padding: 40px 20px;
            text-align: center;
            color: #8c8f94;
            font-size: 14px;
            background: white;
            border: 2px dashed #c3c4c7;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .radix-gallery-item {
            position: relative;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            transition: all 0.2s ease;
            aspect-ratio: 1;
        }
        
        .radix-gallery-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }
        
        .radix-gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .radix-remove-image {
            position: absolute;
            top: 6px;
            right: 6px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        
        .radix-gallery-item:hover .radix-remove-image {
            opacity: 1;
        }
        
        .radix-remove-image:hover {
            background: #c82333;
            transform: scale(1.1);
        }
        
        .radix-gallery-actions {
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }
        
        #add-gallery-images {
            padding: 8px 24px;
            height: auto;
            font-size: 14px;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        var frame;
        var galleryContainer = $('#proyecto-gallery-images');
        var galleryInput = $('#proyecto_gallery_ids');

        // Add images
        $('#add-gallery-images').on('click', function(e) {
            e.preventDefault();
            
            if (frame) {
                frame.open();
                return;
            }
            
            frame = wp.media({
                title: 'Seleccionar Imágenes de Galería',
                button: { text: 'Añadir a Galería' },
                multiple: true
            });
            
            frame.on('select', function() {
                var attachments = frame.state().get('selection').toJSON();
                var currentIds = galleryInput.val() ? galleryInput.val().split(',') : [];
                
                attachments.forEach(function(attachment) {
                    if (currentIds.indexOf(attachment.id.toString()) === -1) {
                        currentIds.push(attachment.id);
                        var imgUrl = attachment.sizes && attachment.sizes.medium ? attachment.sizes.medium.url : attachment.url;
                        galleryContainer.append(
                            '<div class="radix-gallery-item" data-id="' + attachment.id + '">' +
                            '<img src="' + imgUrl + '" alt="Imagen de galería" />' +
                            '<button type="button" class="radix-remove-image" title="Eliminar imagen">&times;</button>' +
                            '</div>'
                        );
                    }
                });
                
                galleryInput.val(currentIds.join(','));
            });
            
            frame.open();
        });
        
        // Remove image
        galleryContainer.on('click', '.radix-remove-image', function(e) {
            e.preventDefault();
            var imageDiv = $(this).parent();
            var imageId = imageDiv.data('id');
            var currentIds = galleryInput.val().split(',');
            currentIds = currentIds.filter(function(id) { return id != imageId; });
            galleryInput.val(currentIds.join(','));
            imageDiv.fadeOut(200, function() { $(this).remove(); });
        });
    });
    </script>
    <?php
}




/**
 * Save Proyecto Meta Data
 */
function radix_save_proyecto_meta($post_id) {
    // Descripción
    if (isset($_POST['proyecto_descripcion_nonce']) && wp_verify_nonce($_POST['proyecto_descripcion_nonce'], 'radix_proyecto_descripcion_nonce')) {
        if (isset($_POST['proyecto_descripcion'])) {
            update_post_meta($post_id, '_proyecto_descripcion', sanitize_textarea_field($_POST['proyecto_descripcion']));
        }
        if (isset($_POST['proyecto_caracteristicas'])) {
            update_post_meta($post_id, '_proyecto_caracteristicas', sanitize_textarea_field($_POST['proyecto_caracteristicas']));
        }
        if (isset($_POST['proyecto_materiales'])) {
            update_post_meta($post_id, '_proyecto_materiales', sanitize_text_field($_POST['proyecto_materiales']));
        }
    }
    
    // Gallery
    if (isset($_POST['proyecto_gallery_nonce']) && wp_verify_nonce($_POST['proyecto_gallery_nonce'], 'radix_proyecto_gallery_nonce')) {
        if (isset($_POST['proyecto_gallery_ids'])) {
            update_post_meta($post_id, '_proyecto_gallery', sanitize_text_field($_POST['proyecto_gallery_ids']));
        }
    }
}
add_action('save_post_proyecto', 'radix_save_proyecto_meta');


/**
 * Enqueue scripts and styles
 */
function radix_scripts() {
    // Tailwind CSS - LOCAL COMPILED (23 KB vs 127 KB CDN!)
    wp_enqueue_style(
        'tailwind-local',
        get_template_directory_uri() . '/assets/css/tailwind.min.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/tailwind.min.css')
    );
    
    // Enqueue main stylesheet
    wp_enqueue_style('radix-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom CSS
    wp_enqueue_style(
        'radix-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('radix-style'),
        '1.0.0'
    );
    
    // Material Symbols Icons (optimized, display=block prevents render blocking)
    wp_enqueue_style(
        'radix-material-icons',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL@20..48,100..700,0..1&display=block',
        array(),
        null
    );
    

    // Enqueue custom JavaScript
    wp_enqueue_script(
        'radix-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        time(), // Force cache bust
        true
    );
}
add_action('wp_enqueue_scripts', 'radix_scripts');

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
        'default'           => 'contacto@radixspa.cl',
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
    $proyecto = isset($_POST['proyecto_interes']) ? sanitize_text_field($_POST['proyecto_interes']) : '';

    // Prepare email
    $to = get_theme_mod('radix_company_email', 'contacto@radixspa.cl');
    $subject = $proyecto ? "Interés en Proyecto: $proyecto - Radix Diseños" : 'Nueva Solicitud de Cotización - Radix Diseños';
    $body = "Nueva solicitud de cotización:\n\n";
    $body .= "Nombre: $name\n";
    $body .= "Email: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Servicio: $service\n";
    if ($proyecto) {
        $body .= "Proyecto de Interés: $proyecto\n";
    }
    $body .= "\nMensaje:\n$message\n";
    
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
