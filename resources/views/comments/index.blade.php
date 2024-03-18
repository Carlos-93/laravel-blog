@section('title', 'Panel de Comentarios')

<x-app-layout>
    <div class="container mx-auto px-4 pt-24 py-8">
        <h1 class="text-3xl font-bold my-10">Panel de Comentarios</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($comments as $comment)
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-2">{{ $comment->author->name }}</h2>
                <h3 class="text-md font-bold text-orange-500 mb-2">{{ $comment->post->title }}</h3>
                <p class="text-gray-600">{{ $comment->content }}</p>
                <p class="text-gray-400 text-sm mt-2">Comentado el dia {{ $comment->created_at->format('d/m/Y H:i') }}h</p>
                <div class="mt-6 flex gap-4 justify-end">
                    <a href="{{ route('comments.edit', $comment) }}" class="font-bold inline-block text-orange-500 hover:text-orange-800 transition duration-300">Editar Comentario</a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold text-red-500 hover:text-red-800 transition duration-300">Eliminar Comentario</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>