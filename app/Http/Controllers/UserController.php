<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <-- IMPORTANTE: Importar el modelo
use Illuminate\Validation\Rule; // Importar regla de validación

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        // Paginamos de 10 en 10 usuarios, ordenados por fecha de registro
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Actualiza el usuario en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // 1. Validar información
        $request->validate([
            'name' => 'required|string|max:255',
            // Validamos email único pero ignorando al ID actual
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // Validamos que el rol sea uno de los permitidos
            'tipo_usuario' => 'required|string|in:admin,usuario',
            // La contraseña es opcional al editar
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // 2. Preparar los datos básicos
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario, // <--- AQUÍ SE CAMBIA EL ROL
        ];

        // 3. Si el usuario escribió una contraseña nueva, la hasheamos y guardamos
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Elimina el usuario de la base de datos.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Medida de seguridad: Un admin no puede eliminarse a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}