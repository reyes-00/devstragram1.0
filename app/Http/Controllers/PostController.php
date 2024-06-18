<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except(['show', 'index']);
    }
    public function index(){
        $comentarios = Comentario::all();
        return view('post.index');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'titulo' =>'required|max:200',
            'descripcion' =>'required|min:3|max:200',
            'imagen' => 'required',

        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'user_id' => auth()->user()->id,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('post.index', auth()->user()->username);


    }

    public function show(User $user, Post $post) {
        $comentarios = Comentario::all();
        return view('post.show',[
          'post' => $post,
          'user' => $user,
          'comentarios' => $comentarios
        ]);
    }

   
}
