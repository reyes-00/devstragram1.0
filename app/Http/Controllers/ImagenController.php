<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ImagenController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function store(Request $request)
    {
      
        $archivo = $request->file('imagen');
     
        $nombre_final = date('Ymd_His_').$archivo->getClientOriginalName();
        
        \Storage::disk('local')->put('galeria/' . $nombre_final, \File::get($archivo));

        return response()->json([
         'success' => true,
            'nombre_final' => $nombre_final
        ]);

    }
}
