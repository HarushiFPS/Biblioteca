@extends('layout.admin')

@section('content')
    <div class="flex justify-between items-end mb-8">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Categorías</h1>
            <p class="text-slate-400">Gestiona las clasificaciones de tu biblioteca.</p>
        </div>
        <a href="{{ route('categorias.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold shadow-lg shadow-pink-500/20 hover:scale-105 hover:shadow-pink-500/40 transition-all flex items-center gap-2">
            <i class="ph ph-plus-circle text-xl"></i> Nueva categoría
        </a>
    </div>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-800/80 text-slate-300 text-sm uppercase tracking-wider border-b border-slate-700">
                    <th class="p-5 font-bold">ID</th>
                    <th class="p-5 font-bold">Nombre</th>
                    <th class="p-5 font-bold">Fecha creación</th>
                    <th class="p-5 font-bold text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-slate-300">
                @foreach ($categorias as $categoria)
                <tr class="hover:bg-slate-800/40 transition-colors group">
                    <td class="p-5 font-mono text-pink-400">#{{ $categoria->id }}</td>
                    <td class="p-5 font-bold text-white">{{ $categoria->nombre }}</td>
                    <td class="p-5 text-sm text-slate-500">{{ $categoria->created_at->format('d/m/Y') }}</td>
                    <td class="p-5 text-right flex justify-end gap-2">
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all">
                            <i class="ph ph-pencil-simple"></i>
                        </a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar la categoría: {{ $categoria->nombre }}?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all group/del">
                                <i class="ph ph-trash group-hover/del:scale-110 transition-transform"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                
                @if($categorias->isEmpty())
                <tr>
                    <td colspan="4" class="p-10 text-center text-slate-500">
                        <i class="ph ph-empty text-4xl mb-2 block opacity-50"></i>
                        No hay categorías registradas aún.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
@endsection