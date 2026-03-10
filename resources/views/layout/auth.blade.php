<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXUS - @yield('titulo')</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📚</text></svg>">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-200 antialiased min-h-screen flex flex-col relative">

    <div class="fixed inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1507842217153-656bfa75bc28?q=80&w=2070&auto=format&fit=crop" 
             class="w-full h-full object-cover opacity-20 scale-105 blur-sm">
        <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-slate-900/90 to-slate-950/80"></div>
        
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-[100px] animate-pulse delay-1000"></div>
    </div>

    <div class="relative z-10 flex flex-col min-h-screen w-full">
        
        <main class="flex-grow flex items-center justify-center w-full px-6 py-24">
            
            <div class="w-full max-w-md">
                @yield('content')
            </div>

        </main>

        @include('partials.footer')
        
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        if(togglePassword) {
            togglePassword.addEventListener('click', function (e) {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                if(type === 'text'){
                    eyeIcon.classList.remove('ph-eye-slash');
                    eyeIcon.classList.add('ph-eye');
                    eyeIcon.classList.add('text-cyan-400');
                } else {
                    eyeIcon.classList.remove('ph-eye');
                    eyeIcon.classList.add('ph-eye-slash');
                    eyeIcon.classList.remove('text-cyan-400');
                }
            });
        }
    </script>
</body>
</html>