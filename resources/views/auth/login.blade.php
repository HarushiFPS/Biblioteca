@extends('layout.auth')

@section('titulo', 'Iniciar Sesión')

@section('content')
    <nav class="fixed top-0 left-0 w-full z-50 px-6 py-4 flex justify-between items-center">
        
        <a href="/" class="flex flex-col items-center group opacity-90 hover:opacity-100 transition-opacity text-center">
            <span class="text-3xl mb-1 transition-transform duration-300 group-hover:rotate-12 drop-shadow-[0_0_8px_rgba(34,211,238,0.3)]">📚</span>
            
            <div class="leading-tight">
                <span class="font-bold text-lg text-slate-120 tracking-tight block">NEXUS</span>
            </div>
        </a>

        <a href="/" class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-900/50 backdrop-blur-md border border-slate-700/50 text-slate-300 hover:text-cyan-400 hover:border-cyan-500/50 hover:bg-slate-800 transition-colors duration-300 shadow-lg">
            <i class="ph ph-house text-lg"></i>
            <span class="font-medium text-sm hidden md:block">Volver al inicio</span>
        </a>
    </nav>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-3xl shadow-2xl shadow-cyan-500/5 p-8 md:p-10 relative overflow-hidden group mt-16">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>

        <div class="text-center mb-8 group/book cursor-default">
            <div class="inline-block mb-2 text-5xl drop-shadow-[0_0_15px_rgba(34,211,238,0.6)] transition-transform duration-300 group-hover/book:rotate-12">
                📚
            </div>
            <h2 class="text-3xl font-bold text-white tracking-tight">
                NEXUS <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Login</span>
            </h2>
            <p class="text-slate-400 text-sm mt-2">Ingresa tus credenciales para continuar</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <div class="space-y-1">
                <label for="email" class="text-xs font-semibold text-slate-300 uppercase tracking-wider ml-1">Correo Electrónico</label>
                <div class="relative group/input">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph ph-envelope text-slate-500 group-focus-within/input:text-cyan-400 transition-colors"></i>
                    </div>
                    <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com"
                        class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-4 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all placeholder:text-slate-600">
                </div>
            </div>

            <div class="space-y-1">
                <div class="flex justify-between items-center ml-1">
                    <label for="password" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Contraseña</label>
                    <a href="#" class="text-xs text-cyan-500 hover:text-cyan-400 hover:underline transition-colors">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="relative group/input">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph ph-lock-key text-slate-500 group-focus-within/input:text-cyan-400 transition-colors"></i>
                    </div>
                    <input type="password" id="password" name="password" required placeholder="••••••••"
                        class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 pl-11 pr-12 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/50 transition-all placeholder:text-slate-600">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-slate-300 cursor-pointer focus:outline-none">
                        <i class="ph ph-eye-slash text-lg" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-bold text-lg shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/50 hover:scale-[1.02] transition-all duration-300 relative overflow-hidden group/btn mt-2">
                <span class="relative z-10 flex items-center justify-center gap-2">Ingresar <i class="ph ph-sign-in font-bold"></i></span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300 blur-md"></div>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-slate-500">
            ¿No tienes cuenta? 
            <a href="/register" class="text-slate-300 font-medium hover:text-cyan-400 transition-colors hover:underline hover:decoration-cyan-500 hover:decoration-2 hover:underline-offset-4">Regístrate aquí</a>
        </div>
    </div>
@endsection