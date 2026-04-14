<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    public function index()
    {
        // Traemos todos los préstamos para mandarlos a la tabla
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    // Mostrar el formulario vacío
    public function create()
    {
        $libros = Libro::all(); 
        $usuarios = User::all(); // <-- AGREGAMOS ESTO
        
        return view('prestamos.create', compact('libros', 'usuarios')); // <-- Lo pasamos a la vista
    }

    // La función del profesor (Modificada para que funcione su @isset)
    public function buscar_usuario(Request $request)
    {
        $request->validate([
            'tipo_busqueda' => 'required|in:id,nombre',
            'busqueda' => 'required',
        ]);

        // 1. Usar find() en lugar de findOrFail() para que NO dé error 404
        if ($request->tipo_busqueda === 'id') {
            $usuario = User::find($request->busqueda);
        } else {
            $usuario = User::where('name', 'LIKE', '%' . $request->busqueda . '%')->first();
        }

        $libros = Libro::all();
        $usuarios = User::all();

        // 2. Si no existe, regresamos la vista normal pero con la variable de error
        if (!$usuario) {
            return view('prestamos.create', [
                'error_busqueda' => 'Verifica el dato ingresado e intenta de nuevo.',
                'libros' => $libros,
                'usuarios' => $usuarios
            ]);
        }

        // 3. Si sí existe, pasamos el usuario normal
        return view('prestamos.create', compact('usuario', 'libros', 'usuarios'));
    }

    // Función para mostrar la Pantalla 2
    public function seleccionar_libro(Request $request)
    {
        // Recibimos el ID del usuario desde la Pantalla 1
        $usuario = User::findOrFail($request->usuario_id);
        
        // Traemos los libros (¡Asegúrate de tener libros registrados!)
        $libros = Libro::all(); 

        // Retornamos la nueva vista que vamos a crear
        return view('prestamos.select_libro', compact('usuario', 'libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id'   => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            // 1. Crear el préstamo
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id   = $request->input('libro_id');
            $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
            $prestamo->save();

            // 2. Cambiar el estatus del Libro a Prestado (Como enseñó el profesor)
            $libro = Libro::findOrFail($request->input('libro_id'));
            $libro->estatus = 1; // Suponiendo que 1 significa "Prestado"
            $libro->save();

            DB::commit();
            return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
            
        } catch (\Exception $e) {
            DB::rollBack();
            // Lo adaptamos a la versión del profe: redirigir al index con mensaje de error
            return redirect()->route('prestamos.index')->with('error', 'Error al registrar el préstamo: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }

    // Función para registrar la devolución de un libro
    public function entregar($id)
    {
        DB::beginTransaction();

        try {
            // 1. Buscamos el préstamo exacto
            $prestamo = Prestamo::findOrFail($id);

            // 2. Actualizamos el préstamo: estatus 1 (Devuelto) y la fecha de hoy
            $prestamo->estatus = 1; 
            $prestamo->fecha_devolucion = now();
            $prestamo->save();

            // 3. Liberamos el libro para que vuelva a estar Disponible (estatus 0)
            if ($prestamo->libro) {
                $prestamo->libro->estatus = 0;
                $prestamo->libro->save();
            }

            // Confirmamos la transacción
            DB::commit();

            return redirect()->route('prestamos.index')->with('success', 'Libro devuelto y registrado correctamente en el inventario.');
            
        } catch (\Exception $e) {
            // Si algo falla, deshacemos todo
            DB::rollBack();
            return redirect()->route('prestamos.index')->with('error', 'Ocurrió un error al procesar la devolución: ' . $e->getMessage());
        }
    }
}
