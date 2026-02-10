    <!-- Footer -->
    <footer class="bg-black text-white pt-16 pb-8 border-t border-white/10">
        <div class="px-4 md:px-40 layout-container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <span class="material-symbols-outlined text-primary">architecture</span>
                            <h3 class="text-xl font-bold uppercase tracking-tight"><?php bloginfo('name'); ?></h3>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        <?php 
                        $description = get_bloginfo('description');
                        echo $description ? esc_html($description) : 'Empresa especializada en construcción general y muebles a medida en el sur de Chile. Calidad, compromiso y experiencia en cada proyecto desde Chillán hasta Puerto Varas.';
                        ?>
                    </p>
                </div>
                
                <div class="flex flex-col gap-4">
                <h3 class="text-lg font-bold text-white">Navegación</h3>
                <div class="flex flex-col gap-2">
                    <a class="text-gray-400 hover:text-white transition-colors" href="<?php echo home_url('/'); ?>">Inicio</a>
                    <a class="text-gray-400 hover:text-white transition-colors" href="<?php echo home_url('/servicios'); ?>">Servicios</a>
                    <a class="text-gray-400 hover:text-white transition-colors" href="<?php echo home_url('/proyectos'); ?>">Proyectos</a>
                    <a class="text-gray-400 hover:text-white transition-colors" href="<?php echo home_url('/nosotros'); ?>">Nosotros</a>
                </div>
            </div>
            
            <div class="flex flex-col gap-4">
                <h3 class="text-lg font-bold text-white">Contacto</h3>
                <div class="flex flex-col gap-2">
                    <a class="text-gray-400 hover:text-white transition-colors flex items-center gap-2" href="mailto:<?php echo esc_attr(get_theme_mod('radix_company_email', 'contacto@radixspa.cl')); ?>">
                        <span class="material-symbols-outlined text-sm">email</span>
                        <?php echo esc_html(get_theme_mod('radix_company_email', 'contacto@radixspa.cl')); ?>
                    </a>
                    <a class="text-gray-400 hover:text-white transition-colors flex items-center gap-2" href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('radix_company_phone', '+56 9 6825 2440'))); ?>">
                        <span class="material-symbols-outlined text-sm">phone</span>
                        <?php echo esc_html(get_theme_mod('radix_company_phone', '+56 9 6825 2440')); ?>
                    </a>
                    <a class="text-gray-400 hover:text-white transition-colors flex items-center gap-2" href="https://wa.me/56968252440" target="_blank">
                        <span class="material-symbols-outlined text-sm">chat</span>
                        WhatsApp
                    </a>
                    <p class="text-gray-400 flex items-start gap-2">
                        <span class="material-symbols-outlined text-sm mt-1">location_on</span>
                        <span><?php echo esc_html(get_theme_mod('radix_company_address', 'Panamericana Sur Km 687')); ?></span>
                    </p>
                </div>
            </div>
            
            <div class="flex flex-col gap-4">
                <h3 class="text-lg font-bold text-white">Síguenos</h3>
                <div class="flex gap-4">
                    <!-- Faceook link temporarily removed/hidden until provided -->
                    <!-- <a class="text-gray-400 hover:text-white transition-colors" href="#" aria-label="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a> -->
                    <a class="text-gray-400 hover:text-white transition-colors" href="https://www.instagram.com/radixspa/?igsh=MWhmbDA0aWl5d3YxZg==" target="_blank" aria-label="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.440 1.440 0 100 2.881 1.440 1.440 0 000-2.881z"/></svg>
                    </a>
                </div>
            </div>
            </div>
            
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-400">
                © <?php echo date('Y'); ?> Radix Diseños. Todos los derechos reservados.
            </p>
            <!-- ✅ Footer 100% español - <?php echo date('Y-m-d H:i:s'); ?> -->
                <div class="flex gap-6">
                    <a class="text-gray-400 hover:text-white transition-colors text-sm" href="<?php echo home_url('/politica-privacidad'); ?>">Política de Privacidad</a>
                    <a class="text-gray-400 hover:text-white transition-colors text-sm" href="<?php echo home_url('/terminos-servicio'); ?>">Términos de Servicio</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Radix Mobile Menu JS Loaded');
    
    var btn = document.getElementById('mobile-menu-toggle');
    var menu = document.getElementById('mobile-menu');
    
    if(btn && menu) {
        console.log('Menu elements found');
        
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle display with setAttribute to override !important
            var currentDisplay = menu.style.display;
            if(currentDisplay === 'none' || currentDisplay === '') {
                menu.setAttribute('style', 'display: block !important;');
                console.log('Menu opened - display set to block');
            } else {
                menu.setAttribute('style', 'display: none !important;');
                console.log('Menu closed - display set to none');
            }
            
            // Toggle icon
            var icon = btn.querySelector('.material-symbols-outlined');
            if(icon) {
                icon.textContent = menu.style.display === 'none' ? 'menu' : 'close';
            }
        });
        
        // Close on link click
        var links = menu.querySelectorAll('a');
        links.forEach(function(link) {
            link.addEventListener('click', function() {
                menu.setAttribute('style', 'display: none !important;');
                console.log('Menu closed by link click');
                var icon = btn.querySelector('.material-symbols-outlined');
                if(icon) icon.textContent = 'menu';
            });
        });
        
        // Close on outside click
        document.addEventListener('click', function(e) {
            if(!menu.contains(e.target) && !btn.contains(e.target) && menu.style.display !== 'none') {
                menu.setAttribute('style', 'display: none !important;');
                console.log('Menu closed by outside click');
                var icon = btn.querySelector('.material-symbols-outlined');
                if(icon) icon.textContent = 'menu';
            }
        });
    } else {
        console.log('Menu elements NOT found');
    }
});
</script>
<style>
/* Force mobile menu visibility on small screens */
@media (min-width: 768px) {
    #mobile-menu {
        display: none !important;
    }
}
</style>

<!-- Inline Marquee CSS (garantiza que siempre se cargue) -->
<style>
.marquee-container {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.marquee-content {
    display: flex;
    animation: marquee 30s linear infinite;
    will-change: transform;
}

.marquee-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0 3rem;
    white-space: nowrap;
    flex-shrink: 0;
}

@keyframes marquee {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.marquee-container:hover .marquee-content {
    animation-play-state: paused;
}
</style>

</body>
</html>
