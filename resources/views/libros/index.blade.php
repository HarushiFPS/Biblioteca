@extends('layout.admin')

@section('content')
    <div class="flex flex-col md:flex-row justify-between md:items-end mb-8 gap-4">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Catálogo de libros</h1>
            <p class="text-slate-400">Gestiona el inventario literario y las portadas del sistema.</p>
        </div>
        <a href="{{ route('libros.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/20 hover:scale-105 hover:shadow-purple-500/40 transition-all flex items-center gap-2">
            <i class="ph ph-plus-circle text-xl"></i> Nuevo libro
        </a>
    </div>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-800/80 text-slate-300 text-sm uppercase tracking-wider border-b border-slate-700">
                        <th class="p-5 font-bold">ID</th>
                        <th class="p-5 font-bold">Portada</th>
                        <th class="p-5 font-bold">Título / ISBN</th>
                        <th class="p-5 font-bold text-center">Categoría</th>
                        <th class="p-5 font-bold text-center">Estatus</th>
                        <th class="p-5 font-bold text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-slate-300">
                    @forelse ($libros as $libro)
                    <tr class="hover:bg-slate-800/40 transition-colors group">
                        
                        <td class="p-5 font-mono text-purple-400">#{{ $libro->id }}</td>
                        
                        <td class="p-5">
                            @if($libro->portada)
                                <div class="relative w-12 h-16 group/img">
                                    <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada de {{ $libro->nombre }}" 
                                         class="w-full h-full object-cover rounded shadow-md border border-slate-700 transition-transform duration-300 group-hover/img:scale-[3] group-hover/img:z-50 relative origin-left">
                                </div>
                            @else
                                <div class="w-12 h-16 bg-slate-800 rounded flex items-center justify-center border border-slate-700 text-slate-500" title="Sin portada">
                                    <i class="ph ph-image-broken text-2xl"></i>
                                </div>
                            @endif
                        </td>
                        
                        <td class="p-5">
                            <p class="font-bold text-white text-base">{{ $libro->nombre }}</p>
                            <p class="text-sm text-slate-400 mt-0.5">{{ $libro->autor }}</p>
                            <p class="text-xs text-slate-500 font-mono mt-1">ISBN: {{ $libro->isbn }}</p>
                        </td>
                        
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 bg-slate-800 text-pink-400 rounded-full text-xs font-bold border border-pink-500/20">
                                {{ $libro->categoria->nombre ?? 'Sin categoría' }}
                            </span>
                        </td>
                        
                        <td class="p-5 text-center">
                            @if($libro->estatus == 0)
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-bold border border-emerald-500/20">
                                    Disponible
                                </span>
                            @else
                                <span class="px-3 py-1 bg-amber-500/10 text-amber-400 rounded-full text-xs font-bold border border-amber-500/20">
                                    Prestado
                                </span>
                            @endif
                        </td>
                        
                        <td class="p-5 text-right flex justify-end gap-2 items-center h-full pt-8">
                            <a href="{{ route('libros.edit', $libro->id) }}" class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all">
                                <i class="ph ph-pencil-simple"></i>
                            </a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar el libro: {{ $libro->nombre }}?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all group/del">
                                    <i class="ph ph-trash group-hover/del:scale-110 transition-transform"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-10 text-center text-slate-500">
                            <i class="ph ph-books text-4xl mb-2 block opacity-50"></i>
                            No hay libros registrados aún en el catálogo.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($libros->hasPages())
        <div class="p-5 border-t border-slate-800 bg-slate-900/50">
            {{ $libros->links() }}
        </div>
        @endif
    </div>
@endsection