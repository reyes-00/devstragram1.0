<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store( User $user){
        $user->followers()->attach(auth()->user()->id); /*attach: Se usa para agregar los ids de la misma tabla   */
        return back();
    }

    public function destroy( User $user){
        $user->followers()->detach(auth()->user()->id); /*attach: Se usa para agregar los ids de la misma tabla   */
        return back();
    }
}
