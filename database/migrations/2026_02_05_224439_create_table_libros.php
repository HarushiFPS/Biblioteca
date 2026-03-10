<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('isbn', 100);
            $table->string('autor', 255);
            $table->string('editorial', 255);
            $table->smallInteger('estatus')->default(0);
            
            // NUEVO CAMPO: Permitimos que sea 'nullable' por si un libro no tiene imagen
            $table->string('portada')->nullable(); 
            
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};