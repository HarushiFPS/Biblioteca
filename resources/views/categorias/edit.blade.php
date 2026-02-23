@extends('layout.admin')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-2xl mt-10">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-white mb-2">Editar categoría</h1>
            <p class="text-slate-400">Modifica el nombre de la clasificación.</p>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-2">
                    <label for="nombre" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">Nombre de la categoría</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-tag text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                        </div>
                        <input type="text" name="nombre" id="nombre" required value="{{ old('nombre', $categoria->nombre) }}" 
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-800/50">
                    <a href="{{ route('categorias.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all text-sm font-bold">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-bold shadow-lg shadow-blue-500/20 hover:shadow-blue-500/40 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="ph ph-arrows-clockwise text-lg"></i>
                        Actualizar categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection