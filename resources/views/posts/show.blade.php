@section('title', 'Publicación: ' . $post->title)

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <article class="mb-12 p-6 bg-white rounded-lg shadow">
            <!-- Título del Post -->
            <h1 class="text-2xl font-bold mb-2 text-orange-500 hover:text-orange-600 transition duration-300">{{ $post->title }}</h1>
            <!-- Contenido del Post -->
            <p class="mb-4 font-medium">{{ $post->content }}</p>
            <!-- Información del Autor y Fecha de Publicación -->
            <p class="mb-4 text-gray-400">Publicado por <span class="font-bold text-gray-500">{{ $post->author->name ?? 'Usuario desconocido' }}</span> el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }}h</p>
        </article>

        <section class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
            @forelse ($post->comments as $comment)
            <article class="mb-4 p-4 bg-white rounded-lg shadow">
                <p>{{ $comment->content }}</p>
            </article>
            @empty
            <p class="text-gray-600">No hay comentarios aún para esta publicación</p>
            @endforelse
        </section>
    </div>
</x-app-layout>