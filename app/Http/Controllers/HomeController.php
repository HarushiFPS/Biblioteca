<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;

class HomeController extends Controller
{
    public function index()
    {
        // 1. CARGA AMBICIOSA (Eager Loading)
        $libros = Libro::with(['categoria'])->paginate(10);

        // 2. ESTADÍSTICAS REALES
        $total_libros = $libros->total(); 
        $libros_prestados = Libro::where('estatus', 1)->count(); 
        $total_usuarios = User::count(); 
        $devoluciones_pendientes = Prestamo::where('estatus', 0)->count(); 

        // 3. ACTIVIDAD RECIENTE (Últimos 5 préstamos)
        $ultimos_prestamos = Prestamo::with(['usuario', 'libro'])->latest()->take(5)->get();

        return view('welcome', compact('total_libros', 'libros_prestados', 'total_usuarios', 'devoluciones_pendientes', 'ultimos_prestamos'));
    }
}