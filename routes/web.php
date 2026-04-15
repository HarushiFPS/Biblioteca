<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrestamoController;

// ==========================================
// RUTAS PÚBLICAS
// ==========================================
Route::get('/', function () {
    return view('index');
});

// Mostrar formularios (GET)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar formularios (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// ==========================================
// RUTAS DE USUARIO NORMAL (Solo requiere estar logueado)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    // Cerrar sesión (Ambos tipos de usuario necesitan poder salir)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Pantalla principal del usuario estándar
    Route::get('/home', function () {
        return view('user.home');
    })->name('user.home');

});

// ==========================================
// RUTAS PROTEGIDAS (Requiere login + Ser Admin)
// ==========================================
Route::middleware(['auth', 'userType'])->group(function () {
    
    // Dashboard optimizado
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

    // CRUDs de administración
    Route::resource('categorias', CategoriaController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('users', UserController::class);
    Route::post('prestamos/buscar-usuario', [App\Http\Controllers\PrestamoController::class, 'buscar_usuario'])->name('prestamos.buscar_usuario');
    Route::put('prestamos/{id}/entregar', [App\Http\Controllers\PrestamoController::class, 'entregar'])->name('prestamos.entregar');
    Route::post('prestamos/seleccionar-libro', [App\Http\Controllers\PrestamoController::class, 'seleccionar_libro'])->name('prestamos.seleccionar_libro');
    Route::resource('prestamos', PrestamoController::class);

});