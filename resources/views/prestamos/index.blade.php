@extends('layout.admin')

@section('content')
    <div class="flex flex-col md:flex-row justify-between md:items-end mb-8 gap-4">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Lista de préstamos</h1>
            <p class="text-slate-400">Control de salidas, devoluciones y tiempos límite del inventario.</p>
        </div>
        <a href="{{ route('prestamos.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 text-white font-bold shadow-lg shadow-amber-500/20 hover:scale-105 hover:shadow-amber-500/40 transition-all flex items-center gap-2">
            <i class="ph ph-handshake text-xl"></i> Agregar préstamo
        </a>
    </div>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-800/80 text-slate-300 text-sm uppercase tracking-wider border-b border-slate-700">
                        <th class="p-5 font-bold">ID</th>
                        <th class="p-5 font-bold">Libro</th>
                        <th class="p-5 font-bold">Lector</th>
                        <th class="p-5 font-bold">Fecha préstamo</th>
                        <th class="p-5 font-bold">Fecha devolución</th>
                        <th class="p-5 font-bold text-center">Estatus</th>
                        <th class="p-5 font-bold text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-slate-300">
                    
                    @forelse($prestamos as $prestamo)
                    <tr class="hover:bg-slate-800/50 transition-colors group">
                        <td class="p-5 font-medium text-white">#{{ $prestamo->id }}</td>
                        
                        <td class="p-5">
                            <div class="flex items-center gap-4">
                                <div class="relative w-10 h-14 rounded bg-slate-800 flex items-center justify-center text-amber-500 overflow-hidden shadow-md group-hover:shadow-amber-500/20 transition-all">
                                    @if($prestamo->libro && $prestamo->libro->portada)
                                        <img src="{{ asset('storage/' . $prestamo->libro->portada) }}" alt="Portada" class="w-full h-full object-cover transition-transform duration-300 transform group-hover:scale-150 group-hover:z-50 origin-center">
                                    @else
                                        <i class="ph ph-book text-xl transition-transform duration-300 group-hover:scale-125"></i>
                                    @endif
                                </div>
                                <span class="font-bold text-amber-400 group-hover:text-amber-300 transition-colors">
                                    {{ $prestamo->libro ? $prestamo->libro->nombre : 'Libro eliminado' }}
                                </span>
                            </div>
                        </td>
                        
                        <td class="p-5 font-medium">
                            <span class="bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full text-xs border border-emerald-500/20">
                                {{ $prestamo->usuario ? $prestamo->usuario->name : 'Usuario eliminado' }}
                            </span>
                        </td>
                        
                        <td class="p-5 text-slate-400">
                            {{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}
                        </td>
                        
                        <td class="p-5 text-slate-400">
                            @if($prestamo->fecha_devolucion)
                                {{ \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}
                            @else
                                <span class="text-slate-500 italic">Pendiente</span>
                            @endif
                        </td>
                        
                        <td class="p-5 text-center">
                            @if($prestamo->estatus == 0)
                                <span class="bg-amber-500/20 text-amber-400 px-3 py-1 rounded-full text-xs font-bold border border-amber-500/30 flex items-center justify-center gap-1 w-fit mx-auto">
                                    <i class="ph ph-clock text-sm"></i> Activo
                                </span>
                            @else
                                <span class="bg-slate-700/50 text-slate-400 px-3 py-1 rounded-full text-xs font-bold border border-slate-600 flex items-center justify-center gap-1 w-fit mx-auto">
                                    <i class="ph ph-check-circle text-sm"></i> Devuelto
                                </span>
                            @endif
                        </td>
                        
                        <td class="p-5 text-right flex justify-end gap-2 items-center h-full pt-8">
                            
                            @if($prestamo->estatus == 0)
                                <form action="{{ route('prestamos.entregar', $prestamo->id) }}" method="POST" onsubmit="return confirm('¿Confirmar la devolución de este libro?');" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-3 py-2 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500 hover:text-white transition-all flex items-center gap-2 text-xs font-bold shadow-lg shadow-emerald-500/10">
                                        <i class="ph ph-check-square-offset text-base"></i> Entregar
                                    </button>
                                </form>
                            @endif

                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="px-3 py-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all flex items-center gap-2 text-xs font-bold">
                                <i class="ph ph-pencil-simple text-base"></i> Editar
                            </a>
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este préstamo?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all group/del flex items-center gap-2 text-xs font-bold">
                                    <i class="ph ph-trash text-base group-hover/del:scale-110 transition-transform"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="7" class="p-10 text-center text-slate-500">
                            <i class="ph ph-folder-open text-4xl mb-2 block opacity-50 text-amber-500/50"></i>
                            <p>Aún no hay préstamos registrados en el sistema.</p>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection