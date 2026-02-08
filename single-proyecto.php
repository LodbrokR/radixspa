<?php
/**
 * Single Proyecto Template
 *
 * @package Radix_Disenos
 */

get_header();

while (have_posts()) : the_post();
    
    $gallery_ids = get_post_meta(get_the_ID(), '_proyecto_gallery', true);
    $terms = get_the_terms(get_the_ID(), 'categoria-proyecto');
?>

<!-- Hero Image -->
<div class="w-full h-[50vh] md:h-[60vh] relative overflow-hidden">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('full', array(
            'class' => 'w-full h-full object-cover',
        )); ?>
        <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-transparent to-transparent"></div>
    <?php else : ?>
        <div class="w-full h-full bg-gradient-to-br from-surface-dark to-background-dark"></div>
    <?php endif; ?>
</div>

<!-- Project Content -->
<div class="w-full bg-background-dark py-16 md:py-24">
    <div class="px-4 md:px-40 max-w-[1100px] mx-auto">
        
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <a href="<?php echo get_post_type_archive_link('proyecto'); ?>" class="text-gray-400 hover:text-primary text-sm transition-colors">
                ← Volver a Proyectos
            </a>
        </nav>
        
        <!-- Title & Meta -->
        <div class="mb-12">
            <?php if ($terms && !is_wp_error($terms)) : ?>
                <span class="inline-block px-3 py-1 bg-primary/20 text-primary text-xs font-bold uppercase tracking-wide rounded-full mb-4">
                    <?php echo esc_html($terms[0]->name); ?>
                </span>
            <?php endif; ?>
            
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-8"><?php the_title(); ?></h1>
        </div>
        
        <!-- Project Description -->
        <div class="prose prose-invert max-w-none mb-16">
            <?php the_content(); ?>
        </div>
        
        <!-- Project Gallery -->
        <?php if ($gallery_ids) : 
            $ids = explode(',', $gallery_ids);
            if (!empty($ids[0])) :
        ?>
            <div class="mb-16">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-8 flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">collections</span>
                    Galería del Proyecto
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="proyecto-gallery">
                    <?php foreach ($ids as $img_id) : 
                        if (!$img_id) continue;
                        $img_full = wp_get_attachment_image_src($img_id, 'full');
                        $img_thumb = wp_get_attachment_image_src($img_id, 'large');
                        $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                        if (!$img_full) continue;
                    ?>
                        <div class="gallery-item group cursor-pointer relative overflow-hidden rounded-lg aspect-[4/3] bg-surface-dark" 
                             data-full="<?php echo esc_url($img_full[0]); ?>">
                            <img src="<?php echo esc_url($img_thumb[0]); ?>" 
                                 alt="<?php echo esc_attr($alt ?: get_the_title()); ?>" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                 loading="lazy" />
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                <span class="material-symbols-outlined text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity">zoom_in</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; endif; ?>
        
        <!-- Contact Form -->
        <div class="bg-surface-dark rounded-2xl p-8 md:p-12 border border-white/5">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">¿Interesado en este proyecto?</h2>
            <p class="text-gray-400 mb-8">Conversemos sobre cómo podemos hacer algo similar para ti.</p>
            
            <?php if (isset($_GET['contact']) && $_GET['contact'] === 'success') : ?>
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-lg text-green-400">
                    ¡Mensaje enviado! Nos contactaremos contigo pronto.
                </div>
            <?php endif; ?>
            
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="hidden" name="action" value="radix_contact_form" />
                <input type="hidden" name="proyecto_interes" value="<?php the_title(); ?>" />
                <?php wp_nonce_field('radix_contact_form_nonce', 'contact_nonce'); ?>
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nombre *</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none transition-colors" />
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none transition-colors" />
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Teléfono *</label>
                    <input type="tel" id="phone" name="phone" required 
                           class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none transition-colors" />
                </div>
                
                <div>
                    <label for="service" class="block text-sm font-medium text-gray-300 mb-2">Servicio de Interés</label>
                    <input type="text" id="service" name="service" value="<?php the_title(); ?>" readonly
                           class="w-full px-4 py-3 bg-black/20 border border-white/10 rounded-lg text-gray-400" />
                </div>
                
                <div class="md:col-span-2">
                    <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Mensaje *</label>
                    <textarea id="message" name="message" rows="4" required 
                              class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none transition-colors resize-none"></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <button type="submit" class="w-full md:w-auto px-8 py-3 bg-primary hover:bg-amber-600 text-white font-bold rounded-lg transition-all shadow-lg shadow-amber-900/50 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">send</span>
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Project Navigation -->
        <div class="mt-16 pt-8 border-t border-white/5 flex justify-between items-center">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            
            <div>
                <?php if ($prev_post) : ?>
                    <a href="<?php echo get_permalink($prev_post); ?>" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined">arrow_back</span>
                        <span class="hidden md:inline">Proyecto Anterior</span>
                    </a>
                <?php else : ?>
                    <span class="text-gray-700"></span>
                <?php endif; ?>
            </div>
            
            <div>
                <?php if ($next_post) : ?>
                    <a href="<?php echo get_permalink($next_post); ?>" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                        <span class="hidden md:inline">Siguiente Proyecto</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                <?php else : ?>
                    <span class="text-gray-700"></span>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="fixed inset-0 bg-black/95 z-[9999] hidden items-center justify-center">
    <button id="lightbox-close" class="absolute top-6 right-6 text-white text-4xl hover:text-primary transition-colors z-10">
        <span class="material-symbols-outlined">close</span>
    </button>
    
    <button id="lightbox-prev" class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-primary transition-colors z-10">
        <span class="material-symbols-outlined">arrow_back</span>
    </button>
    
    <button id="lightbox-next" class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-primary transition-colors z-10">
        <span class="material-symbols-outlined">arrow_forward</span>
    </button>
    
    <img id="lightbox-image" src="" alt="" class="max-w-[90%] max-h-[90vh] object-contain" />
    
    <div id="lightbox-counter" class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white text-sm bg-black/50 px-4 py-2 rounded-full"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const gallery = document.getElementById('proyecto-gallery');
    if (!gallery) return;
    
    const items = gallery.querySelectorAll('.gallery-item');
    const modal = document.getElementById('lightbox-modal');
    const image = document.getElementById('lightbox-image');
    const counter = document.getElementById('lightbox-counter');
    const closeBtn = document.getElementById('lightbox-close');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');
    
    let currentIndex = 0;
    const imageUrls = Array.from(items).map(item => item.dataset.full);
    
    function showImage(index) {
        currentIndex = index;
        image.src = imageUrls[index];
        counter.textContent = `${index + 1} / ${imageUrls.length}`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }
    
    function showPrev() {
        currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
        showImage(currentIndex);
    }
    
    function showNext() {
        currentIndex = (currentIndex + 1) % imageUrls.length;
        showImage(currentIndex);
    }
    
    items.forEach((item, index) => {
        item.addEventListener('click', () => showImage(index));
    });
    
    closeBtn.addEventListener('click', closeModal);
    prevBtn.addEventListener('click', showPrev);
    nextBtn.addEventListener('click', showNext);
    
    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });
    
    document.addEventListener('keydown', function(e) {
        if (!modal.classList.contains('hidden')) {
            if (e.key === 'Escape') closeModal();
            if (e.key === 'ArrowLeft') showPrev();
            if (e.key === 'ArrowRight') showNext();
        }
    });
});
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
