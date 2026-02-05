<?php
/**
 * Template Name: Homepage
 * Description: Main homepage template for Radix Diseños
 */

get_header(); 
?>

<!-- Hero Section -->
<div class="relative w-full min-h-[85vh] flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <?php 
    $hero_bg = get_theme_mod('radix_hero_bg_image');
    $default_bg = 'https://lh3.googleusercontent.com/aida-public/AB6AXuDCK0BTD8jAGctQC5Sxs04KSfsCeN5RUPSQ30Z0CkXHm0FW-4duRdlIAsEy6w9T01qrjV5Wv_LpbvI5u0dbeMIKCc-pC2f6nww6x37xZtvDBB7qlb3vy9PtXCD0iHj1mrf53tSeKi8qBU5WQ3J2jAjfOlADfgxPz0P1bsGkALWWwEy31YqTcLEdxwUwgMpsLfQZ6vB6y3FsM9cA5GyzuDe2ZfBznod2U9O-64slT7NQJXNTa-QbFCZJTFPFmTCSqlPdZBg9dMXykIIk';
    $bg_image = $hero_bg ? $hero_bg : $default_bg;
    ?>
    <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat" style="background-image: url('<?php echo esc_url($bg_image); ?>');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-background-dark/80 to-background-dark/40 z-10"></div>
    
    <!-- Hero Content -->
    <div class="relative z-20 flex flex-col items-center text-center max-w-4xl px-6 animate-fade-in-up">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight tracking-tight mb-6">
            <?php echo esc_html(get_theme_mod('radix_hero_headline', 'Redefining Spaces.')); ?><br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-300">
                <?php echo esc_html(get_theme_mod('radix_hero_subheadline', 'Elevating Experiences.')); ?>
            </span>
        </h1>
        <p class="text-gray-300 text-base md:text-lg lg:text-xl font-light max-w-2xl mb-10 leading-relaxed">
            <?php echo esc_html(get_theme_mod('radix_hero_description', 'Premium architecture and interior design specializing in high-end healthcare, commercial environments, and residential masterpieces.')); ?>
        </p>
        <div class="flex gap-4">
            <a href="#servicios" class="h-12 px-8 rounded-lg bg-primary hover:bg-amber-600 text-white font-bold text-sm tracking-wide shadow-lg shadow-amber-900/50 transition-all transform hover:-translate-y-0.5 flex items-center">
                Ver Servicios
            </a>
            <a href="https://wa.me/56968252440" target="_blank" class="h-12 px-8 rounded-lg bg-white/5 hover:bg-white/10 border border-white/10 text-white font-bold text-sm tracking-wide backdrop-blur-sm transition-all flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">chat</span>
                Contactar
            </a>
        </div>
    </div>
</div>

<!-- Coverage Area -->
<div class="w-full bg-surface-dark border-y border-white/5 py-8">
    <div class="px-4 md:px-40 text-center">
        <p class="text-gray-500 text-xs font-semibold uppercase tracking-widest mb-6">Cobertura en el Sur de Chile</p>
        <div class="flex flex-wrap justify-center gap-8 md:gap-12 opacity-60 hover:opacity-100 transition-all duration-500">
            <span class="text-white text-lg font-bold font-display flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span> Bío Bío
            </span>
            <span class="text-white text-lg font-bold font-display flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span> Araucanía
            </span>
            <span class="text-white text-lg font-bold font-display flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span> Los Ríos
            </span>
            <span class="text-white text-lg font-bold font-display flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">location_on</span> Los Lagos
            </span>
        </div>
        <p class="text-gray-400 text-xs mt-4">Desde Chillán hasta Puerto Varas</p>
    </div>
</div>

<!-- Main Content Wrapper -->
<div class="px-4 md:px-10 lg:px-40 py-16 md:py-24 bg-background-dark" id="servicios">
    <div class="layout-content-container max-w-[1280px] mx-auto">
        <!-- Headline -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div class="max-w-xl">
                <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Nuestros Servicios</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight">Calidad y compromiso en cada proyecto</h3>
            </div>
            <a class="hidden md:flex items-center gap-2 text-white/70 hover:text-white transition-colors mt-4 md:mt-0" href="#">
                Ver todos los servicios <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
        
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <!-- Card 1: Área Salud -->
            <div class="group relative overflow-hidden rounded-xl h-[500px] cursor-pointer">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAvK40bP3ATJYKCSS9gXerdzC9cgwUy91AiKbob5NomDC971W3mQ3mUxdHNRB2jCYDxJESAoL5GBVLxbXdFMG2j5WwUwky6b7fTJqPX0jlPAxxj8Y1SVirb4Y3Gtx8X-WLOaimaO6Lv79q8dGxZLSvm6gihs1SeaN3FSjQjj-oKjrmSunir8o00fK_jLwj2CTbNFGox44Xqd8b4wkLTENxTXdA0RgiaPxuGeH_AEE3Q5ft74PIDmSdRRDWCsmuNtznvjEH3Y1XbBBH-');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full flex flex-col items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white mb-2">
                        <span class="material-symbols-outlined">medical_services</span>
                    </div>
                    <h4 class="text-2xl font-bold text-white leading-tight">Área de Salud</h4>
                    <p class="text-gray-300 text-sm leading-relaxed line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                        Trabajamos desde cero: mesón de atención, box, salas de espera. Especialistas en ambientes funcionales y acogedores.
                    </p>
                    <span class="text-primary text-sm font-bold flex items-center gap-1 mt-2">
                        Más Información <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
            
            <!-- Card 2: Construcción General -->
            <div class="group relative overflow-hidden rounded-xl h-[500px] cursor-pointer">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDWdeeJHdRu2WzHTvar2RB7HsUy8_XQ8bNI56ff21GDIj7oO3BlAVi-GOig2KwEgA_6mBHd63id-4jDcsW6KI1anBSKkYoo0tC8njhYAYJSZf06U25I0Li4QM6rohqge06N2-SdhIb_rmLFsM5-t8MOk6_BnahAy7c8_wdli_zEvaXzZrP6lmgriZriIdI6nUio7m6MN0NzD_FbbCip65c8MNoKeEURJ2VmGX2V9Zs7aEBxd9TZm4-kzejImoOjEb0tX4z_RnN6rdWQ');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full flex flex-col items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white mb-2">
                        <span class="material-symbols-outlined">construction</span>
                    </div>
                    <h4 class="text-2xl font-bold text-white leading-tight">Construcción General</h4>
                    <p class="text-gray-300 text-sm leading-relaxed line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                        Locales comerciales, remodelación y terminaciones de alta calidad. Proyectos completos con acabados profesionales.
                    </p>
                    <span class="text-primary text-sm font-bold flex items-center gap-1 mt-2">
                        Más Información <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
            
            <!-- Card 3: Muebles a Medida -->
            <div class="group relative overflow-hidden rounded-xl h-[500px] cursor-pointer">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDGQ9e9FXW1X05uILileZQ7pKM66H0JnW4MSRRLx395uwLkWkT5SHdycEoGi5MPey5asgFolyBlC0kxg_W1ZPigQE6N3fj_7hz3JmCETVRaZ4DAqvCp_d2uiwrdjP9RNiJ2sBYwSijv4H_EMtzGJzyGBkxHczlbgvHexCLWGkUF-EB6oqlJHhx3U1fXV2vuuM-HoF4zmiYWGli3b5VLXEoPrNqme9J4cEjtJk-UoOZ3X0ZJitEznvpR8sEbeu7wV3ntF2WCQ8QxBXkd');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-8 w-full flex flex-col items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white mb-2">
                        <span class="material-symbols-outlined">chair</span>
                    </div>
                    <h4 class="text-2xl font-bold text-white leading-tight">Muebles a Medida</h4>
                    <p class="text-gray-300 text-sm leading-relaxed line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                        Muebles de cocina, clóset, walking closet, vanitorios, escritorios. Diseños personalizados para cada espacio.
                    </p>
                    <span class="text-primary text-sm font-bold flex items-center gap-1 mt-2">
                        Más Información <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quote / Testimonial Section -->
<div class="w-full bg-surface-dark py-20 border-y border-white/5">
    <div class="px-4 md:px-40 flex flex-col items-center text-center max-w-4xl mx-auto">
        <span class="material-symbols-outlined text-primary text-5xl mb-6">format_quote</span>
        <p class="text-2xl md:text-3xl lg:text-4xl text-white font-light leading-snug tracking-tight mb-8">
            "Excelente trabajo y compromiso. La atención al detalle en cada aspecto del proyecto superó nuestras expectativas. Recomendados 100%."
        </p>
        <div class="flex flex-col items-center gap-1">
            <p class="text-white font-bold text-lg">Cliente Satisfecho</p>
            <p class="text-primary text-sm font-medium uppercase tracking-wide">Proyecto Región del Bío Bío</p>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="w-full py-20 bg-background-dark relative overflow-hidden">
    <!-- decorative blurred blob -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="relative z-10 px-4 flex flex-col items-center text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">¿Listo para tu próximo proyecto?</h2>
        <p class="text-gray-400 max-w-xl mb-8 text-lg">Ya sea una remodelación comercial o muebles a medida, estamos listos para hacer realidad tu proyecto en el sur de Chile.</p>
        <a href="https://wa.me/56968252440" target="_blank" class="flex min-w-[200px] items-center justify-center overflow-hidden rounded-lg h-14 px-8 bg-primary text-white hover:bg-amber-600 text-base font-bold transition-all shadow-[0_0_20px_rgba(245,158,11,0.3)] gap-2">
            <span class="material-symbols-outlined">chat</span>
            Contactar por WhatsApp
        </a>
    </div>
</div>

<?php get_footer(); ?>
