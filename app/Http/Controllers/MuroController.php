<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MuroController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(User $user){
        $usuario = User::where('id', $user->id)->first();
        
        $publicaciones = Post::where('user_id',auth()->user()->id)->get();
       
        return view('muro.index',[
            'usuario' => $usuario,
            'publicaciones' => $publicaciones
        ]);
    }
}
