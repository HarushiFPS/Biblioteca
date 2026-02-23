<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ==========================================
    // REGISTRO DE USUARIOS
    // ==========================================
    
    // Muestra la vista del formulario de registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesa los datos y guarda al usuario en la BD
    public function register(Request $request)
    {
        // 1. Validar los datos recibidos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' verifica que coincida con password_confirmation
        ]);

        // 2. Crear el usuario encriptando la contraseña por seguridad
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Iniciar sesión automáticamente tras el registro
        Auth::login($user);

        // 4. Redirigir al panel de administración
        return redirect('/admin')->with('success', '¡Cuenta creada con éxito!');
    }


    // ==========================================
    // INICIO DE SESIÓN (LOGIN)
    // ==========================================

    // Muestra la vista del formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesa las credenciales para iniciar sesión
    public function login(Request $request)
    {
        // 1. Validar que vengan los datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión por seguridad (evita ataques de fijación de sesión)
            $request->session()->regenerate();
            
            return redirect()->intended('/admin');
        }

        // 3. Si falla, regresar con error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    // ==========================================
    // CERRAR SESIÓN
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}