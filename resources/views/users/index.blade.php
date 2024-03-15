@section('title', 'Panel de Usuarios')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Panel de Usuarios</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-2">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
                <div class="mt-4">
                    <a href="{{ route('users.edit', $user) }}" class="inline-block text-orange-500 hover:text-orange-800 transition duration-300">Editar</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-800 transition duration-300">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>