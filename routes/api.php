<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\LibroApiController;
use App\Http\Controllers\Api\PrestamoApiController; // <-- Agregamos el import

// Ruta PÚBLICA (Login)
Route::post('/login', [ApiController::class, 'login']);

// Rutas PROTEGIDAS (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    
    // Módulo 4: Destruir token
    Route::post('/logout', [ApiController::class, 'logout']);

    // Módulo 5: GET Libros Disponibles
    Route::get('/libros-disponibles', [LibroApiController::class, 'librosDisponibles']);
    
    // Módulo 6: POST Entregar Libro
    Route::post('/entregar-libro', [PrestamoApiController::class, 'entregarLibro']);
    
});