<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Método para establecer que un post pertenece a un autor
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Método para establecer que un post tiene muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
