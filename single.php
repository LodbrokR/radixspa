<?php
/**
 * The template for displaying all single posts
 */

get_header(); 
?>

<div class="px-4 md:px-10 lg:px-40 py-16 md:py-24 bg-background-dark min-h-screen">
    <div class="max-w-[900px] mx-auto">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-surface-dark rounded-xl overflow-hidden'); ?>>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="aspect-video overflow-hidden">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="p-8 md:p-12">
                    <header class="mb-8">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                            <?php the_title(); ?>
                        </h1>
                        <div class="flex items-center gap-4 text-gray-400 text-sm">
                            <span><?php echo get_the_date(); ?></span>
                            <span>•</span>
                            <span class="text-sm text-gray-400">Por</span>
                            <span class="text-sm text-gray-300"><?php the_author(); ?></span>
                            <?php if (has_category()) : ?>
                                <span>•</span>
                                <span><?php the_category(', '); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>
                    
                    <div class="prose prose-invert prose-lg max-w-none text-gray-300">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (has_tag()) : ?>
                        <div class="mt-8 pt-8 border-t border-white/10">
                            <h3 class="text-xl font-bold text-white mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '" class="px-3 py-1 bg-white/5 hover:bg-white/10 rounded-full text-xs text-gray-400 hover:text-white transition-colors">' . $tag->name . '</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
            </article>
            
            <!-- Post Navigation -->
            <div class="mt-8 flex justify-between items-center">
                <div class="flex-1">
                    <?php
                    $prev_post = get_previous_post();
                    if (!empty($prev_post)) :
                    ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="flex items-center gap-2 text-gray-400 hover:text-white transition-colors">
                            <span class="material-symbols-outlined">arrow_back</span>
                            <span class="text-sm text-gray-400">← Anterior</span><br><span class="text-lg font-bold"><?php echo esc_html($prev_post->post_title); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="flex-1 text-right">
                    <?php
                    $next_post = get_next_post();
                    if (!empty($next_post)) :
                    ?>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="flex items-center justify-end gap-2 text-gray-400 hover:text-white transition-colors">
                            <span class="text-sm text-gray-400">Siguiente →</span><br><span class="text-lg font-bold"><?php echo esc_html($next_post->post_title); ?></span>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php endwhile; ?>
        
    </div>
</div>

<?php get_footer(); ?>
