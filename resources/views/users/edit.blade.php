@extends('layout.admin')

@section('content')
<div class="flex justify-center items-start">
    <div class="w-full max-w-4xl mt-6">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-white mb-2">Editar usuario</h1>
            <p class="text-slate-400">Modifica los datos personales y el rol de permisos.</p>
        </div>

        <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-2xl shadow-2xl p-8 relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Nombre del usuario</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-user-circle text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all placeholder:text-slate-600">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-envelope-simple text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all placeholder:text-slate-600">
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="tipo_usuario" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Rol de usuario</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph ph-shield-check text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                        </div>
                        <select name="tipo_usuario" id="tipo_usuario" required 
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3.5 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all appearance-none">
                            <option value="admin" {{ $user->tipo_usuario === 'admin' ? 'selected' : '' }} class="bg-slate-950 text-cyan-400 font-bold">Administrador (admin)</option>
                            <option value="usuario" {{ $user->tipo_usuario === 'usuario' ? 'selected' : '' }} class="bg-slate-950 text-emerald-400 font-bold">Lector estándar (usuario)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-950/30 p-4 rounded-xl border border-slate-800">
                    <div class="md:col-span-2">
                        <p class="text-xs text-slate-500 bg-slate-800 p-2 rounded-lg border border-slate-700 mb-2">Deja estos campos vacíos si no deseas cambiar la contraseña.</p>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Nueva contraseña (Opcional)</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-lock text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <input type="password" name="password" id="password" placeholder="Mínimo 8 caracteres..."
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all placeholder:text-slate-600">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-xs font-bold text-emerald-400 uppercase tracking-wider ml-1">Confirmar contraseña</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph ph-lock-key text-slate-500 group-focus-within:text-emerald-400 transition-colors"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/50 transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800/50 mt-8">
                    <a href="{{ route('users.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all text-sm font-bold">
                        Cancelar
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 hover:scale-105 transition-all flex items-center gap-2">
                        <i class="ph ph-arrows-clockwise text-lg"></i>
                        Actualizar usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection