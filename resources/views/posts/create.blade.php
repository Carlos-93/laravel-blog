@section('title', 'Nueva Publicación')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-3xl font-bold my-10 text-center">Crear nueva publicación</h1>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-lg font-bold mb-2">Título:</label>
                    <input type="text" name="title" id="title" placeholder="Introduce el título de tu publicación" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-lg font-bold mb-2">Contenido:</label>
                    <textarea name="content" id="content" rows="8" placeholder="Escribe aquí el contenido de tu publicación" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"></textarea>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Añadir Publicación" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>