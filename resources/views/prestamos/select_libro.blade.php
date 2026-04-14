@extends('layout.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-white mb-2">Paso 2: Asignar Libro</h1>
        <p class="text-slate-400">Selecciona el libro para <span class="text-amber-400 font-bold">{{ $usuario->name }}</span>.</p>
    </div>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-6 max-w-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <form action="{{ route('prestamos.store') }}" method="POST" class="space-y-6 relative z-10">
            @csrf
            <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

            <div class="space-y-2">
                <label for="libro_id" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Libro a prestar</label>
                <select name="libro_id" id="libro_id" required class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3.5 px-4 focus:border-amber-500 focus:outline-none">
                    <option value="" disabled selected>Selecciona un libro del catálogo...</option>
                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}" class="bg-slate-900 text-white">{{ $libro->nombre }} - {{ $libro->autor ?? 'Sin autor' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label for="fecha_prestamo" class="text-xs font-bold text-slate-400 uppercase tracking-wider">Fecha de salida</label>
                <input type="date" name="fecha_prestamo" id="fecha_prestamo" required value="{{ date('Y-m-d') }}"
                    class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:border-amber-500 focus:outline-none [color-scheme:dark]">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-orange-600 text-white py-3.5 rounded-xl font-bold shadow-lg hover:scale-[1.02] transition-all flex items-center justify-center gap-2">
                <i class="ph ph-check-circle text-xl"></i> Registrar Préstamo
            </button>
        </form>
    </div>
@endsection