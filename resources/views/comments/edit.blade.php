@section('title', 'Editar Comentario')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <div class="max-w-lg mx-auto">
            <h1 class="text-3xl font-bold my-10 text-center">Editar Comentario</h1>
            <form action="{{ route('comments.update', $comment) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-lg font-bold mb-2">Contenido:</label>
                    <textarea name="content" id="content" rows="5" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="Escribe aquí el contenido de tu comentario">{{ $comment->content }}</textarea>
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="Actualizar Comentario" class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-1.5 px-2.5 rounded cursor-pointer transition duration-300 ease-in-out">
                </div>
            </form>
        </div>
    </div>
</x-app-layout>