<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas autenticadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'Administrador') {
            return view('dashboard');
        }
        return redirect()->route('posts.index');
    })->name('dashboard');

    // Rutas para los Posts
    Route::get('/posts/my-posts', [PostController::class, 'myPosts'])->name('posts.my-posts');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    // Rutas para los Comentarios
    Route::get('/comments/my-comments', [CommentController::class, 'myComments'])->name('comments.my-comments');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');

    // Rutas para los Usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});
