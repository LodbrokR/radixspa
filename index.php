<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); 
?>

<div class="px-4 md:px-10 lg:px-40 py-16 md:py-24 bg-background-dark min-h-screen">
    <div class="max-w-[1280px] mx-auto">
        
        <?php if (have_posts()) : ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-surface-dark rounded-xl overflow-hidden hover:shadow-lg transition-shadow'); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="aspect-video overflow-hidden">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-white mb-3 hover:text-primary transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="text-gray-400 text-sm mb-4">
                                <?php echo get_the_date(); ?> • <?php the_author(); ?>
                            </div>
                            
                            <div class="text-gray-300 text-sm leading-relaxed mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="text-primary font-bold text-sm flex items-center gap-1 hover:gap-2 transition-all">
                                Leer Más <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </a>
                        </div>
                        
                    </article>
                    
                <?php endwhile; ?>
                
            </div>
            
            <!-- Pagination -->
            <div class="mt-12 flex justify-center gap-4">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('← Anterior', 'radix-disenos'),
                    'next_text' => __('Siguiente →', 'radix-disenos'),
                    'class'     => 'text-white',
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <div class="text-center py-20">
                <h2 class="text-3xl font-bold text-white mb-4">No Se Encontró Nada</h2>
                <p class="text-gray-400">Lo sentimos, no se encontraron resultados. Por favor intenta con otros términos de búsqueda.</p>
            </div>
            
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>
