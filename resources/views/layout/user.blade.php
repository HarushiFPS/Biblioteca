<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS - Portal del lector</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📚</text></svg>">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-200 antialiased flex h-screen overflow-hidden">

    <aside class="w-72 bg-slate-950 border-r border-slate-800 flex flex-col justify-between h-full relative z-20">
        <div>
            <div class="h-20 flex items-center px-8 border-b border-slate-800/50">
                <a href="{{ route('user.home') }}" class="flex items-center gap-3 group">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition-all">
                        <i class="ph ph-books text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-extrabold tracking-wide text-white">NEXUS <span class="text-emerald-500 font-medium text-sm block -mt-1">LECTOR</span></span>
                </a>
            </div>

            <nav class="p-4 space-y-2 mt-4">
                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-4">Navegación</p>

                <a href="{{ route('user.home') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group {{ request()->routeIs('user.home') ? 'bg-slate-800 text-emerald-400 border-l-4 border-emerald-400 shadow-[inset_0_0_20px_rgba(16,185,129,0.1)] font-semibold' : 'text-slate-400 hover:bg-slate-800 hover:text-emerald-400 hover:translate-x-1' }}">
                    <i class="ph ph-house text-xl mr-3 transition-transform group-hover:scale-110"></i> Inicio
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group text-slate-400 hover:bg-slate-800 hover:text-amber-400 hover:translate-x-1">
                    <i class="ph ph-arrows-left-right text-xl mr-3 transition-transform group-hover:scale-110"></i> Mis préstamos
                </a>

                <a href="#" class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 group text-slate-400 hover:bg-slate-800 hover:text-white hover:translate-x-1">
                    <i class="ph ph-gear text-xl mr-3 transition-transform group-hover:scale-110"></i> Configuración
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-800/50 bg-slate-950/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-600 to-teal-700 flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-500/20">
                        US
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-white truncate">{{ auth()->user()->name ?? 'Lector' }}</p>
                        <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? 'lector@nexus.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="p-2 text-slate-500 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-colors" title="Cerrar sesión">
                        <i class="ph ph-sign-out text-xl"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="flex-1 h-full overflow-y-auto bg-slate-900 relative">
        <div class="p-8 md:p-12 relative z-10">
            @yield('content')
        </div>
    </main>

</body>
</html>