<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate(request(),[
            'email' =>'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()
                ->route('post.index',auth()->user()->username);
        }
        else{
            return redirect()->route('login')
            ->with('respuesta', 'Credenciales no validas');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
