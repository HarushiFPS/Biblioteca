@extends('layout.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-white mb-2">Centro de mando</h1>
        <p class="text-slate-400">Estadísticas en tiempo real de la biblioteca Nexus.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl p-6 shadow-lg relative overflow-hidden group hover:border-purple-500/50 transition-all">
            <div class="absolute -right-6 -top-6 text-purple-500/10 group-hover:text-purple-500/20 transition-colors transform group-hover:scale-110">
                <i class="ph ph-books text-9xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-2">Total de libros</p>
            <div class="flex items-end gap-3">
                <h3 class="text-5xl font-extrabold text-white">{{ $total_libros }}</h3>
                <span class="text-purple-400 text-sm font-bold mb-1"><i class="ph ph-trend-up"></i> Registros</span>
            </div>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl p-6 shadow-lg relative overflow-hidden group hover:border-amber-500/50 transition-all">
            <div class="absolute -right-6 -top-6 text-amber-500/10 group-hover:text-amber-500/20 transition-colors transform group-hover:scale-110">
                <i class="ph ph-book-open text-9xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-2">Libros Prestados</p>
            <div class="flex items-end gap-3">
                <h3 class="text-5xl font-extrabold text-white">{{ $libros_prestados }}</h3>
                <span class="text-amber-400 text-sm font-bold mb-1"><i class="ph ph-users"></i> En uso</span>
            </div>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl p-6 shadow-lg relative overflow-hidden group hover:border-emerald-500/50 transition-all">
            <div class="absolute -right-6 -top-6 text-emerald-500/10 group-hover:text-emerald-500/20 transition-colors transform group-hover:scale-110">
                <i class="ph ph-users-three text-9xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-2">Total de Usuarios</p>
            <div class="flex items-end gap-3">
                <h3 class="text-5xl font-extrabold text-white">{{ $total_usuarios }}</h3>
                <span class="text-emerald-400 text-sm font-bold mb-1"><i class="ph ph-check-circle"></i> Activos</span>
            </div>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl p-6 shadow-lg relative overflow-hidden group hover:border-red-500/50 transition-all">
            <div class="absolute -right-6 -top-6 text-red-500/10 group-hover:text-red-500/20 transition-colors transform group-hover:scale-110">
                <i class="ph ph-clock-countdown text-9xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-2">Pendientes</p>
            <div class="flex items-end gap-3">
                <h3 class="text-5xl font-extrabold text-white">{{ $devoluciones_pendientes }}</h3>
                <span class="text-red-400 text-sm font-bold mb-1"><i class="ph ph-warning-circle"></i> Por devolver</span>
            </div>
        </div>

    </div>

    <div class="mt-8 bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl p-6 shadow-xl relative overflow-hidden">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <i class="ph ph-activity text-amber-500 text-2xl"></i> Actividad reciente
            </h2>
            <a href="{{ route('prestamos.index') }}" class="text-sm font-bold text-amber-500 hover:text-amber-400 transition-colors flex items-center gap-1">
                Ver todos <i class="ph ph-arrow-right"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-700/50">
                        <th class="pb-3 font-bold pl-2">Lector</th>
                        <th class="pb-3 font-bold">Libro</th>
                        <th class="pb-3 font-bold">Fecha</th>
                        <th class="pb-3 font-bold text-right pr-2">Estatus</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50 text-sm">
                    @forelse($ultimos_prestamos as $prestamo)
                    <tr class="hover:bg-slate-800/30 transition-colors group">
                        
                        <td class="py-4 pl-2 text-white font-medium flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xs border border-emerald-500/30">
                                {{ strtoupper(substr($prestamo->usuario->name ?? 'U', 0, 1)) }}
                            </div>
                            {{ $prestamo->usuario->name ?? 'Usuario eliminado' }}
                        </td>
                        
                        <td class="py-4 text-slate-300 font-medium">
                            {{ $prestamo->libro->nombre ?? 'Libro eliminado' }}
                        </td>
                        
                        <td class="py-4 text-slate-500">
                            {{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->diffForHumans() }}
                        </td>
                        
                        <td class="py-4 pr-2 text-right">
                            @if($prestamo->estatus == 0)
                                <span class="bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full text-xs font-bold border border-amber-500/20">Activo</span>
                            @else
                                <span class="bg-slate-800 text-slate-400 px-3 py-1 rounded-full text-xs font-bold border border-slate-700">Devuelto</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-10 text-center text-slate-500">
                            <i class="ph ph-wind text-3xl mb-2 block opacity-50"></i>
                            Aún no hay actividad reciente en el sistema.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection