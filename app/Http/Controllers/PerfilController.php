<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $this->authorize('view',$user);
      
        return view('perfil.edit',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user){
      
       $this->validate($request,[
        'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'not_in:edit,edit/reyes','min:3', 'max:20'],
        'email' => ['required', 'email', 'unique:users,email,'.auth()->user()->id],
        'password' => 'nullable'
       ]);
      
       if(($request->imagen)){
            $imagen_path = public_path('/storage/perfiles/'.$user->imagen);

            if(file_exists($imagen_path) && $user->imagen != ''){
                unlink($imagen_path);
            }
            $image = $request->file('imagen');
            $nombreImagen = Str::uuid().'.'.$image->extension();
            $image->move(public_path('storage/perfiles'), $nombreImagen);
        }

        /**Validar Password Usuario */
        if(!Hash::check($request->password, auth()->user()->password)){
            return back()->withErrors(['password' => 'La contraseña actual no es correcta']);
        }

        /**Actualizar Usuario */
        $userUpdate = User::find($user->id);
        $userUpdate->username = $request->username;
        $userUpdate->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $userUpdate->email = $request->email;
        $userUpdate->password = Hash::make($request->new_password);
       
        $userUpdate->save();

        return redirect()->route('post.index',$userUpdate->username);
    }
}
