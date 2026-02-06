<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Biblioteca Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Suavizar el scroll */
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; }
        /* Clase utilitaria para el efecto de cristal en el header */
        .glass-effect {
            background: rgba(30, 41, 59, 0.8); /* slate-800 con transparencia */
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-slate-950 text-slate-200 flex flex-col min-h-screen antialiased selection:bg-cyan-500/30 selection:text-cyan-100">

    <header class="glass-effect fixed w-full top-0 z-50 shadow-lg shadow-blue-500/5">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-extrabold flex items-center gap-3 tracking-tight">
                <span class="text-3xl drop-shadow-[0_0_10px_rgba(34,211,238,0.8)]">📚</span> 
                <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                    Nexus Biblioteca
                </span>
            </div>

            <nav class="hidden md:flex space-x-8 font-medium items-center">
                <a href="#" class="relative group py-2 transition-all duration-300 hover:text-cyan-400">
                    Inicio
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full shadow-[0_0_10px_cyan]"></span>
                </a>
                <a href="#" class="relative group py-2 transition-all duration-300 hover:text-cyan-400">
                    Usuarios
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full shadow-[0_0_10px_cyan]"></span>
                </a>
                <a href="#" class="relative group py-2 transition-all duration-300 hover:text-cyan-400">
                    Libros
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full shadow-[0_0_10px_cyan]"></span>
                </a>
                <a href="#" class="relative group py-2 transition-all duration-300 hover:text-cyan-400">
                    Préstamos
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-cyan-400 transition-all duration-300 group-hover:w-full shadow-[0_0_10px_cyan]"></span>
                </a>
                
                <a href="#" class="ml-4 px-6 py-2.5 rounded-full bg-gradient-to-r from-red-500 to-pink-600 text-white font-semibold shadow-lg shadow-red-500/30 transition-all duration-300 hover:shadow-red-500/60 hover:scale-105 hover:brightness-110">
                    Salir
                </a>
            </nav>

            <button id="menu-btn" class="md:hidden text-slate-200 focus:outline-none hover:text-cyan-400 transition">
                <svg class="w-8 h-8 drop-shadow-[0_0_8px_rgba(34,211,238,0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </header>

    <div class="flex flex-1 pt-[76px] overflow-hidden relative">
        
        <aside id="sidebar" class="bg-slate-900/95 backdrop-blur w-72 border-r border-slate-800 hidden md:block absolute md:static z-40 h-[calc(100vh-76px)] shadow-2xl transition-all duration-300">
            <div class="p-6 border-b border-slate-800">
                <h3 class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-slate-400 to-slate-200 uppercase text-xs tracking-[0.2em]">Navegación Principal</h3>
            </div>
            <nav class="p-4 space-y-3">
                <a href="#" class="flex items-center px-4 py-3 rounded-xl bg-slate-800 text-cyan-400 border-l-4 border-cyan-400 shadow-[inset_0_0_20px_rgba(34,211,238,0.1)] font-semibold transition-all">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Inicio
                </a>
                <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-cyan-400 hover:border-l-4 hover:border-cyan-400 hover:shadow-[inset_0_0_15px_rgba(34,211,238,0.15)] transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 group-hover:drop-shadow-[0_0_5px_cyan]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.747 0-3.332.477-4.5 1.253"></path></svg>
                    Libros
                </a>
                <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-purple-400 hover:border-l-4 hover:border-purple-400 hover:shadow-[inset_0_0_15px_rgba(192,132,252,0.15)] transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 group-hover:drop-shadow-[0_0_5px_purple]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Préstamos
                </a>
                
                <div class="border-t border-slate-800 my-4 opacity-50"></div>
                <a href="#" class="flex items-center px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 hover:text-red-300 hover:shadow-[inset_0_0_15px_rgba(239,68,68,0.2)] transition-all duration-300">
                     <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Cerrar Sesión
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8 overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950">
            <header class="mb-8">
                <h1 class="text-4xl font-extrabold text-white mb-2">
                    Panel de Control
                </h1>
                <p class="text-slate-400">Bienvenido de nuevo. Aquí está el resumen de hoy.</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-cyan-500/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-cyan-500/30 hover:border-cyan-400 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-cyan-500/20 rounded-full blur-3xl group-hover:bg-cyan-500/40 transition-all duration-500"></div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-cyan-300 text-sm font-semibold uppercase tracking-wider">Total Libros</h3>
                        <span class="p-2 bg-cyan-500/20 rounded-lg text-cyan-300 group-hover:drop-shadow-[0_0_5px_cyan] transition-all">📚</span>
                    </div>
                    <p class="text-4xl font-bold text-white group-hover:text-cyan-50 transition-all">1,240</p>
                    <p class="text-slate-400 text-sm mt-2"><span class="text-green-400">↑ 12%</span> vs mes anterior</p>
                </div>

                <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-purple-500/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-purple-500/30 hover:border-purple-400 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-500/20 rounded-full blur-3xl group-hover:bg-purple-500/40 transition-all duration-500"></div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-purple-300 text-sm font-semibold uppercase tracking-wider">Préstamos Activos</h3>
                         <span class="p-2 bg-purple-500/20 rounded-lg text-purple-300 group-hover:drop-shadow-[0_0_5px_purple] transition-all">🔄</span>
                    </div>
                    <p class="text-4xl font-bold text-white group-hover:text-purple-50 transition-all">45</p>
                     <p class="text-slate-400 text-sm mt-2 text-sm">5 vencen hoy</p>
                </div>

                <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-emerald-500/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-500/30 hover:border-emerald-400 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-500/20 rounded-full blur-3xl group-hover:bg-emerald-500/40 transition-all duration-500"></div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-emerald-300 text-sm font-semibold uppercase tracking-wider">Usuarios</h3>
                         <span class="p-2 bg-emerald-500/20 rounded-lg text-emerald-300 group-hover:drop-shadow-[0_0_5px_emerald] transition-all">👥</span>
                    </div>
                    <p class="text-4xl font-bold text-white group-hover:text-emerald-50 transition-all">320</p>
                    <p class="text-slate-400 text-sm mt-2"><span class="text-green-400">↑ 24</span> nuevos esta semana</p>
                </div>
            </div>

            <div class="bg-slate-800/40 backdrop-blur-md rounded-2xl shadow-xl border border-slate-700/50 p-8 relative overflow-hidden">
                <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <h2 class="text-2xl font-bold text-white">Actividad Reciente</h2>
                    <button class="px-4 py-2 bg-slate-700 text-slate-300 rounded-lg hover:bg-slate-600 hover:text-white transition-all text-sm font-medium">Ver todo</button>
                </div>
                
                <div class="border-2 border-dashed border-slate-700/50 rounded-xl h-48 flex flex-col items-center justify-center text-slate-500 relative z-10 bg-slate-800/30 hover:border-cyan-500/30 hover:bg-slate-800/50 transition-all">
                    <svg class="w-12 h-12 mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <p>Aquí se cargará la tabla de préstamos dinámicamente.</p>
                </div>
            </div>
        </main>

    </div>

    <footer class="bg-slate-900/80 backdrop-blur border-t border-slate-800 text-slate-500 py-4 text-center text-sm z-50">
        <p>&copy; 2024 Nexus Biblioteca. Desarrollado con <span class="text-red-500 hover:drop-shadow-[0_0_5px_red] transition">❤</span> y Laravel.</p>
    </footer>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    </script>
</body>
</html>sd