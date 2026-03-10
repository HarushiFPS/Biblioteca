@extends('layout.admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-white mb-2">Gestión de usuarios</h1>
        <p class="text-slate-400">Ver y editar los permisos de los miembros de la biblioteca.</p>
    </div>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-800/80 text-slate-300 text-sm uppercase tracking-wider border-b border-slate-700">
                    <th class="p-5 font-bold">ID</th>
                    <th class="p-5 font-bold">Perfil / Nombre</th>
                    <th class="p-5 font-bold">Email</th>
                    <th class="p-5 font-bold text-center">Rol</th>
                    <th class="p-5 font-bold">Fecha Registro</th>
                    <th class="p-5 font-bold text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800 text-slate-300">
                @foreach ($users as $user)
                <tr class="hover:bg-slate-800/40 transition-colors group">
                    <td class="p-5 font-mono text-pink-400">#{{ $user->id }}</td>
                    
                    <td class="p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-600 flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-500/10 group-hover:scale-105 transition-transform">
                                AD
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-white truncate text-base">{{ $user->name }}</p>
                            </div>
                        </div>
                    </td>
                    
                    <td class="p-5 text-sm">{{ $user->email }}</td>
                    
                    <td class="p-5 text-center">
                        @if($user->tipo_usuario === 'admin')
                            <span class="px-3 py-1 bg-cyan-950/80 text-cyan-400 rounded-full text-xs font-bold border border-cyan-500/20 shadow-[0_0_10px_rgba(34,211,238,0.2)]">
                                Administrador (admin)
                            </span>
                        @else
                            <span class="px-3 py-1 bg-emerald-950/80 text-emerald-400 rounded-full text-xs font-bold border border-emerald-500/20 shadow-[0_0_10px_rgba(16,185,129,0.2)]">
                                Lector estándar (usuario)
                            </span>
                        @endif
                    </td>
                    
                    <td class="p-5 text-sm text-slate-500">{{ $user->created_at->format('d/m/Y') }}</td>
                    
                    <td class="p-5 text-right flex justify-end gap-2 pt-6">
                        <a href="{{ route('users.edit', $user->id) }}" class="p-2 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white transition-all">
                            <i class="ph ph-pencil-simple"></i>
                        </a>
                        
                        @if($user->id !== auth()->id())
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar al usuario: {{ $user->name }}?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white transition-all group/del">
                                <i class="ph ph-trash group-hover/del:scale-110 transition-transform"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
    <div class="p-5 border-t border-slate-800 bg-slate-900/50 mt-12">
        {{ $users->links() }}
    </div>
    @endif
@endsection