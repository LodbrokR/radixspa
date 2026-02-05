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
                
                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex flex-col gap-3 text-sm text-gray-400',
                        'fallback_cb'    => false,
                        'link_before'    => '<span class="hover:text-primary transition-colors">',
                        'link_after'     => '</span>',
                    ));
                    ?>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-4">Contact</h4>
                    <ul class="flex flex-col gap-3 text-sm text-gray-400">
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">mail</span> 
                            <?php echo esc_html(get_theme_mod('radix_company_email', 'hello@radixdisenos.com')); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">call</span> 
                            <?php echo esc_html(get_theme_mod('radix_company_phone', '+1 (555) 123-4567')); ?>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">location_on</span> 
                            <?php echo esc_html(get_theme_mod('radix_company_address', '123 Design District, NY')); ?>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-400">
                © <?php echo date('Y'); ?> Radix Diseños. Todos los derechos reservados.
            </p>
            <!-- Deploy automático funcionando ✅ - Última actualización: <?php echo date('Y-m-d H:i:s'); ?> -->
                <div class="flex gap-6">
                    <a class="text-gray-500 hover:text-white transition-colors text-xs" href="#">Privacy Policy</a>
                    <a class="text-gray-500 hover:text-white transition-colors text-xs" href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
