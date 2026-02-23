@extends('layout.auth')

@section('titulo', 'Crear cuenta')

@section('content')
    <nav class="fixed top-0 left-0 w-full z-50 px-6 py-4 flex justify-between items-center">
        <a href="/" class="flex flex-col items-center group opacity-90 hover:opacity-100 transition-opacity text-center">
            <span class="text-3xl mb-1 transition-transform duration-300 group-hover:rotate-12 drop-shadow-[0_0_8px_rgba(192,132,252,0.3)]">📚</span>
            <div class="leading-tight">
                <span class="font-bold text-lg text-slate-200 tracking-tight block">NEXUS</span>
            </div>
        </a>
        <a href="/" class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-slate-900/50 backdrop-blur-md border border-slate-700/50 text-slate-300 hover:text-purple-400 hover:border-purple-500/50 hover:bg-slate-800 transition-colors duration-300 shadow-lg">
            <i class="ph ph-house text-lg"></i>
            <span class="font-medium text-sm hidden md:block">Volver al inicio</span>
        </a>
    </nav>

    <div class="bg-slate-900/60 backdrop-blur-xl border border-slate-700/50 rounded-3xl shadow-2xl shadow-purple-500/5 p-8 md:p-10 relative overflow-hidden group mt-24 mb-10 w-full max-w-lg mx-auto">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>

        <div class="text-center mb-6 cursor-default">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-purple-500/10 mb-4 transition-colors">
                <i class="ph ph-user-plus text-3xl text-purple-400"></i>
            </div>
            <h2 class="text-3xl font-bold text-white tracking-tight">Crear cuenta</h2>
            <p class="text-slate-400 text-sm mt-2">Completa el formulario para registrarte.</p>
        </div>

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-5" id="registerForm">
            @csrf

            <div class="space-y-1">
                <label for="name" class="text-xs font-bold text-slate-300 uppercase tracking-wider ml-1 flex items-center gap-1">
                    <i class="ph ph-user text-purple-400"></i> Nombre completo
                </label>
                <div class="relative group/input">
                    <input type="text" id="name" name="name" required placeholder="Ej. Juan Pérez..."
                        class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                </div>
            </div>

            <div class="space-y-1">
                <label for="email" class="text-xs font-bold text-slate-300 uppercase tracking-wider ml-1 flex items-center gap-1">
                    <i class="ph ph-envelope-simple text-purple-400"></i> Correo Electrónico
                </label>
                <div class="relative group/input">
                    <input type="email" id="email" name="email" required placeholder="ejemplo@correo.com"
                        class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <div class="space-y-1">
                    <label for="password" class="text-xs font-bold text-slate-300 uppercase tracking-wider ml-1 flex items-center gap-1">
                        <i class="ph ph-lock-key text-purple-400"></i> Contraseña
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required placeholder="Crea una contraseña"
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600">
                    </div>
                    
                    <div class="space-y-1 mt-2 ml-1">
                        <div id="rule-length" class="flex items-center gap-2 text-[10px] text-slate-500 transition-colors duration-300">
                            <i id="icon-length" class="ph ph-circle"></i> Mínimo 8 caracteres
                        </div>
                        <div id="rule-upper" class="flex items-center gap-2 text-[10px] text-slate-500 transition-colors duration-300">
                            <i id="icon-upper" class="ph ph-circle"></i> Al menos una mayúscula
                        </div>
                    </div>
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="text-xs font-bold text-slate-300 uppercase tracking-wider ml-1 flex items-center gap-1">
                        <i class="ph ph-lock-key-open text-purple-400"></i> Repetir Contraseña
                    </label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Repite tu contraseña"
                            class="w-full bg-slate-950/50 text-slate-200 border border-slate-700 rounded-xl py-3 px-4 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500/50 transition-all placeholder:text-slate-600 disabled:opacity-50" disabled>
                    </div>
                    <div id="rule-match" class="ml-1 mt-1 flex items-center gap-2 text-[10px] text-slate-500 transition-colors duration-300 opacity-0">
                        <i id="icon-match" class="ph ph-circle"></i> Las contraseñas coinciden
                    </div>
                </div>
            </div>

            <div class="flex items-start gap-3 mt-2 p-3 rounded-lg bg-slate-800/30 border border-slate-700/50">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required class="w-4 h-4 rounded border-slate-600 bg-slate-700 text-purple-600 focus:ring-purple-500 cursor-pointer">
                </div>
                <label for="terms" class="text-xs text-slate-400 cursor-pointer select-none">
                    Acepto los <a href="#" class="text-purple-400 hover:underline">términos y condiciones</a>.
                </label>
            </div>

            <button type="submit" id="btn-submit" disabled 
                class="w-full py-3.5 rounded-xl bg-slate-800 text-slate-500 font-bold text-lg transition-all duration-300 cursor-not-allowed grayscale relative overflow-hidden group/btn mt-4">
                <span class="relative z-10 flex items-center justify-center gap-2">Crear cuenta <i class="ph ph-user-plus font-bold"></i></span>
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-slate-500">
            ¿Ya tienes una cuenta? <a href="/login" class="text-slate-300 font-medium hover:text-purple-400 hover:underline">Inicia sesión</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirm = document.getElementById('password_confirmation');
            const terms = document.getElementById('terms');
            const btnSubmit = document.getElementById('btn-submit');

            // Icono del email para feedback visual
            const emailIcon = email.closest('.group\\/input').querySelector('i');

            // Elementos visuales de reglas
            const ruleLength = document.getElementById('rule-length');
            const iconLength = document.getElementById('icon-length');
            const ruleUpper = document.getElementById('rule-upper');
            const iconUpper = document.getElementById('icon-upper');
            const ruleMatch = document.getElementById('rule-match');
            const iconMatch = document.getElementById('icon-match');

            // Estado de validación
            let validEmail = false;
            let validLength = false;
            let validUpper = false;
            let validMatch = false;

            // Función para actualizar UI de una regla de contraseña
            function setRuleState(isValid, ruleElement, iconElement) {
                if (isValid) {
                    ruleElement.classList.remove('text-slate-500');
                    ruleElement.classList.add('text-emerald-400', 'font-bold');
                    iconElement.classList.remove('ph-circle');
                    iconElement.classList.add('ph-check-circle-fill');
                } else {
                    ruleElement.classList.add('text-slate-500');
                    ruleElement.classList.remove('text-emerald-400', 'font-bold');
                    iconElement.classList.add('ph-circle');
                    iconElement.classList.remove('ph-check-circle-fill');
                }
            }

            // Función central para habilitar/deshabilitar botón
            function checkFormValidity() {
                // AHORA INCLUIMOS validEmail EN LA CONDICIÓN
                if (validEmail && validLength && validUpper && validMatch && terms.checked) {
                    btnSubmit.disabled = false;
                    btnSubmit.classList.remove('bg-slate-800', 'text-slate-500', 'cursor-not-allowed', 'grayscale');
                    btnSubmit.classList.add('bg-gradient-to-r', 'from-purple-600', 'to-emerald-600', 'text-white', 'shadow-lg', 'shadow-purple-500/20', 'hover:scale-[1.02]', 'cursor-pointer');
                } else {
                    btnSubmit.disabled = true;
                    btnSubmit.classList.add('bg-slate-800', 'text-slate-500', 'cursor-not-allowed', 'grayscale');
                    btnSubmit.classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-emerald-600', 'text-white', 'shadow-lg', 'shadow-purple-500/20', 'hover:scale-[1.02]', 'cursor-pointer');
                }
            }

            // NUEVO: Validación de Email
            email.addEventListener('input', function() {
                const val = email.value;
                // Regex simple para validar email (algo@algo.algo)
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validEmail = emailRegex.test(val);

                // Feedback visual en el icono del email
                if(validEmail) {
                    emailIcon.classList.remove('text-slate-500', 'group-focus-within/input:text-purple-400'); // Quitamos colores base
                    emailIcon.classList.add('text-emerald-400'); // Ponemos verde éxito
                } else {
                    emailIcon.classList.add('text-slate-500'); // Volvemos al gris
                    emailIcon.classList.remove('text-emerald-400');
                }

                checkFormValidity();
            });

            // Evento: Contraseña
            password.addEventListener('input', function() {
                const val = password.value;
                validLength = val.length >= 8;
                setRuleState(validLength, ruleLength, iconLength);

                validUpper = /[A-Z]/.test(val);
                setRuleState(validUpper, ruleUpper, iconUpper);

                if (validLength && validUpper) {
                    confirm.disabled = false;
                    // Solo si ya había algo escrito en confirmar, re-validamos coincidencia
                    if(confirm.value.length > 0) {
                         validMatch = (confirm.value === val);
                         setRuleState(validMatch, ruleMatch, iconMatch);
                    }
                } else {
                    confirm.disabled = true;
                    confirm.value = '';
                    validMatch = false;
                    ruleMatch.classList.add('opacity-0');
                }
                
                checkFormValidity();
            });

            // Evento: Confirmar Contraseña
            confirm.addEventListener('input', function() {
                const val = confirm.value;
                ruleMatch.classList.remove('opacity-0');
                validMatch = (val === password.value && val.length > 0);
                setRuleState(validMatch, ruleMatch, iconMatch);
                checkFormValidity();
            });

            // Evento: Checkbox
            terms.addEventListener('change', checkFormValidity);
        });
    </script>
@endsection 