@extends('layout.admin')

@section('content')
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Nuevo préstamo</h1>
            <p class="text-slate-400">Asigna un libro del catálogo a un lector registrado.</p>
        </div>
        <a href="{{ route('prestamos.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-700 hover:border-slate-600 transition-all font-bold flex items-center gap-2 shadow-lg">
            <i class="ph ph-arrow-left text-lg"></i> Volver a la lista
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-5 bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-6 relative overflow-hidden h-fit">
            <div class="absolute top-0 left-0 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <h2 class="text-xl font-bold text-amber-400 mb-6 flex items-center gap-2">
                <i class="ph ph-magnifying-glass text-2xl"></i> Paso 1: Buscar lector
            </h2>

            <form action="{{ route('prestamos.buscar_usuario') }}" method="POST">
                @csrf
                
                <div class="flex items-center gap-1 bg-slate-950/80 p-1 rounded-lg w-fit mb-4 border border-slate-800 shadow-inner">
                    <button type="button" id="btn-search-id" onclick="setSearchType('id')" class="px-4 py-1.5 rounded-md text-xs font-bold transition-all bg-amber-500/20 text-amber-400 shadow-[inset_0_0_10px_rgba(245,158,11,0.1)]">
                        ID
                    </button>
                    <button type="button" id="btn-search-nombre" onclick="setSearchType('nombre')" class="px-4 py-1.5 rounded-md text-xs font-bold transition-all text-slate-500 hover:text-slate-300">
                        Nombre
                    </button>
                </div>

                <div class="space-y-2 mb-4">
                    <input type="hidden" name="tipo_busqueda" id="tipo_busqueda" value="id">
                    <label id="label_busqueda" for="busqueda" class="text-xs font-bold text-slate-400 uppercase tracking-wider">ID del usuario</label>
                    
                    <div class="flex gap-2">
                        <input type="number" name="busqueda" id="busqueda" required placeholder="Ej. 1" value="{{ isset($usuario) ? $usuario->id : old('busqueda') }}" {{ isset($usuario) ? 'readonly' : '' }}
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500/50 transition-all {{ isset($usuario) ? 'opacity-50 cursor-not-allowed' : '' }}">
                        
                        @if(!isset($usuario))
                            <button type="submit" class="bg-slate-800 hover:bg-amber-600 border border-slate-700 hover:border-amber-500 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg hover:shadow-amber-500/20">
                                Buscar
                            </button>
                        @else
                            <a href="{{ route('prestamos.create') }}" class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white border border-red-500/50 hover:border-red-500 px-6 py-3 rounded-xl font-bold transition-all shadow-[inset_0_0_10px_rgba(239,68,68,0.1)] hover:shadow-[0_0_15px_rgba(239,68,68,0.4)] flex items-center justify-center gap-2" title="Limpiar búsqueda">
                                <i class="ph ph-x font-bold text-lg"></i> Limpiar
                            </a>
                        @endif
                    </div>
                    
                    <datalist id="lista_usuarios">
                        @foreach($usuarios ?? [] as $user)
                            <option value="{{ $user->name }}">
                        @endforeach
                    </datalist>
                </div>
            </form>

            @isset($error_busqueda)
            <div class="mt-6 p-5 bg-red-950/20 border border-red-500/30 rounded-xl relative">
                <div class="absolute -top-3 left-4 bg-slate-900 px-2 text-[10px] font-bold text-red-400 uppercase tracking-widest">Aviso</div>
                <div class="flex items-center gap-2 text-red-400 mt-2 mb-1">
                    <i class="ph ph-warning-circle text-xl"></i>
                    <p class="font-bold">Lector no encontrado</p>
                </div>
                <p class="text-slate-400 text-sm ml-7">{{ $error_busqueda }}</p>
            </div>
            @endisset

            @isset($usuario)
            <div class="mt-6 p-5 bg-emerald-950/20 border border-emerald-500/30 rounded-xl relative">
                <div class="absolute -top-3 left-4 bg-slate-900 px-2 text-[10px] font-bold text-emerald-400 uppercase tracking-widest">Lector encontrado</div>
                
                <p class="text-slate-300 mb-2 mt-2"><strong class="text-slate-500">ID:</strong> <span class="text-white">{{ $usuario->id }}</span></p>
                <p class="text-slate-300 mb-2"><strong class="text-slate-500">Nombre:</strong> <span class="text-white">{{ $usuario->name }}</span></p>
                <p class="text-slate-300 mb-3"><strong class="text-slate-500">Email:</strong> <span class="text-emerald-400">{{ $usuario->email }}</span></p>
                
                @php
                    $librosActivos = \App\Models\Prestamo::where('usuario_id', $usuario->id)->where('estatus', 0)->count();
                @endphp
                
                <div class="pt-3 border-t border-emerald-500/20 flex justify-between items-center">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Libros prestados:</span>
                    <span class="{{ $librosActivos > 0 ? 'bg-amber-500/20 text-amber-400 border-amber-500/30' : 'bg-slate-800 text-slate-400 border-slate-700' }} border px-3 py-1 rounded-full text-xs font-bold">
                        {{ $librosActivos > 0 ? $librosActivos . ' Libros' : 'Ninguno' }}
                    </span>
                </div>
            </div>
            @endisset
        </div>

        <div class="lg:col-span-7 bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-6 relative overflow-hidden {{ !isset($usuario) ? 'opacity-40 pointer-events-none grayscale transition-all' : 'transition-all' }}">
            
            <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <i class="ph ph-book-open text-2xl text-amber-500"></i> Paso 2: Detalles del préstamo
            </h2>

            @if(!isset($usuario))
                <div class="absolute inset-0 z-10 flex items-center justify-center backdrop-blur-[2px]">
                    <p class="bg-slate-900/90 text-amber-400 px-6 py-3 rounded-full font-bold border border-amber-500/30 shadow-2xl flex items-center gap-2">
                        <i class="ph ph-lock-key"></i> Busca un usuario válido primero
                    </p>
                </div>
            @endif

            <form action="{{ route('prestamos.store') }}" method="POST" class="space-y-6">
                @csrf
                @isset($usuario)
                    <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                @endisset

                <div class="space-y-2">
                    <label for="libro_id" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Libro a prestar</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-books text-slate-500 group-focus-within:text-amber-400 transition-colors text-lg"></i>
                        </div>
                        <select name="libro_id" id="libro_id" required 
                            class="w-full bg-slate-900 text-slate-100 border border-slate-700 rounded-xl py-3.5 pl-11 pr-10 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500/50 transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected class="text-slate-500 bg-slate-900">Selecciona un libro del catálogo...</option>
                            @foreach($libros as $libro)
                                @if($libro->estatus == 0)
                                    <option value="{{ $libro->id }}" class="text-slate-200 bg-slate-800">{{ $libro->nombre }} - {{ $libro->autor ?? 'Sin autor' }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph ph-caret-down text-slate-400 group-focus-within:text-amber-400 transition-colors"></i>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="fecha_prestamo" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Fecha de salida</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-calendar text-slate-500 group-focus-within:text-amber-400 transition-colors"></i>
                        </div>
                        <input type="date" name="fecha_prestamo" id="fecha_prestamo" required value="{{ date('Y-m-d') }}"
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500/50 transition-all [color-scheme:dark]">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-orange-600 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-amber-500/20 hover:shadow-amber-500/40 hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                        <i class="ph ph-check-circle text-xl"></i> Registrar préstamo
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    function setSearchType(type) {
        const btnId = document.getElementById('btn-search-id');
        const btnNombre = document.getElementById('btn-search-nombre');
        const inputHidden = document.getElementById('tipo_busqueda');
        const inputField = document.getElementById('busqueda');
        const labelField = document.getElementById('label_busqueda');

        const activeClasses = ['bg-amber-500/20', 'text-amber-400', 'shadow-[inset_0_0_10px_rgba(245,158,11,0.1)]'];
        const inactiveClasses = ['text-slate-500', 'hover:text-slate-300'];

        if (type === 'id') {
            inputHidden.value = 'id';
            inputField.type = 'number';
            inputField.placeholder = 'Ej. 1';
            labelField.innerText = 'ID del usuario';
            inputField.removeAttribute('list');

            btnId.classList.add(...activeClasses);
            btnId.classList.remove(...inactiveClasses);
            btnNombre.classList.add(...inactiveClasses);
            btnNombre.classList.remove(...activeClasses);
        } else {
            inputHidden.value = 'nombre';
            inputField.type = 'text';
            inputField.placeholder = 'Ej. Juan Pérez';
            labelField.innerText = 'Nombre del usuario';
            inputField.setAttribute('list', 'lista_usuarios');

            btnNombre.classList.add(...activeClasses);
            btnNombre.classList.remove(...inactiveClasses);
            btnId.classList.add(...inactiveClasses);
            btnId.classList.remove(...activeClasses);
        }
    }
</script>