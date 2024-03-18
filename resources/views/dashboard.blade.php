@section('title', 'Panel de Administración')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Panel de Administración</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6 border shadow-xl hover:shadow-lg hover:shadow-orange-500 transition duration-300">
                <h2 class="text-2xl font-bold mb-2">Usuarios</h2>
                <p class="text-gray-600">Administra los usuarios de la plataforma</p>
                <div class="mt-4">
                    <a href="{{ route('users.index') }}" class="inline-block text-orange-500 hover:text-orange-800 transition duration-300">Ver Usuarios</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 border shadow-xl hover:shadow-lg hover:shadow-orange-500 transition duration-300">
                <h2 class="text-2xl font-bold mb-2">Publicaciones</h2>
                <p class="text-gray-600">Administra las publicaciones de la plataforma</p>
                <div class="mt-4">
                    <a href="{{ route('posts.index') }}" class="inline-block text-orange-500 hover:text-orange-800 transition duration-300">Ver Publicaciones</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 bborder shadow-xl hover:shadow-lg hover:shadow-orange-500 transition duration-300">
                <h2 class="text-2xl font-bold mb-2">Comentarios</h2>
                <p class="text-gray-600">Administra los comentarios de la plataforma</p>
                <div class="mt-4">
                    <a href="{{ route('comments.index') }}" class="inline-block text-orange-500 hover:text-orange-800 transition duration-300">Ver Comentarios</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>