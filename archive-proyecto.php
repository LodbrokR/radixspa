<?php
/**
 * Archive Template for Proyectos
 *
 * @package Radix_Disenos
 */

get_header();
?>

<!-- Proyectos Archive Hero -->
<div class="w-full bg-gradient-to-b from-surface-dark to-background-dark py-20 md:py-28 border-b border-white/5">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto text-center">
        <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-4">Portafolio</h2>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">Nuestros Proyectos</h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto">
            Explora nuestra selección de proyectos completados en construcción, salud y muebles a medida por todo el sur de Chile.
        </p>
    </div>
</div>

<!-- Projects Grid -->
<div class="w-full bg-background-dark py-16 md:py-24">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        
        <?php if (have_posts()) : ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
                        <a href="<?php the_permalink(); ?>" class="block bg-surface-dark rounded-xl overflow-hidden border border-white/5 hover:border-primary/30 transition-all duration-300">
                            
                            <!-- Project Thumbnail -->
                            <div class="relative h-64 overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array(
                                        'class' => 'w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500',
                                        'loading' => 'lazy'
                                    )); ?>
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-br from-surface-dark to-background-dark flex items-center justify-center">
                                        <span class="material-symbols-outlined text-6xl text-gray-700">image</span>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Category Badge -->
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'categoria-proyecto');
                                if ($terms && !is_wp_error($terms)) :
                                    $term = $terms[0];
                                ?>
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 bg-primary/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wide rounded-full">
                                            <?php echo esc_html($term->name); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Project Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-primary transition-colors">
                                    <?php the_title(); ?>
                                </h3>
                                
                                <?php if (has_excerpt()) : ?>
                                    <p class="text-gray-400 text-sm leading-relaxed line-clamp-2">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                <?php endif; ?>
                                
                                <div class="mt-4 flex items-center gap-2 text-primary text-sm font-bold">
                                    Ver Proyecto
                                    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                </div>
                            </div>
                            
                        </a>
                    </article>
                    
                <?php endwhile; ?>
                
            </div>
            
            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<span class="material-symbols-outlined">arrow_back</span> Anterior',
                    'next_text' => 'Siguiente <span class="material-symbols-outlined">arrow_forward</span>',
                    'before_page_number' => '<span class="sr-only">Página </span>',
                    'class' => 'pagination'
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <!-- No Projects Found -->
            <div class="text-center py-20">
                <span class="material-symbols-outlined text-6xl text-gray-700 mb-4">folder_open</span>
                <h2 class="text-2xl font-bold text-white mb-2">No hay proyectos disponibles</h2>
                <p class="text-gray-400">Pronto agregaremos nuevos proyectos a nuestro portafolio.</p>
            </div>
            
        <?php endif; ?>
        
    </div>
</div>

<!-- CTA Section -->
<div class="w-full py-20 bg-surface-dark border-t border-white/5">
    <div class="px-4 md:px-40 max-w-[900px] mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">¿Tienes un proyecto en mente?</h2>
        <p class="text-gray-400 mb-8">Conversemos sobre cómo podemos hacer realidad tu proyecto en el sur de Chile.</p>
        <a href="https://wa.me/56968252440" target="_blank" class="inline-flex items-center justify-center h-12 px-8 rounded-lg bg-primary hover:bg-amber-600 text-white font-bold transition-all shadow-lg shadow-amber-900/50 gap-2">
            <span class="material-symbols-outlined">chat</span>
            Contactar por WhatsApp
        </a>
    </div>
</div>

<?php get_footer(); ?>
