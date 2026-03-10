<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estatus',
    ];

    // Relación: Un préstamo pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación: Un préstamo pertenece a un libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}