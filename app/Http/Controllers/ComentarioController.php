<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index (){
      
    }
    public function store(Request $req, $user, $post)
    {
        // dd($post);
        $this->validate(request(),[
            'comentario' => 'required|max:155'
        ]);

        $comentario = new Comentario();
        $comentario->post_id = $post;  
        $comentario->user_id = $user;  
        $comentario->comentario = $req->comentario;  
        $comentario->save();

        return back();
    }
}
