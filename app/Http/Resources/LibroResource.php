<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->nombre,
            'isbn' => $this->isbn,
            'autor' => $this->autor,
            'editorial' => $this->editorial,
            // Construimos la URL completa de la portada si existe
            'portada' => $this->portada ? asset('storage/' . $this->portada) : null,
            // Traemos el nombre de la categoría directamente para no mandar solo el ID
            'categoria' => $this->whenLoaded('categoria', function () {
                return $this->categoria->nombre;
            }),
        ];
    }
}