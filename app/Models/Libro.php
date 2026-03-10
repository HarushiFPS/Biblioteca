<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Permitir asignación masiva para estos campos
    protected $fillable = [
        'nombre',
        'isbn',
        'autor',
        'editorial',
        'estatus',
        'portada',
        'categoria_id'
    ];

    // Relación: Un libro pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}