<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController
{
    // Método para mostrar todos los posts
    public function index()
    {
        $posts = Post::withCount('comments')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    // Método para mostrar los posts del usuario
    public function myPosts()
    {
        $posts = Post::where('author_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('posts.my-posts', compact('posts'));
    }

    // Método para mostrar un post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Método para crear un post
    public function create()
    {
        return view('posts.create');
    }

    // Método para agregar un post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = auth()->id();
        $post->save();

        return redirect()->route('posts.index');
    }

    // Método para mostrar el formulario de edición de un post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Método para actualizar un post
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.update', $post);
    }


    // Método para eliminar un post
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
