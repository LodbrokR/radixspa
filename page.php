<?php
/**
 * The template for displaying all pages
 */

get_header(); 
?>

<div class="px-4 md:px-10 lg:px-40 py-16 md:py-24 bg-background-dark min-h-screen">
    <div class="max-w-[1280px] mx-auto">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-surface-dark rounded-xl p-8 md:p-12'); ?>>
                
                <header class="mb-8">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                        <?php the_title(); ?>
                    </h1>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8 rounded-xl overflow-hidden">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>
                
                <div class="prose prose-invert prose-lg max-w-none text-gray-300">
                    <?php the_content(); ?>
                </div>
                
            </article>
            
        <?php endwhile; ?>
        
    </div>
</div>

<?php get_footer(); ?>
