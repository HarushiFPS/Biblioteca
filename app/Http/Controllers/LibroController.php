<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Traemos los libros junto con su categoría, ordenados por el más reciente
        // y le decimos a Laravel que los pagine de 10 en 10
        $libros = Libro::with('categoria')->latest()->paginate(5);

        // Retornamos la vista pasándole la variable $libros
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 1. Obtenemos todas las categorías de la BD para el menú desplegable
        $categorias = \App\Models\Categoria::all();

        // 2. Retornamos la vista pasándole las categorías
        return view('libros.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar la información recibida
        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'estatus' => 'required|integer',
            // Validamos que sea imagen y no pese más de 2MB
            'portada' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        // 2. Procesar la imagen (si es que el usuario subió una)
        $rutaPortada = null;
        if ($request->hasFile('portada')) {
            // Guarda la imagen en la carpeta "public/portadas"
            $rutaPortada = $request->file('portada')->store('portadas', 'public');
        }

        // 3. Crear el registro en la base de datos
        Libro::create([
            'nombre' => $request->nombre,
            'isbn' => $request->isbn,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'categoria_id' => $request->categoria_id,
            'estatus' => $request->estatus,
            'portada' => $rutaPortada, // Guardamos la ruta de la imagen
        ]);

        // 4. Redirigir al catálogo de libros
        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Categoria::all(); // Necesitamos las categorías para el select
        
        return view('libros.edit', compact('libro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'isbn' => 'required|string|max:100',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'estatus' => 'required|integer',
            'portada' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        $libro = Libro::findOrFail($id);

        // Guardamos todos los datos validados excepto la imagen (la tratamos aparte)
        $datosLibro = $request->except(['_token', '_method', 'portada']);

        // Si el usuario subió una imagen nueva...
        if ($request->hasFile('portada')) {
            // 1. Borramos la imagen anterior si es que tenía una
            if ($libro->portada) {
                Storage::disk('public')->delete($libro->portada);
            }
            // 2. Guardamos la nueva imagen
            $datosLibro['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        $libro->update($datosLibro);

        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        // Si el libro tiene una portada, la borramos del servidor antes de borrar el registro
        if ($libro->portada) {
            Storage::disk('public')->delete($libro->portada);
        }

        $libro->delete();

        return redirect()->route('libros.index');
    }
}
