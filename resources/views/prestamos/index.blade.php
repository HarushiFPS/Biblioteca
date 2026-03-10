@extends('layout.admin')

@section('content')
    <div class="flex flex-col md:flex-row justify-between md:items-end mb-8 gap-4">
        <div>
            <h1 class="text-4xl font-extrabold text-white mb-2">Lista de Préstamos</h1>
            <p class="text-slate-400">Control de salidas, devoluciones y tiempos límite del inventario.</p>
        </div>
        <a href="{{ route('prestamos.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 text-white font-bold shadow-lg shadow-amber-500/20 hover:scale-105 hover:shadow-amber-500/40 transition-all flex items-center gap-2">
            <i class="ph ph-handshake text-xl"></i> Agregar Préstamo
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
                        <th class="p-5 font-bold">Fecha Préstamo</th>
                        <th class="p-5 font-bold">Fecha Devolución</th>
                        <th class="p-5 font-bold text-center">Estatus</th>
                        <th class="p-5 font-bold text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-slate-300">
                    
                    {{-- Usaremos un @forelse cuando tengamos la lógica, por ahora ponemos un mensaje de diseño --}}
                    <tr>
                        <td colspan="7" class="p-10 text-center text-slate-500">
                            <i class="ph ph-hourglass-high text-4xl mb-2 block opacity-50 text-amber-500/50"></i>
                            <p>La interfaz está lista. Esperando conexión con la base de datos...</p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection