@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Mi Perfil</h1>
        <p class="text-gray-500">Administra tus datos personales y credenciales de seguridad.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4">Información Personal</h2>

            <form action="{{ route('perfil.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-bold text-gray-700 block mb-2">Nombre de Usuario</label>
                    <input type="text" name="name" value="{{ $user->name }}" required class="w-full bg-gray-50 text-gray-800 border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-sm font-bold text-gray-700 block mb-2">Correo Electrónico (No editable)</label>
                    <input type="email" value="{{ $user->email }}" disabled class="w-full bg-gray-100 text-gray-500 border border-gray-300 rounded-lg py-2 px-3 cursor-not-allowed">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-bold transition-colors mt-4">
                    Actualizar Información
                </button>
            </form>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4">Seguridad</h2>

            <form action="{{ route('perfil.password') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-bold text-gray-700 block mb-2">Contraseña Actual</label>
                    <input type="password" name="current_password" required class="w-full bg-gray-50 text-gray-800 border @error('current_password') border-red-500 @else border-gray-300 @enderror rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    @error('current_password')
                        <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-bold text-gray-700 block mb-2">Nueva Contraseña</label>
                    <input type="password" name="new_password" required class="w-full bg-gray-50 text-gray-800 border @error('new_password') border-red-500 @else border-gray-300 @enderror rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    @error('new_password')
                        <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="text-sm font-bold text-gray-700 block mb-2">Confirmar Nueva Contraseña</label>
                    <input type="password" name="new_password_confirmation" required class="w-full bg-gray-50 text-gray-800 border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white py-2 rounded-lg font-bold transition-colors mt-4">
                    Cambiar Contraseña
                </button>
            </form>
        </div>

    </div>
</div>
@endsection