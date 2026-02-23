<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

// ==========================================
// RUTAS PROTEGIDAS (Solo admin)
// ==========================================
// Temporalmente el panel apunta a 'welcome'
Route::get('/admin', function () {
    return view('welcome');
})->name('admin.dashboard');

// ==========================================
// RUTAS DE AUTENTICACIÓN
// ==========================================

// Mostrar formularios (GET)
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar formularios (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('categorias', CategoriaController::class);