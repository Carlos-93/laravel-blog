<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController
{

    // Método para mostrar todos los comentarios
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    // Método para mostrar los comentarios del usuario
    public function myComments()
    {
        $comments = Comment::where('author_id', auth()->id())->get();
        return view('comments.my-comments', compact('comments'));
    }

    // Método para mostrar un comentario
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    // Método para crear un comentario
    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    // Método para agregar un comentario a un post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->author_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->route('posts.show', $request->post_id);
    }

    // Método para mostrar el formulario de edición de un comentario
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Método para actualizar un comentario
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('comments.show', $comment);
    }

    // Método para eliminar un comentario
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $comment->post_id);
    }
}
