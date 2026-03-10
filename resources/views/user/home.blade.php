@extends('layout.user')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-white mb-2">Panel principal</h1>
        <p class="text-slate-400">Bienvenido a tu portal de lectura, revisa el estado de tu cuenta.</p>
    </div>

    <div class="bg-slate-800/50 rounded-2xl p-8 border border-slate-700 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>
        
        <div class="relative z-10">
            <h2 class="text-2xl font-bold text-white mb-4">Hola, {{ auth()->user()->name ?? 'Lector' }} <i class="ph ph-hand-waving text-emerald-400"></i></h2>
            <p class="text-slate-400 max-w-2xl leading-relaxed">
                Próximamente podrás consultar tus libros activos, tu historial de devoluciones y explorar el catálogo completo desde este panel.
            </p>
        </div>
    </div>
@endsection