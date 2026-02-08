<?php
/**
 * Template Name: Página de Servicio
 * 
 * Template para páginas de servicios individuales
 */

get_header();
?>

<style>
/* Service Page Styles */
.service-hero {
    position: relative;
    min-height: 60vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #161b26 0%, #1f2937 100%);
    overflow: hidden;
}

.service-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>') center/cover;
    opacity: 0.2;
    z-index: 0;
}

.service-hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    max-width: 800px;
    padding: 2rem;
}

.service-hero h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    color: white;
    margin-bottom: 1rem;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.service-hero-subtitle {
    font-size: 1.25rem;
    color: #e5e7eb;
    margin-bottom: 2rem;
}

.service-section {
    padding: 4rem 1rem;
}

.service-container {
    max-width: 1200px;
    margin: 0 auto;
}

.service-description {
    font-size: 1.125rem;
    line-height: 1.8;
    color: #d1d5db;
    margin-bottom: 2rem;
}

.service-benefits {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.benefit-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 1rem;
    padding: 2rem;
    transition: all 0.3s ease;
}

.benefit-card:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(245, 158, 11, 0.3);
    transform: translateY(-4px);
}

.benefit-icon {
    font-size: 3rem;
    color: #f59e0b;
    margin-bottom: 1rem;
}

.benefit-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: white;
    margin-bottom: 0.5rem;
}

.benefit-text {
    color: #9ca3af;
    line-height: 1.6;
}

.process-timeline {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.process-step {
    position: relative;
    text-align: center;
    padding: 2rem 1rem;
}

.process-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.process-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: white;
    margin-bottom: 0.5rem;
}

.process-description {
    color: #9ca3af;
    font-size: 0.95rem;
}

.service-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin: 3rem 0;
}

.gallery-item {
    position: relative;
    border-radius: 1rem;
    overflow: hidden;
    aspect-ratio: 4/3;
    background: rgba(255, 255, 255, 0.05);
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

.contact-form-section {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(217, 119, 6, 0.05));
    border-radius: 1.5rem;
    padding: 3rem 2rem;
    margin: 3rem 0;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    color: white;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #f59e0b;
    background: rgba(255, 255, 255, 0.08);
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
}

.cta-banner {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    border-radius: 1.5rem;
    padding: 3rem 2rem;
    text-align: center;
    margin: 3rem 0;
}

.cta-title {
    font-size: 2rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.cta-text {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .service-hero {
        min-height: 50vh;
    }
    
    .service-section {
        padding: 2rem 1rem;
    }
}
</style>

<div class="service-hero">
    <div class="service-hero-content">
        <h1><?php the_title(); ?></h1>
        <p class="service-hero-subtitle"><?php echo get_post_meta(get_the_ID(), '_service_subtitle', true); ?></p>
        <a href="https://wa.me/56968252440" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 bg-primary hover:bg-amber-600 text-white font-bold rounded-lg transition-all shadow-lg hover:shadow-xl">
            <span class="material-symbols-outlined">chat</span>
            Cotizar Proyecto
        </a>
    </div>
</div>

<div class="service-section">
    <div class="service-container">
        <h2 class="text-3xl font-bold text-white mb-6">¿Qué Ofrecemos?</h2>
        <div class="service-description">
            <?php echo wpautop(get_post_meta(get_the_ID(), '_service_description', true)); ?>
        </div>

        <?php
        $benefits = get_post_meta(get_the_ID(), '_service_benefits', true);
        if ($benefits) :
            $benefits_array = explode('|', $benefits);
        ?>
        <h2 class="text-3xl font-bold text-white mb-6 mt-12">Servicios Incluidos</h2>
        <div class="service-benefits">
            <?php
            $icons = ['medical_services', 'construction', 'chair', 'design_services', 'business', 'handyman'];
            foreach ($benefits_array as $index => $benefit) :
                $icon = $icons[$index % count($icons)];
            ?>
            <div class="benefit-card">
                <span class="material-symbols-outlined benefit-icon"><?php echo $icon; ?></span>
                <h3 class="benefit-title"><?php echo esc_html(trim($benefit)); ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php
        $process = get_post_meta(get_the_ID(), '_service_process', true);
        if ($process) :
            $process_array = explode('|', $process);
        ?>
        <h2 class="text-3xl font-bold text-white mb-6 mt-12">Nuestro Proceso</h2>
        <div class="process-timeline">
            <?php foreach ($process_array as $index => $step) : ?>
            <div class="process-step">
                <div class="process-number"><?php echo $index + 1; ?></div>
                <h3 class="process-title"><?php echo esc_html(trim($step)); ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail()) : ?>
        <h2 class="text-3xl font-bold text-white mb-6 mt-12">Galería de Proyectos</h2>
        <div class="service-gallery">
            <?php
            $gallery_ids = get_post_meta(get_the_ID(), '_service_gallery', true);
            if ($gallery_ids) {
                $images = explode(',', $gallery_ids);
                foreach ($images as $image_id) {
                    echo '<div class="gallery-item">';
                    echo wp_get_attachment_image(trim($image_id), 'large');
                    echo '</div>';
                }
            }
            ?>
        </div>
        <?php endif; ?>

        <div class="contact-form-section">
            <h2 class="text-3xl font-bold text-white mb-6">Solicita tu Cotización</h2>
            <form action="https://wa.me/56968252440" method="get" target="_blank">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" class="form-input" placeholder="Juan Pérez" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" class="form-input" placeholder="+56 9 1234 5678" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" placeholder="correo@ejemplo.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Cuéntanos sobre tu proyecto</label>
                    <textarea class="form-textarea" placeholder="Describe brevemente lo que necesitas..." required></textarea>
                </div>
                <button type="submit" class="w-full md:w-auto px-8 py-4 bg-primary hover:bg-amber-600 text-white font-bold rounded-lg transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">send</span>
                    Enviar Consulta por WhatsApp
                </button>
            </form>
        </div>

        <div class="cta-banner">
            <h2 class="cta-title">¿Listo para comenzar tu proyecto?</h2>
            <p class="cta-text">Contáctanos hoy y recibe una cotización personalizada sin compromiso</p>
            <a href="https://wa.me/56968252440?text=Hola! Me interesa el servicio de <?php echo urlencode(get_the_title()); ?>" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-amber-600 font-bold rounded-lg transition-all hover:shadow-2xl">
                <span class="material-symbols-outlined">call</span>
                +56 9 6825 2440
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
