<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS Biblioteca - Inicio</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-slate-950 text-slate-200 antialiased selection:bg-cyan-500/30 selection:text-cyan-100">

    <nav class="glass-effect fixed w-full z-50 shadow-lg shadow-blue-500/5 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-extrabold flex items-center gap-3 tracking-tight group cursor-default">
                <span class="text-3xl drop-shadow-[0_0_10px_rgba(34,211,238,0.8)] transition-transform duration-300 group-hover:rotate-12">📚</span> 
                <span class="text-gradient-cyan">NEXUS</span>
            </div>

            <div class="hidden md:flex items-center space-x-8 font-medium">
                <a href="#" class="hover:text-cyan-400 transition relative group">Inicio
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full shadow-[0_0_8px_cyan]"></span>
                </a>
                <a href="#servicios" class="hover:text-cyan-400 transition relative group">Servicios
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full shadow-[0_0_8px_cyan]"></span>
                </a>
                <a href="/login" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-semibold shadow-lg shadow-cyan-500/20 hover:scale-105 hover:shadow-cyan-500/40 transition-all duration-300">
                    Iniciar sesión
                </a>
            </div>

            <button id="menu-btn" class="md:hidden text-slate-200 focus:outline-none hover:text-cyan-400 transition">
                <i class="ph ph-list text-3xl"></i>
            </button>
        </div>

        <div id="mobile-menu" class="mobile-menu absolute top-[73px] left-0 w-full bg-slate-900/95 backdrop-blur-xl border-b border-slate-800 shadow-2xl md:hidden -z-10 hidden">
            <div class="flex flex-col p-6 space-y-4 text-center">
                <a href="#" class="text-slate-300 hover:text-cyan-400 py-3 border-b border-slate-800">Inicio</a>
                <a href="#servicios" class="text-slate-300 hover:text-cyan-400 py-3 border-b border-slate-800">Servicios</a>
                <a href="/login" class="inline-block px-6 py-3 mt-2 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-700 text-white font-bold">Iniciar sesión</a>
            </div>
        </div>
    </nav>

    <header class="relative w-full h-screen min-h-[700px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1507842217153-656bfa75bc28?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover scale-105 opacity-40 animate-pulse-slow">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/70 to-slate-950"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-cyan-950/50 border border-cyan-400/30 text-cyan-300 text-sm font-bold tracking-wider mb-8 shadow-[0_0_15px_rgba(34,211,238,0.1)] backdrop-blur-sm">
                ✨ BIENVENIDO AL FUTURO
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Explora sin límites <br/> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 drop-shadow-[0_0_25px_rgba(34,211,238,0.2)]">NEXUS Biblioteca</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-400 mb-12 max-w-2xl mx-auto leading-relaxed">
                Tu portal digital a miles de recursos. Gestiona préstamos, accede a salas de alta tecnología y sumérgete en el saber.
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="#servicios" class="px-8 py-4 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold text-lg shadow-lg shadow-cyan-500/30 hover:scale-105 hover:shadow-cyan-500/50 transition-all duration-300">
                    Explorar servicios
                </a>
            </div>
        </div>
    </header>

    <section id="servicios" class="py-24 bg-slate-950 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-[80px]"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-500/10 rounded-full blur-[80px]"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-extrabold text-white mb-4">Nuestros servicios <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">premium</span></h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-cyan-500 to-purple-600 mx-auto rounded-full"></div>
                <p class="mt-6 text-slate-400 max-w-xl mx-auto text-lg">
                    Infraestructura de vanguardia diseñada para potenciar tu aprendizaje.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="group bg-slate-900/40 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-800 hover:border-cyan-500/50 hover:shadow-[0_0_30px_rgba(34,211,238,0.15)] transition-all duration-500 hover:-translate-y-2">
                    <div class="h-56 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=2128&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-cyan-950/50 rounded-lg flex items-center justify-center text-cyan-400 mb-4 group-hover:bg-cyan-500 group-hover:text-white transition-colors duration-300">
                            <i class="ph ph-books text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-300 transition-colors">Préstamo inteligente</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Acceso instantáneo a nuestro catálogo físico. Reserva y renueva libros con un solo clic.
                        </p>
                    </div>
                </div>

                <div class="group bg-slate-900/40 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-800 hover:border-purple-500/50 hover:shadow-[0_0_30px_rgba(192,132,252,0.15)] transition-all duration-500 hover:-translate-y-2">
                    <div class="h-56 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-purple-950/50 rounded-lg flex items-center justify-center text-purple-400 mb-4 group-hover:bg-purple-500 group-hover:text-white transition-colors duration-300">
                            <i class="ph ph-users-three text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">Salas colaborativas</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Espacios de trabajo insonorizados y equipados con tecnología para tus proyectos grupales.
                        </p>
                    </div>
                </div>

                <div class="group bg-slate-900/40 backdrop-blur-sm rounded-2xl overflow-hidden border border-slate-800 hover:border-emerald-500/50 hover:shadow-[0_0_30px_rgba(16,185,129,0.15)] transition-all duration-500 hover:-translate-y-2">
                    <div class="h-56 overflow-hidden relative">
                         <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-80 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-emerald-950/50 rounded-lg flex items-center justify-center text-emerald-400 mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                            <i class="ph ph-desktop text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-emerald-300 transition-colors">Recursos digitales</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Acceso 24/7 a bases de datos globales, revistas científicas y herramientas de investigación.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('partials.footer')

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        // Script simple para el menú móvil de esta página
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if(menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>