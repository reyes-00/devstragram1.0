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
        
        $usuario_posts = Post::where('user_id', $user->id)->paginate(1);

        return view('muro.index',[
            'usuario_posts' => $usuario_posts,
            'user' => $user,
        ]);
    }
}
