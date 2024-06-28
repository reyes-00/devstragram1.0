<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
       
        return view('auth.register');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' =>'required|string|max:255',
            'username' =>'required|string|max:100|unique:users',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

       User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => $request->password
       ]);
       

        return redirect()->route('login');
    }
}
