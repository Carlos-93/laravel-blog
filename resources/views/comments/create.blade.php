@section('title', 'Nuevo Comentario')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8 flex flex-col items-center">
        <h1 class="text-3xl font-bold my-10 text-center">Crear nuevo comentario</h1>
        <article class="mb-12 p-6 rounded-lg w-3/5">
            <h2 class="text-xl font-bold mb-4">Respondiendo a la publicación:</h2>
            <p class="mb-4 text-orange-500 font-bold">{{ $post->title }}</p>
            <p class="mb-10">{{ $post->content }}</p>
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <!-- Campo oculto para enviar el ID del post -->
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-lg font-bold mb-2">Comentario:</label>
                    <textarea name="content" id="content" rows="5" placeholder="Escribe aquí el contenido de tu comentario" class="shadow-lg appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required></textarea>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Añadir Comentario" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded cursor-pointer transition duration-300 ease-in-out">
                </div>
            </form>
        </article>
    </div>
</x-app-layout>