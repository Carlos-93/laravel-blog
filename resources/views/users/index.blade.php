@section('title', 'Panel de Usuarios')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24">
        <h1 class="text-3xl font-bold my-10">Panel de Usuarios</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
            <div class="bg-white rounded-lg shadow p-6 shadow-xl flex flex-col gap-2">
                <h2 class="text-2xl font-bold mb-2">{{ $user->name }}</h2>
                <p class="font-bold font- text-gray-600">Correo Electrónico: <span class="font-normal">{{ $user->email }}</span></p>
                <p class="font-bold text-gray-600">Rol en la web: <span class="font-normal">{{ $user->role }}</span></p>
                <p class="font-bold text-gray-600">Publicaciones: <span class="font-normal">{{ $user->posts->count() }}</span></p>
                <p class="font-bold text-gray-600">Última publicación: <span class="font-normal">{{ $user->posts->last() ? $user->posts->last()->title : 'Ninguna' }}</span></p>
                <p class="font-bold text-gray-600">Comentarios realizados: <span class="font-normal">{{ $user->comments->count() }}</span></p>
                <p class="font-bold text-gray-600">Último comentario: <span class="font-normal">{{ $user->comments->last() ? $user->comments->last()->content : 'Ninguno' }}</span></p>
                <p class="font-bold text-gray-600">Usuario creado: <span class="font-normal">{{ $user->created_at }}</span></p>
                <div class="mt-6 flex gap-4 justify-end">
                    <a href="{{ route('users.edit', $user) }}" class="font-bold inline-block text-orange-500 hover:text-orange-800 transition duration-300">Editar Usuario</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold text-red-500 hover:text-red-800 transition duration-300">Eliminar Usuario</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>