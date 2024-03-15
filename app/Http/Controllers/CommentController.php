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

    // Método para mostrar un comentario
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    // Método para crear un comentario
    public function create()
    {
        return view('comments.create');
    }

    // Método para agregar un comentario a un post
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->author_id = auth()->id();
        $post->comments()->save($comment);
        return back();
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
        return redirect()->route('comments.index');
    }
}
