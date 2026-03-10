<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            
            // Llaves foráneas exactas a las de tu clase
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('libro_id');
            
            // Fechas del préstamo
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion')->nullable();
            
            // Estatus (0 = Activo/Prestado, 1 = Devuelto)
            $table->smallInteger('estatus')->default(0); 

            // Construcción de las relaciones (Como en la foto de tu compañero)
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};