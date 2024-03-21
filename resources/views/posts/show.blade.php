@section('title', 'Publicación: ' . $post->title)

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Historial de la publicación</h1>
        <article class="mb-12 p-6 bg-white rounded-lg shadow w-3/5">
            <!-- Título y contenido del Post -->
            <h1 class="text-2xl font-bold mb-2 text-orange-500 hover:text-orange-600 transition duration-300">{{ $post->title }}</h1>
            <p class="mb-4 font-medium">{{ $post->content }}</p>
            <!-- Información del Autor y Fecha de Publicación -->
            <p class="mb-4 text-gray-400">Publicado por <span class="font-bold text-gray-600">{{ $post->author->name ?? 'Usuario desconocido' }}</span> el {{ $post->created_at->format('d/m/Y') }} a las {{ $post->created_at->format('H:i') }}h</p>
            <!-- Número de Comentarios -->
            <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="font-bold text-orange-500 hover:text-orange-700 cursor-pointer transition duration-300">Dejar un comentario <span class="ml-5 font-bold text-gray-600 cursor-default">[ {{ $post->comments_count }} ] Comentario/s</span></a>
        </article>

        <section class="mt-8 w-3/5">
            <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
            @forelse ($post->comments as $comment)
            <article class="mb-4 p-4 bg-white rounded-lg shadow flex flex-col gap-3">
                <p class="font-bold text-gray-600">{{ $comment->author->name }} <span class="font-normal"> ha comentado:</span></p>
                <p>{{ $comment->content }}</p>
                <p class="text-gray-400">Comentado el {{ $comment->created_at->format('d/m/Y') }} a las {{ $comment->created_at->format('H:i') }}h</p>
                <!-- Botones de Editar y Eliminar para Administradores o el Autor del comentario -->
                @if(auth()->user()->role == 'Administrador' || auth()->id() == $comment->author_id)
                <div class="flex justify-end gap-4">
                    <a href="{{ route('comments.edit', $comment) }}" class="font-bold text-orange-500 hover:text-orange-700 transition duration-300">Editar comentario</a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold text-red-500 hover:text-red-700 transition duration-300">Eliminar comentario</button>
                    </form>
                </div>
                @endif
            </article>
            @empty
            <p class="text-gray-600">No hay comentarios aún para esta publicación</p>
            @endforelse
        </section>
    </div>
</x-app-layout>