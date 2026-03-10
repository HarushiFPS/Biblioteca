@extends('layout.admin')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-4xl mt-6">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-white mb-2">Nuevo libro</h1>
            <p class="text-slate-400">Ingresa los datos para registrar una nueva obra literaria.</p>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-8 relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf
                
                <div class="space-y-2">
                    <label for="nombre" class="text-xs font-bold text-purple-400 uppercase tracking-wider ml-1">Nombre del libro</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-book-open text-slate-500 group-focus-within:text-purple-400 transition-colors"></i>
                        </div>
                        <input type="text" name="nombre" id="nombre" required placeholder="Ej. Cien años de soledad, fundación..." value="{{ old('nombre') }}"
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="isbn" class="text-xs font-bold text-purple-400 uppercase tracking-wider ml-1">ISBN</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-barcode text-slate-500 group-focus-within:text-purple-400 transition-colors"></i>
                            </div>
                            <input type="text" name="isbn" id="isbn" required placeholder="Ej. 978..." value="{{ old('isbn') }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="autor" class="text-xs font-bold text-purple-400 uppercase tracking-wider ml-1">Autor</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-user-circle text-slate-500 group-focus-within:text-purple-400 transition-colors"></i>
                            </div>
                            <input type="text" name="autor" id="autor" required placeholder="Ej. Gabriel García Márquez..." value="{{ old('autor') }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="editorial" class="text-xs font-bold text-purple-400 uppercase tracking-wider ml-1">Editorial</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-building text-slate-500 group-focus-within:text-purple-400 transition-colors"></i>
                            </div>
                            <input type="text" name="editorial" id="editorial" required placeholder="Ej. Alfaguara, Diana..." value="{{ old('editorial') }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
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
                                <option value="" class="text-slate-600" disabled selected>Selecciona una clasificación</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
                    <div class="space-y-2 md:col-span-2">
                        <label for="portada" class="text-xs font-bold text-purple-400 uppercase tracking-wider ml-1">Portada del libro</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-image text-slate-500 group-focus-within:text-purple-400 transition-colors"></i>
                            </div>
                            <input type="file" name="portada" id="portada" accept="image/png, image/jpeg, image/webp"
                                class="w-full bg-slate-950/50 text-slate-500 border border-slate-700 rounded-xl py-2.5 pl-11 pr-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all 
                                file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-purple-900 file:text-purple-200 hover:file:bg-purple-800 cursor-pointer">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="estatus" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Estatus inicial</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-toggle-left text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <select name="estatus" id="estatus" required 
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all appearance-none font-bold text-emerald-400">
                                <option value="0" selected class="bg-slate-950 text-emerald-400 font-bold">Disponible</option>
                                <option value="1" class="bg-slate-950 text-amber-400 font-bold">Prestado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800/50 mt-8">
                    <a href="{{ route('libros.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all text-sm font-bold">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-500/20 hover:shadow-purple-500/40 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="ph ph-floppy-disk text-lg"></i>
                        Guardar libro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection