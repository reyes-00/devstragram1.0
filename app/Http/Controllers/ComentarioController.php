<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $req)
    {
        $this->validate(request(),[
            'comentario' => 'required|max:155'
        ]);
    }
}
