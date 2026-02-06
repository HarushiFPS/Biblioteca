<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Biblioteca</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-950 text-slate-200 antialiased selection:bg-cyan-500/30 selection:text-cyan-100">

    <nav class="glass-effect fixed w-full z-50 shadow-lg shadow-blue-500/5 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-extrabold flex items-center gap-3 tracking-tight">
                <span class="text-3xl drop-shadow-[0_0_10px_rgba(34,211,238,0.8)]">📚</span> 
                <span class="text-gradient-cyan">Nexus</span>
            </div>

            <div class="hidden md:flex items-center space-x-8 font-medium">
                <a href="#" class="hover:text-cyan-400 transition">Inicio</a>
                <a href="#servicios" class="hover:text-cyan-400 transition">Servicios</a>
                <a href="/login" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold shadow-lg shadow-cyan-500/20 hover:scale-105 transition-all">
                    Iniciar Sesión
                </a>
            </div>

            <button id="menu-btn" class="md:hidden text-slate-200 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>

        <div id="mobile-menu" class="mobile-menu absolute top-[73px] left-0 w-full bg-slate-900/95 backdrop-blur-xl border-b border-slate-800 shadow-2xl md:hidden -z-10">
            <div class="flex flex-col p-6 space-y-4 text-center">
                <a href="#" class="text-slate-300 hover:text-cyan-400 py-3">Inicio</a>
                <a href="#servicios" class="text-slate-300 hover:text-cyan-400 py-3">Servicios</a>
                <a href="/login" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-700 text-white">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <header class="relative w-full h-screen min-h-[700px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1507842217153-656bfa75bc28?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover scale-105 opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/80 to-slate-950"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-cyan-950/50 border border-cyan-400/30 text-cyan-300 text-sm font-bold tracking-wider mb-6 shadow-[0_0_15px_rgba(34,211,238,0.1)] backdrop-blur-sm">
                ✨ BIENVENIDO AL FUTURO
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Explora Sin Límites <br/> 
                <span class="text-gradient-cyan drop-shadow-[0_0_20px_rgba(34,211,238,0.3)]">Nexus Biblioteca</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-400 mb-12 max-w-2xl mx-auto">
                Tu portal digital a miles de recursos.
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="#servicios" class="px-8 py-4 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold shadow-lg shadow-cyan-500/30 hover:scale-105 transition-all">
                    Explorar Servicios
                </a>
            </div>
        </div>
    </header>

    <footer class="bg-slate-950 text-slate-400 py-12 border-t border-slate-900 text-center relative z-10">
        <p>&copy; 2024 Nexus Biblioteca. Desarrollado con Laravel.</p>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>