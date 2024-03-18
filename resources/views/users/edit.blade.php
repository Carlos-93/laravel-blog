@section('title', 'Editar Usuario')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-3xl font-bold my-10">Editar Usuario / {{ $user->name }}</h1>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-bold mb-2">Rol</label>
                    <select name="role" id="role" class="w-full p-2 border rounded">
                        <option value="Administrador" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="Escritor" {{ $user->role === 'escritor' ? 'selected' : '' }}>Escritor</option>
                        <option value="Lector" {{ $user->role === 'reader' ? 'selected' : '' }}>Lector</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">Actualizar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>