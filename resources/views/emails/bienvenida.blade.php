<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .wrapper { background-color: #0f172a; padding: 40px 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .main-card { background-color: #1e293b; max-width: 500px; margin: 0 auto; border-radius: 24px; border: 1px solid #334155; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3); }
        .gradient-bar { height: 6px; background: linear-gradient(to right, #0891b2, #3b82f6); }
        .content { padding: 40px; text-align: center; }
        .logo { font-size: 50px; margin-bottom: 10px; display: block; }
        h1 { color: #ffffff; font-size: 28px; font-weight: 800; margin-bottom: 8px; letter-spacing: -0.5px; }
        p { color: #94a3b8; font-size: 16px; line-height: 1.6; margin-bottom: 25px; }
        .user-name { color: #22d3ee; font-weight: bold; }
        .btn-nexus { display: inline-block; background: linear-gradient(to right, #0891b2, #2563eb); color: #ffffff !important; text-decoration: none; padding: 14px 32px; border-radius: 12px; font-weight: bold; font-size: 16px; transition: transform 0.2s; box-shadow: 0 10px 15px -3px rgba(8, 145, 178, 0.3); }
        .footer { padding: 20px; text-align: center; color: #64748b; font-size: 12px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <div class="gradient-bar"></div>
            <div class="content">
                <span class="logo">📚</span>
                <h1>NEXUS <span style="color: #22d3ee;">Sistema</span></h1>
                <p>¡Hola <span class="user-name">{{ $user->name }}</span>! Tu cuenta ha sido activada con éxito. Estamos listos para llevar tu experiencia de lectura al siguiente nivel.</p>
                <a href="{{ url('/login') }}" class="btn-nexus">Acceder a mi panel</a>
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} NEXUS Biblioteca. Este es un correo automático, por favor no respondas.<br>
        </div>
    </div>
</body>
</html>