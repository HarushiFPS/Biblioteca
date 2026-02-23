@extends('layout.admin')

@section('content')
<div class="pb-20"> 
    <header class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Panel de control</h1>
            <p class="text-slate-400">Resumen general del sistema bibliotecario.</p>
        </div>
        <div class="text-sm text-slate-500 bg-slate-900/50 px-4 py-2 rounded-full border border-slate-800">
            <i class="ph ph-calendar-blank mr-1"></i> Hoy, {{ date('d M Y') }}
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-cyan-500/5 transition-all duration-500 hover:-translate-y-1 hover:shadow-cyan-500/20 hover:border-cyan-500/50 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-cyan-500/20 rounded-full blur-3xl group-hover:bg-cyan-500/30 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-cyan-400 text-xs font-bold uppercase tracking-wider">Libros totales</h3>
                <div class="p-2 bg-cyan-500/10 rounded-lg text-cyan-400"><i class="ph ph-books text-xl"></i></div>
            </div>
            <p class="text-4xl font-bold text-white">1,240</p>
            <p class="text-slate-500 text-sm mt-2 flex items-center gap-1"><i class="ph ph-trend-up text-emerald-400"></i> <span class="text-emerald-400">12%</span> vs mes anterior</p>
        </div>

        <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-purple-500/5 transition-all duration-500 hover:-translate-y-1 hover:shadow-purple-500/20 hover:border-purple-500/50 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-purple-500/20 rounded-full blur-3xl group-hover:bg-purple-500/30 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-purple-400 text-xs font-bold uppercase tracking-wider">Préstamos activos</h3>
                <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400"><i class="ph ph-arrows-left-right text-xl"></i></div>
            </div>
            <p class="text-4xl font-bold text-white">45</p>
            <p class="text-slate-500 text-sm mt-2 flex items-center gap-1"><i class="ph ph-warning-circle text-amber-400"></i> <span class="text-amber-400">5</span> vencen hoy</p>
        </div>

        <div class="group bg-slate-800/50 backdrop-blur-sm p-6 rounded-2xl border border-slate-700 shadow-xl shadow-emerald-500/5 transition-all duration-500 hover:-translate-y-1 hover:shadow-emerald-500/20 hover:border-emerald-500/50 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-500/20 rounded-full blur-3xl group-hover:bg-emerald-500/30 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-emerald-400 text-xs font-bold uppercase tracking-wider">Usuarios registrados</h3>
                <div class="p-2 bg-emerald-500/10 rounded-lg text-emerald-400"><i class="ph ph-users-three text-xl"></i></div>
            </div>
            <p class="text-4xl font-bold text-white">320</p>
            <p class="text-slate-500 text-sm mt-2 flex items-center gap-1"><i class="ph ph-plus-circle text-emerald-400"></i> <span class="text-emerald-400">24</span> esta semana</p>
        </div>
    </div>

    <div class="bg-slate-800/40 backdrop-blur-md rounded-2xl shadow-xl border border-slate-700/50 p-8 relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="flex items-center justify-between mb-6 relative z-10">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <i class="ph ph-chart-bar text-cyan-500"></i> Actividad reciente
            </h2>
            <button class="px-4 py-2 bg-slate-700/50 text-slate-300 rounded-lg hover:bg-cyan-600 hover:text-white transition-all text-sm font-medium border border-slate-600 hover:border-cyan-500">
                Ver reporte completo
            </button>
        </div>
        
        <div class="border-2 border-dashed border-slate-700/50 rounded-xl h-64 flex flex-col items-center justify-center text-slate-500 relative z-10 bg-slate-800/30 hover:border-cyan-500/30 transition-all group cursor-pointer">
            <i class="ph ph-table text-5xl mb-3 opacity-30 group-hover:opacity-60 group-hover:text-cyan-400 transition-all group-hover:scale-110"></i>
            <p>El área de contenido dinámico se cargará aquí.</p>
        </div>
    </div>
</div>
@endsection