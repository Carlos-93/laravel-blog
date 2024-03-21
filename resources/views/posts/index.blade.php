@section('title', 'Publicaciones')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Publicaciones más recientes</h1>
        @foreach ($posts as $post)
        <article class="mb-12 p-6 bg-white rounded-lg shadow-xl border w-3/5">
            <!-- Título del Post -->
            <h2 class="text-2xl font-bold mb-2"><a href="{{ route('posts.show', $post) }}" class="text-orange-500 hover:text-orange-600 transition duration-300">{{ $post->title }}</a></h2>
            <!-- Resumen o Extracto del Contenido -->
            <p class="mb-4 font-medium">{{ $post->content }}</p>
            <!-- Información del Autor y Fecha de Publicación -->
            <p class="mb-4 text-gray-400">Publicado por <span class="font-bold text-gray-600">{{ $post->author->name ?? 'Usuario desconocido' }}</span> el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }}h</p>
            <!-- Leer Más... -->
            <a href="{{ route('posts.show', $post) }}" class="font-bold inline-block mb-4 text-red-500 hover:text-red-800 transition duration-300">Leer más...</a><br>
            <!-- Número de Comentarios -->
            <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="font-bold text-orange-500 hover:text-orange-700 cursor-pointer transition duration-300">Dejar un comentario <span class="ml-5 font-bold text-gray-600 cursor-default">[ {{ $post->comments_count }} ] Comentario/s</span></a>
            <!-- Botones de Acción para el Administrador y el Autor -->
            @if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id === $post->author_id))
            <div class="flex justify-end gap-4">
                <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-orange-500 hover:bg-orange-400 text-white font-bold py-1.5 px-2.5 rounded transition duration-300 ease-in-out">
                    Editar Publicación
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-400 text-white font-bold py-1.5 px-2.5 rounded transition duration-300 ease-in-out">
                        Eliminar Publicación
                    </button>
                </form>
            </div>
            @endif
        </article>
        @endforeach
        @if ($posts->isEmpty())
        <p class="mb-10">Todavía no hay publicaciones en el BLOG</p>
        @endif
        <!-- Botón para Crear una Nueva Publicación -->
        @if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isWriter()))
        <a href="{{ route('posts.create') }}" class="inline-block bg-orange-500 hover:bg-orange-400 text-white font-bold py-1.5 px-2.5 rounded transition duration-300 ease-in-out">
            Nueva Publicación
        </a>
        @endif
    </div>
</x-app-layout>