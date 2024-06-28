<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index (){
      
    }
    public function store(Request $req, $user, $post)
    {
        $this->validate(request(),[
            'comentario' => 'required|max:155'
        ]);

        $comentario = new Comentario();
        $comentario->user_id = $user;  
        $comentario->post_id = $post;  
        $comentario->comentario = $req->comentario;  
        $comentario->save();

        return back()->with('message', 'Comentario Realizado Correctamente');
    }
}
