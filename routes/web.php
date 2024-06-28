
<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login.store');
Route::get('/register',[RegisterController::class, 'index'])->name('resgister');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
Route::get('/logout',[ LoginController::class,'logout'])->name('logout');

Route::get('/{user:username}/muro',[MuroController::class, 'index'])->name('post.index');
Route::post('/imagen',[ImagenController::class, 'store'])->name('imagen.store');

Route::get('/{user:username}/post',[PostController::class, 'index'])->name('post.create');
Route::post('/post',[PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/show/{post:id}',[PostController::class, 'show'])->name('post.show');
Route::delete('/destroy/{post:id}',[PostController::class, 'destroy'])->name('post.destroy');

//Comentarios
Route::post('/comentario/{user}/{post}',[ComentarioController::class, 'store'])->name('comentario.store');
// Likes
Route::post('/{post}/{user}',[LikeController::class, 'store'])->name('likes.store');
Route::delete('/{post}/{user}',[LikeController::class, 'destroy'])->name('likes.destroy');

// Perfil
Route::get('/perfil/edit/{user:username}',[PerfilController::class,'edit'])->name('perfil.edit');
Route::post('/perfil/edit/{user:username}',[PerfilController::class,'update'])->name('perfil.update');

// Buscador
Route::post('/buscador',[BuscadorController::class, 'buscador'])->name('buscador');
