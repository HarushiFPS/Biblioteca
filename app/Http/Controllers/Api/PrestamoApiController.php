<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;

class PrestamoApiController extends Controller
{
    /**
     * Procesa la entrega de un libro mediante la API.
     */
    public function entregarLibro(Request $request)
    {
        // 1. Validamos que nos envíen un ID y que realmente exista en la tabla prestamos
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id'
        ]);

        // 2. Iniciamos la Transacción Segura
        try {
            DB::beginTransaction();

            $prestamo = Prestamo::findOrFail($request->prestamo_id);

            // Validación extra: Evitar entregar algo ya devuelto (estatus 1 según tu migración)
            if ($prestamo->estatus === 1) {
                return response()->json([
                    'message' => 'Este préstamo ya fue marcado como devuelto anteriormente.'
                ], 400);
            }

            // 3. Actualizamos el estatus del préstamo y le ponemos la fecha actual (USANDO TUS COLUMNAS REALES)
            $prestamo->estatus = 1; 
            $prestamo->fecha_devolucion = now();
            $prestamo->save();

            // 4. Buscamos el libro asociado y lo volvemos a poner disponible (0)
            $libro = Libro::findOrFail($prestamo->libro_id);
            $libro->estatus = 0; 
            $libro->save();

            // 5. Si llegamos hasta aquí sin errores, confirmamos los cambios en la BD
            DB::commit();

            return response()->json([
                'message' => 'Libro entregado exitosamente y devuelto al inventario.',
                'prestamo_actualizado' => $prestamo
            ], 200);

        } catch (\Exception $e) {
            // Si cualquier cosa falla, deshacemos todo
            DB::rollBack();
            
            return response()->json([
                'message' => 'Ocurrió un error crítico al procesar la entrega.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}