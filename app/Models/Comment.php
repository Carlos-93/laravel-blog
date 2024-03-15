<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Método para establecer que un comentario pertenece a un autor
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Método para establecer que un comentario pertenece a un post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
