@section('title', 'Mis Publicaciones')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Mis Publicaciones</h1>
        @forelse ($posts as $post)
        <article class="mb-12 p-6 bg-white rounded-lg shadow w-3/5">
            <!-- Título del Post -->
            <h2 class="text-2xl font-bold mb-2">
                <a href="{{ route('posts.show', $post) }}" class="text-orange-500 hover:text-orange-600 transition duration-300">
                    {{ $post->title }}
                </a>
            </h2>
            <!-- Resumen o Extracto del Contenido -->
            <p class="mb-4 font-medium">{{ $post->content }}</p>
            <!-- Información del Autor y Fecha de Publicación -->
            <p class="mb-4 text-gray-400">
                Publicado el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }}h
            </p>
            <!-- Leer Más... -->
            <a href="{{ route('posts.show', $post) }}" class="inline-block mb-4 text-orange-500 hover:text-orange-800 transition duration-300">
                Leer más...
            </a>
            <!-- Número de Comentarios -->
            <p class="text-gray-600">[{{ $post->comments_count ?? '0' }}] Comentarios</p>
            <div class="flex justify-end mt-4">
                <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    Editar
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 ml-4">
                        Eliminar
                    </button>
                </form>
            </div>
        </article>
        @empty
        <p>Todavía no hay publicaciones tuyas</p>
        @endforelse
    </div>
    <div class="container mx-auto px-4">
        <a href="{{ route('posts.create') }}" class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            Nueva Publicación
        </a>
    </div>
</x-app-layout>