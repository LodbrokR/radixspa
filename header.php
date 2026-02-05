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
    <div class="px-4 md:px-10 lg:px-40 py-3 flex items-center justify-between">
        <div class="flex items-center gap-2 text-white">
            <?php if (has_custom_logo()) : ?>
                <div class="custom-logo-container">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <span class="material-symbols-outlined text-primary text-3xl">architecture</span>
                <h2 class="text-white text-lg font-bold tracking-tight uppercase">
                    <?php bloginfo('name'); ?>
                </h2>
            <?php endif; ?>
        </div>
        
        <!-- Desktop Menu -->
        <div class="hidden md:flex flex-1 justify-end gap-8 items-center">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => 'div',
                'container_class' => 'flex items-center gap-8',
                'menu_class'     => 'flex items-center gap-8',
                'fallback_cb'    => false,
                'items_wrap'     => '<div class="flex items-center gap-8">%3$s</div>',
                'link_before'    => '<span class="text-gray-300 hover:text-white text-sm font-medium transition-colors">',
                'link_after'     => '</span>',
            ));
            ?>
            <a href="https://wa.me/56968252440" target="_blank" class="flex items-center justify-center overflow-hidden rounded-lg h-9 px-5 bg-primary hover:bg-amber-600 text-white text-sm font-bold transition-all shadow-[0_0_15px_rgba(245,158,11,0.3)] gap-2">
                <span class="material-symbols-outlined text-sm">chat</span>
                <span class="truncate">Cotizar</span>
            </a>
        </div>
        
        <!-- Mobile Menu Icon -->
        <button id="mobile-menu-toggle" class="md:hidden text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
    
    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden md:hidden bg-surface-dark border-t border-white/5">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => 'div',
            'container_class' => 'px-4 py-4 flex flex-col gap-3',
            'menu_class'     => 'flex flex-col gap-3',
            'fallback_cb'    => false,
            'link_before'    => '<span class="text-gray-300 hover:text-white text-sm font-medium transition-colors block py-2">',
            'link_after'     => '</span>',
        ));
        ?>
    </div>
</nav>

<div class="layout-container flex flex-col pt-16">
