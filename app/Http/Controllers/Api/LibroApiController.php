<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Http\Resources\LibroResource;

class LibroApiController extends Controller
{
    /**
     * Retorna la lista de libros disponibles.
     */
    public function librosDisponibles()
    {
        // Traemos los libros con estatus 0 (Disponibles) e incluimos la relación 'categoria' para no tener N+1 queries
        $libros = Libro::with('categoria')->where('estatus', 0)->get();

        // Retornamos la colección filtrada por nuestro LibroResource
        return LibroResource::collection($libros);
    }
}