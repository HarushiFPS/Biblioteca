<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserType
{
    public function handle(Request $request, Closure $next): Response
    {
        // Revisamos si el usuario actual es administrador
        if (auth()->check() && auth()->user()->tipo_usuario === 'admin') {
            return $next($request); // Déjalo pasar
        }

        // Si es un usuario normal (o no ha iniciado sesión), lo pateamos a su propia vista
        return redirect()->route('user.home');
    }
}