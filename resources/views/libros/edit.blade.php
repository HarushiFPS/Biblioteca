@extends('layout.admin')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-4xl mt-6">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-white mb-2">Editar libro</h1>
            <p class="text-slate-400">Modifica los detalles de la obra o actualiza su portada.</p>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="{{ route('libros.update', $libro->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="space-y-2">
                    <label for="nombre" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">Nombre del libro</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-book-open text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                        </div>
                        <input type="text" name="nombre" id="nombre" required value="{{ old('nombre', $libro->nombre) }}"
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="isbn" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">ISBN</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-barcode text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input type="text" name="isbn" id="isbn" required value="{{ old('isbn', $libro->isbn) }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="autor" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">Autor</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-user-circle text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input type="text" name="autor" id="autor" required value="{{ old('autor', $libro->autor) }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="editorial" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">Editorial</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-building text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input type="text" name="editorial" id="editorial" required value="{{ old('editorial', $libro->editorial) }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="categoria_id" class="text-xs font-bold text-pink-400 uppercase tracking-wider ml-1">Categoría</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-tag text-slate-500 group-focus-within:text-pink-400 transition-colors"></i>
                            </div>
                            <select name="categoria_id" id="categoria_id" required 
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-pink-500 focus:ring-1 focus:ring-pink-500/50 transition-all appearance-none">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $libro->categoria_id == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center bg-slate-950/30 p-4 rounded-xl border border-slate-800">
                    
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Portada Actual</span>
                        @if($libro->portada)
                            <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada" class="w-16 h-24 object-cover rounded shadow-md border border-slate-700">
                        @else
                            <div class="w-16 h-24 bg-slate-800 rounded flex items-center justify-center border border-slate-700 text-slate-500">
                                <i class="ph ph-image-broken text-2xl"></i>
                            </div>
                        @endif
                    </div>

                    <div class="space-y-2">
                        <label for="portada" class="text-xs font-bold text-blue-400 uppercase tracking-wider ml-1">Cambiar portada (Opcional)</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-image text-slate-500 group-focus-within:text-blue-400 transition-colors"></i>
                            </div>
                            <input type="file" name="portada" id="portada" accept="image/png, image/jpeg, image/webp"
                                class="w-full bg-slate-950/50 text-slate-500 border border-slate-700 rounded-xl py-2 pl-11 pr-4 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500/50 transition-all 
                                file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[10px] file:font-semibold file:bg-blue-900 file:text-blue-200 hover:file:bg-blue-800 cursor-pointer">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="estatus" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Estatus</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-toggle-left text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <select name="estatus" id="estatus" required 
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all appearance-none font-bold">
                                <option value="0" {{ $libro->estatus == 0 ? 'selected' : '' }} class="bg-slate-950 text-emerald-400 font-bold">Disponible</option>
                                <option value="1" {{ $libro->estatus == 1 ? 'selected' : '' }} class="bg-slate-950 text-amber-400 font-bold">Prestado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800/50 mt-8">
                    <a href="{{ route('libros.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all text-sm font-bold">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 text-white font-bold shadow-lg shadow-blue-500/20 hover:shadow-blue-500/40 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="ph ph-arrows-clockwise text-lg"></i>
                        Actualizar libro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection