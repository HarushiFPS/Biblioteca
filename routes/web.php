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
    
    Route::get('/admin', function () {
        return view('welcome');
    })->name('admin.dashboard');

    // CRUDs de administración
    Route::resource('categorias', CategoriaController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('users', UserController::class);
    Route::resource('prestamos', PrestamoController::class);

});