<?php
/**
 * Template Name: QR Landing Page
 * Description: A simplified landing page for QR code scanning
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - Enlaces Rápidos</title>
    <?php wp_head(); ?>
    <style>
        /* Ensure full height and centering */
        body.page-template-page-qr {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #0a0a0a;
            background: radial-gradient(circle at center, #1a1a1a 0%, #0a0a0a 100%);
        }
        .qr-button {
             backdrop-filter: blur(10px);
        }
    </style>
</head>
<body <?php body_class('bg-background-dark text-white p-6 antialiased selection:bg-primary selection:text-white'); ?>>

    <!-- Main Container -->
    <div class="w-full max-w-md mx-auto flex flex-col items-center">
        
        <!-- Logo Section -->
        <div class="mb-10 text-center animate-fade-in-up">
            <?php if (has_custom_logo()) : ?>
                <div class="w-32 md:w-40 mx-auto mb-6 transition-transform hover:scale-105 duration-300">
                   <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-surface-dark border border-white/10 flex items-center justify-center text-primary shadow-[0_0_30px_rgba(245,158,11,0.2)]">
                    <span class="material-symbols-outlined text-5xl">architecture</span>
                </div>
                <h1 class="text-2xl font-bold tracking-tight uppercase text-white mb-1"><?php bloginfo('name'); ?></h1>
            <?php endif; ?>
            <p class="text-gray-400 text-sm tracking-[0.2em] uppercase font-medium">Diseño & Fabricación</p>
        </div>

        <!-- Buttons Grid -->
        <div class="w-full flex flex-col gap-4 animate-fade-in-up" style="animation-delay: 100ms;">
            
            <!-- Website Button -->
            <a href="https://radixspa.cl" target="_blank" class="qr-button group relative flex items-center justify-between w-full p-4 rounded-xl bg-surface-dark/80 border border-white/5 hover:border-primary/50 hover:bg-white/10 transition-all duration-300 shadow-lg hover:shadow-primary/10 hover:-translate-y-1">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-gray-800 to-black border border-white/5 flex items-center justify-center text-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-2xl">language</span>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-lg leading-tight">Sitio Web</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-400">radixspa.cl</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </div>
            </a>

            <!-- WhatsApp Button -->
            <a href="https://wa.me/56968252440" target="_blank" class="qr-button group relative flex items-center justify-between w-full p-4 rounded-xl bg-surface-dark/80 border border-white/5 hover:border-[#25D366]/50 hover:bg-white/10 transition-all duration-300 shadow-lg hover:shadow-[#25D366]/10 hover:-translate-y-1">
                <div class="flex items-center gap-4">
                     <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-gray-800 to-black border border-white/5 flex items-center justify-center text-[#25D366] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-2xl">chat</span> 
                    </div>
                    <div>
                        <span class="block text-white font-bold text-lg leading-tight">WhatsApp</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-400">+56 9 6825 2440</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#25D366] group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </div>
            </a>

            <!-- Instagram Button -->
            <a href="https://www.instagram.com/radixspa/" target="_blank" class="qr-button group relative flex items-center justify-between w-full p-4 rounded-xl bg-surface-dark/80 border border-white/5 hover:border-[#E1306C]/50 hover:bg-white/10 transition-all duration-300 shadow-lg hover:shadow-[#E1306C]/10 hover:-translate-y-1">
                 <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-gray-800 to-black border border-white/5 flex items-center justify-center text-[#E1306C] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-2xl">photo_camera</span>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-lg leading-tight">Instagram</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-400">@radixspa</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#E1306C] group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </div>
            </a>

            <!-- Email Button -->
            <a href="mailto:contacto@radixspa.cl" class="qr-button group relative flex items-center justify-between w-full p-4 rounded-xl bg-surface-dark/80 border border-white/5 hover:border-primary/50 hover:bg-white/10 transition-all duration-300 shadow-lg hover:shadow-primary/10 hover:-translate-y-1">
                 <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-gray-800 to-black border border-white/5 flex items-center justify-center text-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-2xl">mail</span>
                    </div>
                    <div>
                        <span class="block text-white font-bold text-lg leading-tight">Correo</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-400">contacto@radixspa.cl</span>
                    </div>
                </div>
                <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-sm">arrow_outward</span>
                </div>
            </a>

        </div>

        <!-- Footer Footer -->
        <div class="mt-16 text-center animate-fade-in-up" style="animation-delay: 200ms;">
             <div class="w-16 h-1 bg-white/10 mx-auto rounded-full mb-4"></div>
             <p class="text-gray-600 text-xs">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.<br>Todos los derechos reservados.
            </p>
        </div>

    </div>

    <!-- Background Decorative Elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-primary/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-white/5 rounded-full blur-[120px]"></div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
