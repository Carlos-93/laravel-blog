@section('title', 'Mis Publicaciones')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Mis Publicaciones</h1>
        @forelse ($posts as $post)
        <article class="mb-12 p-6 bg-white rounded-lg shadow-xl border w-3/5">
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
            <a href="{{ route('posts.show', $post) }}" class="inline-block mb-4 text-red-500 hover:text-red-800 transition duration-300">Leer más...</a><br>
            <!-- Número de Comentarios -->
            <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="text-gray-600 hover:text-orange-500 transition duration-300 ease-in-out cursor-pointer">Dejar un comentario / [{{ $post->comments_count ?? '0' }}] Comentarios</a>
            <!-- Botones de Acción -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                    Editar Publicación
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                        Eliminar Publicación
                    </button>
                </form>
            </div>
        </article>
        @empty
        <p class="mb-10">Todavía no hay publicaciones tuyas</p>
        @endforelse
        <a href="{{ route('posts.create') }}" class="inline-block bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
            Nueva Publicación
        </a>
    </div>
</x-app-layout>