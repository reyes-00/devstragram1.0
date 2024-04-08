@extends('layouts.plantilla')
@section('titulo')
    @if (auth()->user()->username == $usuario->username)
        Tu muro {{ $usuario->username }}
    @else
        Muro de {{ $usuario->username }}
    @endif
@endsection

@section('contenido')
  <div class="container">
    <div class="md:flex gap-10 justify-center items-center">
        <div>
            <img src="{{ asset('images/user.png') }}" class="rounded-full w-96 h-96 block mx-auto" alt="sin foto">
        </div>
        <div class="flex flex-col justify-center items-center my-8">
            <div>
                <p>Publicaciones: <span class="font-bold">0</span></p>
                <p>Seguidores: <span class="font-bold">0</span></p>
                <p>Seguidos: <span class="font-bold">0</span></p>
            </div>
        </div>
    </div>

  
    @if (count($usuario->posts) > 0)   
        <section class="grid grid-cols-4 gap-8 my-10">
            @foreach ($usuario->posts as $post)
                <div class="shadow-lg">
                <a href="{{ route('post.show',['user'=> $usuario, 'post' => $post]) }}">
                    <img src="{{ asset('storage/galeria').'/'.$post->imagen }}" alt="imagen">
                </a>
                </div>
            @endforeach
        </section>
    @else
        <div class="text-center text-2xl font-bold my-10">
            <p>No has publicado ninguna publicación</p>
        </div>
    @endif
        
 
    
  </div>
@endsection
