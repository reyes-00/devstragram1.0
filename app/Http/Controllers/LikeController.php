<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($post, $user){
        Like::create([
            'user_id' => $user,
            'post_id' => $post,
        ]);

        return back();
    }

    public function destroy($post, User $user){
       $user->likes()->where('user_id', $user->id)->delete();
       return back();
    }
}
