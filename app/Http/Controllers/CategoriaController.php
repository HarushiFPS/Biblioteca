<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Pedirle al modelo TODAS las categorías de la base de datos
        $categorias = Categoria::all();
        
        // 2. Enviarlas a una vista (que crearemos enseguida)
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar que no esté vacío
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // 2. Crear la categoría usando el Modelo
        Categoria::create($request->all());

        // 3. Redirigir al usuario a la lista (index)
        return redirect()->route('categorias.index');
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
        // Buscar la categoría por su ID
        $categoria = Categoria::findOrFail($id);
        
        // Cargar la vista pasándole los datos
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar que el nombre no esté vacío
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Buscar y actualizar
        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->nombre
        ]);

        // Volver a la lista
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
