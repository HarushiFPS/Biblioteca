<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS - Panel de administración</title>
    
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📚</text></svg>">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-200 antialiased h-screen flex flex-col overflow-hidden selection:bg-pink-500/30 selection:text-pink-100">

    <header class="glass-effect fixed w-full top-0 z-50 shadow-lg shadow-blue-500/5 h-[76px] flex items-center border-b border-slate-800/50">
        <div class="container mx-auto px-6 flex justify-between items-center w-full">
            
            <a href="/admin" class="text-2xl font-extrabold flex items-center gap-3 tracking-tight group">
                <span class="text-3xl drop-shadow-[0_0_10px_rgba(34,211,238,0.8)] transition-transform duration-300 group-hover:rotate-12">📚</span> 
                <div class="leading-tight">
                    <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent block">NEXUS</span>
                    <span class="text-xs text-slate-400 font-medium tracking-widest uppercase block">Admin panel</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-8">
                
                <nav class="flex items-center gap-6 text-sm font-medium text-slate-400">
                    <a href="/" class="hover:text-cyan-400 transition-colors flex items-center gap-2 group">
                        <i class="ph ph-house text-lg group-hover:scale-110 transition-transform"></i> Inicio
                    </a>
                    <a href="#" class="hover:text-emerald-400 transition-colors flex items-center gap-2 group">
                        <i class="ph ph-users text-lg group-hover:scale-110 transition-transform"></i> Usuarios
                    </a>
                    <a href="#" class="hover:text-purple-400 transition-colors flex items-center gap-2 group">
                        <i class="ph ph-books text-lg group-hover:scale-110 transition-transform"></i> Libros
                    </a>
                </nav>

                <div class="w-px h-6 bg-slate-700"></div>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-5 py-2 rounded-full bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500 hover:text-white transition-all duration-300">
                        <span class="font-semibold">Salir</span>
                        <i class="ph ph-sign-out text-lg"></i>
                    </button>
                </form>
            </div>
            
        </div>
    </header>

    <div class="flex flex-1 pt-[76px] overflow-hidden relative w-full">
        
        <aside class="bg-slate-900/95 backdrop-blur-xl w-72 border-r border-slate-800 hidden md:flex flex-col z-40 h-full">
            <div class="p-6 border-b border-slate-800">
                <h3 class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-slate-400 to-slate-200 uppercase text-xs tracking-[0.2em] flex items-center gap-2">
                    <i class="ph ph-compass text-cyan-500"></i> Navegación
                </h3>
            </div>
            
            <nav class="p-4 space-y-2 flex-1 overflow-y-auto">
                <a href="/admin" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->is('admin') ? 'bg-slate-800 text-cyan-400 border-l-4 border-cyan-400 shadow-[inset_0_0_20px_rgba(34,211,238,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-cyan-400 hover:translate-x-1' }}">
                    <i class="ph ph-squares-four text-xl mr-3 transition-transform group-hover:scale-110"></i> Dashboard
                </a>
                
                <a href="{{ route('libros.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('libros.*') ? 'bg-slate-800 text-purple-400 border-l-4 border-purple-400 shadow-[inset_0_0_20px_rgba(192,132,252,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-purple-400 hover:translate-x-1' }}">
                    <i class="ph ph-books text-xl mr-3 transition-transform group-hover:scale-110"></i> Catálogo de libros
                </a>

                <a href="{{ route('categorias.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('categorias.*') ? 'bg-slate-800 text-pink-400 border-l-4 border-pink-400 shadow-[inset_0_0_20px_rgba(244,114,182,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-pink-400 hover:translate-x-1' }}">
                    <i class="ph ph-tag text-xl mr-3 transition-transform group-hover:scale-110"></i> Categorías
                </a>

                <a href="{{ route('prestamos.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('prestamos.*') ? 'bg-slate-800 text-amber-400 border-l-4 border-amber-400 shadow-[inset_0_0_20px_rgba(245,158,11,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-amber-400 hover:translate-x-1' }}">
                    <i class="ph ph-arrows-left-right text-xl mr-3 transition-transform group-hover:scale-110"></i> Préstamos
                </a>

                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('users.*') ? 'bg-slate-800 text-emerald-400 border-l-4 border-emerald-400 shadow-[inset_0_0_20px_rgba(16,185,129,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-emerald-400 hover:translate-x-1' }}">
                    <i class="ph ph-users text-xl mr-3 transition-transform group-hover:scale-110"></i> Usuarios
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group text-slate-400 hover:bg-slate-800 hover:text-slate-200 mt-4 border-t border-slate-800/50 pt-6 hover:translate-x-1">
                    <i class="ph ph-gear text-xl mr-3 transition-transform group-hover:scale-110"></i> Configuración
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800/50 mt-auto bg-slate-900">
                <div class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-slate-800 transition-colors cursor-pointer group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-cyan-600 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/20 group-hover:scale-105 transition-transform">
                        AD
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-slate-200 truncate">Admin User</p>
                        <p class="text-xs text-slate-500 truncate">admin@nexus.com</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-slate-950 to-slate-950 relative scroll-smooth flex flex-col">
            
            <div class="flex-1 p-8">
                @yield('content')
            </div>

            <div class="mt-auto p-8 border-t border-slate-800/50 bg-slate-950/50">
                @include('partials.footer')
            </div>

        </main>
        
    </div>
</body>
</html>