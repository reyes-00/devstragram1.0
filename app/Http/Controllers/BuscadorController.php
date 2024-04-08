<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscadorController extends Controller
{
    public function buscador(Request $request)
    {
        $consultaUsuario = DB::table('users')->where('username', 'like', $request->busqueda.'%');
        
        return response()->json([
            'hola' => 'Buscador'
        ]);
    }
}
 