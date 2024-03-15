@section('title', 'Publicaciones más recientes')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Publicaciones más recientes</h1>
        @foreach ($posts as $post)
        <article class="mb-12 p-6 bg-white rounded-lg shadow w-3/5">
            <!-- Título del Post -->
            <h2 class="text-2xl font-bold mb-2"><a href="{{ route('posts.show', $post) }}" class="text-orange-500 hover:text-orange-600 transition duration-300">{{ $post->title }}</a></h2>
            <!-- Resumen o Extracto del Contenido -->
            <p class="mb-4 font-medium">{{ $post->content }}</p>
            <!-- Información del Autor y Fecha de Publicación -->
            <p class="mb-4 text-gray-400">Publicado por <span class="font-bold text-gray-500">{{ $post->author->name ?? 'Usuario desconocido' }}</span> el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }}h</p>
            <!-- Leer Más... -->
            <a href="{{ route('posts.show', $post) }}" class="inline-block mb-4 text-orange-500 hover:text-orange-800 transition duration-300">Leer más...</a>
            <!-- Número de Comentarios -->
            <p class="text-gray-600">[{{ $post->comments_count ?? '0' }}] Comentarios</p>
        </article>
        @endforeach
        @if ($posts->isEmpty())
        <p>Todavía no hay publicaciones en el BLOG</p>
        @endif
    </div>
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('posts.create') }}" class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
            Nueva Publicación
        </a>
    </div>
</x-app-layout>