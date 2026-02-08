<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-background-light dark:bg-background-dark text-slate-900 dark:text-white transition-colors duration-300'); ?>>
<?php wp_body_open(); ?>

<!-- Sticky Navigation Bar -->
<nav class="fixed top-0 left-0 w-full z-50 bg-background-dark/80 backdrop-blur-md border-b border-white/5">
    <div class="nav-container px-4 md:px-10 lg:px-40 py-3 flex items-center justify-between">
        <a href="<?php echo home_url('/'); ?>" class="logo-container">
            <?php if (has_custom_logo()) : ?>
                <div class="logo-glassmorphism">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="logo-tagline">
                    <span class="tagline-text">Diseño & Fabricación</span>
                </div>
            <?php else : ?>
                <span class="material-symbols-outlined text-primary text-3xl">architecture</span>
                <h2 class="text-white text-lg font-bold tracking-tight uppercase">
                    <?php bloginfo('name'); ?>
                </h2>
            <?php endif; ?>
        </a>
        
        <!-- Desktop Menu -->
        <div class="hidden md:flex flex-1 justify-end gap-8 items-center">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center gap-8',
                    'link_before'    => '<span class="text-gray-300 hover:text-white text-sm font-medium transition-colors">',
                    'link_after'     => '</span>',
                ));
            } else {
                // Fallback default menu (one-page navigation)
                echo '<div class="flex items-center gap-8">';
                echo '<a href="' . home_url('/') . '#inicio" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Inicio</a>';
                echo '<a href="' . home_url('/') . '#servicios" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Servicios</a>';
                echo '<a href="' . home_url('/') . '#nosotros" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Nosotros</a>';
                echo '<a href="' . get_post_type_archive_link('proyecto') . '" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Proyectos</a>';
                echo '<a href="' . home_url('/') . '#contacto" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Contacto</a>';
                echo '</div>';
            }
            ?>
            <a href="https://wa.me/56968252440" target="_blank" class="flex items-center justify-center overflow-hidden rounded-lg h-9 px-5 bg-primary hover:bg-amber-600 text-white text-sm font-bold transition-all shadow-[0_0_15px_rgba(245,158,11,0.3)] gap-2">
                <span class="material-symbols-outlined text-sm">chat</span>
                <span class="truncate">Cotizar</span>
            </a>
        </div>
        
        <!-- Mobile Menu Icon -->
        <button id="mobile-menu-toggle" class="md:hidden text-white p-2 focus:outline-none focus:bg-white/10 rounded-lg transition-colors cursor-pointer" type="button" aria-label="Menu">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>
    
    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="bg-surface-dark border-t border-white/5" style="display: none !important;">
        <div class="px-4 py-4 flex flex-col gap-3">
            <?php
            // Try to show WordPress menu first
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'link_before'    => '<span class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">',
                    'link_after'     => '</span>',
                ));
            } else {
                // Fallback default menu (one-page navigation)
                echo '<a href="' . home_url('/') . '#inicio" class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">Inicio</a>';
                echo '<a href="' . home_url('/') . '#servicios" class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">Servicios</a>';
                echo '<a href="' . home_url('/') . '#nosotros" class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">Nosotros</a>';
                echo '<a href="' . get_post_type_archive_link('proyecto') . '" class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">Proyectos</a>';
                echo '<a href="' . home_url('/') . '#contacto" class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">Contacto</a>';
            }
            ?>
        </div>
        <div class="px-4 pb-4">
            <a href="https://wa.me/56968252440" target="_blank" style="display: flex; align-items: center; justify-content: center; padding: 12px; background: #f59e0b; color: white; border-radius: 8px; font-weight: bold; gap: 8px; text-decoration: none;">
                <span class="material-symbols-outlined">chat</span>
                Contactar WhatsApp
            </a>
        </div>
    </div>
</nav>

<div class="layout-container flex flex-col pt-16">
