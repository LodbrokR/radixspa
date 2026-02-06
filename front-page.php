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

<!-- Nosotros Section -->
<div class="w-full bg-background-dark py-20">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Sobre Nosotros</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight mb-6">Compromiso y Calidad en el Sur de Chile</h3>
                <p class="text-gray-400 text-lg leading-relaxed mb-6">
                    Con más de <?php echo date('Y') - 2015; ?> años de experiencia, nos especializamos en proyectos de construcción general, infraestructura para el área de salud y fabricación de muebles a medida.
                </p>
                <p class="text-gray-400 text-lg leading-relaxed mb-6">
                    Nuestro equipo de profesionales capacitados trabaja con los más altos estándares de calidad, garantizando resultados que superan las expectativas de nuestros clientes en cada proyecto.
                </p>
                <div class="grid grid-cols-3 gap-6 mt-8">
                    <div class="text-center">
                        <p class="text-4xl font-bold text-primary mb-2">500+</p>
                        <p class="text-gray-400 text-sm">Proyectos Completados</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-primary mb-2"><?php echo date('Y') - 2015; ?>+</p>
                        <p class="text-gray-400 text-sm">Años Experiencia</p>
                    </div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-primary mb-2">100%</p>
                        <p class="text-gray-400 text-sm">Satisfacción</p>
                    </div>
                </div>
            </div>
            <div class="relative h-[500px] rounded-xl overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            </div>
        </div>
    </div>
</div>

<!-- Proceso de Trabajo -->
<div class="w-full bg-surface-dark py-20 border-y border-white/5">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Cómo Trabajamos</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight">Nuestro Proceso</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="relative">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 border-2 border-primary mb-6">
                    <span class="text-2xl font-bold text-primary">1</span>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Consulta Inicial</h4>
                <p class="text-gray-400">Conversamos sobre tu proyecto, necesidades y presupuesto por WhatsApp o en persona.</p>
            </div>
            <div class="relative">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 border-2 border-primary mb-6">
                    <span class="text-2xl font-bold text-primary">2</span>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Diseño y Presupuesto</h4>
                <p class="text-gray-400">Creamos un diseño detallado y presupuesto transparente sin costos ocultos.</p>
            </div>
            <div class="relative">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 border-2 border-primary mb-6">
                    <span class="text-2xl font-bold text-primary">3</span>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Ejecución</h4>
                <p class="text-gray-400">Nuestro equipo experto trabaja con materiales de primera calidad y seguimiento constante.</p>
            </div>
            <div class="relative">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 border-2 border-primary mb-6">
                    <span class="text-2xl font-bold text-primary">4</span>
                </div>
                <h4 class="text-xl font-bold text-white mb-3">Entrega Final</h4>
                <p class="text-gray-400">Revisión completa, limpieza del área y garantía de satisfacción total.</p>
            </div>
        </div>
    </div>
</div>

<!-- More Testimonials -->
<div class="w-full bg-background-dark py-20">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Testimonios</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight">Lo Que Dicen Nuestros Clientes</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-surface-dark p-8 rounded-xl border border-white/5">
                <div class="flex gap-1 mb-4">
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">"Excelente trabajo en la remodelación de nuestro local comercial. Muy profesionales y puntuales. Los recomiendo 100%."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">MR</div>
                    <div>
                        <p class="text-white font-bold">María Rodríguez</p>
                        <p class="text-gray-400 text-sm">Concepción, Bío Bío</p>
                    </div>
                </div>
            </div>
            <div class="bg-surface-dark p-8 rounded-xl border border-white/5">
                <div class="flex gap-1 mb-4">
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">"Los muebles de cocina quedaron hermosos. Diseño moderno, materiales de calidad y atención al detalle impecable."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">CP</div>
                    <div>
                        <p class="text-white font-bold">Carlos Pérez</p>
                        <p class="text-gray-400 text-sm">Temuco, Araucanía</p>
                    </div>
                </div>
            </div>
            <div class="bg-surface-dark p-8 rounded-xl border border-white/5">
                <div class="flex gap-1 mb-4">
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                    <span class="material-symbols-outlined text-primary text-sm">star</span>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">"Construyeron el box médico de nuestra clínica. Trabajo impecable, cumplieron todos los plazos. Muy contentos."</p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">AS</div>
                    <div>
                        <p class="text-white font-bold">Ana Silva</p>
                        <p class="text-gray-400 text-sm">Valdivia, Los Ríos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Coverage Area Detailed -->
<div class="w-full bg-surface-dark py-20 border-y border-white/5">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Zona de Cobertura</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight">Atendemos el Sur de Chile</h3>
            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">Desde Chillán hasta Puerto Varas, cubriendo las principales ciudades y comunas del sur del país.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-background-dark p-6 rounded-xl border border-white/5">
                <span class="material-symbols-outlined text-primary text-3xl mb-4">location_on</span>
                <h4 class="text-white font-bold mb-3">Región del Bío Bío</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li>• Concepción</li>
                    <li>• Chillán</li>
                    <li>• Los Ángeles</li>
                    <li>• Talcahuano</li>
                </ul>
            </div>
            <div class="bg-background-dark p-6 rounded-xl border border-white/5">
                <span class="material-symbols-outlined text-primary text-3xl mb-4">location_on</span>
                <h4 class="text-white font-bold mb-3">Región de La Araucanía</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li>• Temuco</li>
                    <li>• Angol</li>
                    <li>• Pucón</li>
                    <li>• Villarrica</li>
                </ul>
            </div>
            <div class="bg-background-dark p-6 rounded-xl border border-white/5">
                <span class="material-symbols-outlined text-primary text-3xl mb-4">location_on</span>
                <h4 class="text-white font-bold mb-3">Región de Los Ríos</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li>• Valdivia</li>
                    <li>• Panguipulli</li>
                    <li>• La Unión</li>
                    <li>• Río Bueno</li>
                </ul>
            </div>
            <div class="bg-background-dark p-6 rounded-xl border border-white/5">
                <span class="material-symbols-outlined text-primary text-3xl mb-4">location_on</span>
                <h4 class="text-white font-bold mb-3">Región de Los Lagos</h4>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li>• Osorno</li>
                    <li>• Puerto Montt</li>
                    <li>• Puerto Varas</li>
                    <li>• Castro</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="w-full bg-background-dark py-20">
    <div class="px-4 md:px-40 max-w-[900px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Preguntas Frecuentes</h2>
            <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight">¿Tienes Dudas?</h3>
        </div>
        <div class="space-y-4">
            <details class="bg-surface-dark p-6 rounded-xl border border-white/5 group">
                <summary class="text-white font-bold cursor-pointer list-none flex items-center justify-between">
                    <span>¿Cuánto tiempo toma un proyecto típico?</span>
                    <span class="material-symbols-outlined text-primary">expand_more</span>
                </summary>
                <p class="text-gray-400 mt-4 leading-relaxed">Los tiempos varían según el proyecto. Muebles a medida: 2-4 semanas. Remodelaciones: 1-3 meses. Construcciones nuevas: 3-6 meses. Te daremos un cronograma detallado en el presupuesto.</p>
            </details>
            <details class="bg-surface-dark p-6 rounded-xl border border-white/5 group">
                <summary class="text-white font-bold cursor-pointer list-none flex items-center justify-between">
                    <span>¿Qué formas de pago aceptan?</span>
                    <span class="material-symbols-outlined text-primary">expand_more</span>
                </summary>
                <p class="text-gray-400 mt-4 leading-relaxed">Aceptamos transferencias bancarias, efectivo y cheques. Trabajamos con un sistema de pagos por etapas: anticipo inicial, pagos durante la obra según avance, y pago final al término.</p>
            </details>
            <details class="bg-surface-dark p-6 rounded-xl border border-white/5 group">
                <summary class="text-white font-bold cursor-pointer list-none flex items-center justify-between">
                    <span>¿Ofrecen garantía en sus trabajos?</span>
                    <span class="material-symbols-outlined text-primary">expand_more</span>
                </summary>
                <p class="text-gray-400 mt-4 leading-relaxed">Sí, todos nuestros trabajos incluyen garantía. Construcción: 1 año. Muebles a medida: 2 años. Instalaciones eléctricas/sanitarias: según normativa vigente. La garantía cubre defectos de fabricación y mano de obra.</p>
            </details>
            <details class="bg-surface-dark p-6 rounded-xl border border-white/5 group">
                <summary class="text-white font-bold cursor-pointer list-none flex items-center justify-between">
                    <span>¿Necesito tener los materiales?</span>
                    <span class="material-symbols-outlined text-primary">expand_more</span>
                </summary>
                <p class="text-gray-400 mt-4 leading-relaxed">No es necesario. Nosotros nos encargamos de la compra de todos los materiales con nuestros proveedores de confianza, garantizando calidad y precios competitivos. Todo incluido en el presupuesto.</p>
            </details>
            <details class="bg-surface-dark p-6 rounded-xl border border-white/5 group">
                <summary class="text-white font-bold cursor-pointer list-none flex items-center justify-between">
                    <span>¿Puedo ver trabajos anteriores?</span>
                    <span class="material-symbols-outlined text-primary">expand_more</span>
                </summary>
                <p class="text-gray-400 mt-4 leading-relaxed">Por supuesto. Contáctanos por WhatsApp y te enviaremos fotos de proyectos similares al tuyo. También podemos coordinar visitas a obras en ejecución o referencias de clientes anteriores.</p>
            </details>
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<div class="w-full bg-surface-dark py-20 border-y border-white/5">
    <div class="px-4 md:px-40 max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">Contáctanos</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-white tracking-tight mb-6">Solicita tu Cotización</h3>
                <p class="text-gray-400 text-lg leading-relaxed mb-8">
                    Completa el formulario y nos contactaremos contigo en menos de 24 horas para coordinar una visita o reunión virtual.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-primary mt-1">phone</span>
                        <div>
                            <p class="text-white font-bold">Teléfono</p>
                            <p class="text-gray-400">+56 9 6825 2440</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-primary mt-1">mail</span>
                        <div>
                            <p class="text-white font-bold">Email</p>
                            <p class="text-gray-400">contacto@radixdisenos.com</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-primary mt-1">schedule</span>
                        <div>
                            <p class="text-white font-bold">Horario</p>
                            <p class="text-gray-400">Lun - Vie: 9:00 AM - 6:00 PM<br>Sáb: 10:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form id="contact-form" class="space-y-4" method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                    <input type="hidden" name="action" value="radix_contact_form">
                    <?php wp_nonce_field('radix_contact_form_nonce', 'contact_nonce'); ?>
                    
                    <div>
                        <label class="block text-white font-bold mb-2" for="name">Nombre Completo *</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div>
                        <label class="block text-white font-bold mb-2" for="email">Email *</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div>
                        <label class="block text-white font-bold mb-2" for="phone">Teléfono *</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>
                    <div>
                        <label class="block text-white font-bold mb-2" for="service">Tipo de Servicio *</label>
                        <select id="service" name="service" required class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20">
                            <option value="">Selecciona un servicio</option>
                            <option value="area-salud">Área de Salud</option>
                            <option value="construccion">Construcción General</option>
                            <option value="muebles">Muebles a Medida</option>
                            <option value="remodelacion">Remodelación</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-white font-bold mb-2" for="message">Mensaje *</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 bg-background-dark border border-white/10 rounded-lg text-white focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full h-12 px-8 rounded-lg bg-primary hover:bg-amber-600 text-white font-bold transition-all shadow-lg shadow-amber-900/50 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">send</span>
                        Enviar Solicitud
                    </button>
                    <p class="text-gray-500 text-xs text-center">También puedes contactarnos directamente por <a href="https://wa.me/56968252440" target="_blank" class="text-primary hover:underline">WhatsApp</a></p>
                </form>
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
