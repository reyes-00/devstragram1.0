@extends('layouts.plantilla')
@section('titulo')
    @if (auth()->user()->username == $user->username)
        Tu muro {{ $user->username }}
    @else
        Muro de {{ $user->username }}
    @endif
@endsection

@section('contenido')
  
    <div class="container">
        <div class="md:flex gap-10 justify-center items-center">
            <div>
                <img src="{{ asset('images/user.png') }}" class="rounded-full w-96 h-96 block mx-auto" alt="sin foto">
            </div>
            <div class="flex flex-col justify-center items-center my-8">
                <div class="flex gap-2 items-center">
                    <p class="font-bold text-2xl text-gray-500">{{ $user->username }} </p> 
                    @auth
                        @if (auth()->user()->id == $user->id)
                            <div class="hover:text-gray-400 cursor-pointer">
                                <a href="{{ route('perfil.edit',$user) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                
                            </div>
                        @endif
                    @endauth
                   
                </div>
                <div class="p-4">
                    <p>Publicaciones: <span class="font-bold">{{ auth()->user()->posts->count() }}</span></p>
                    <p>@choice('Seguidor | Seguidores ', $user->followers->count() )<span class="font-bold">{{$user->followers->count() }}</span></p>
                    <p>Seguidos: <span class="font-bold">{{ $user->following->count() }}</span></p>
                    @auth
                        @if ($user->id != auth()->user()->id)
                            @if (!$user->siguiendo(auth()->user()->id))
                                <form action="{{ route('follow.store',$user) }}" method="POST">
                                    @csrf
                                    <input type="submit" class="p-2 my-2 cursor-pointer hover:bg-sky-700 uppercase bg-sky-600 text-white font-bold text-xs rounded" value="Seguir">
                                </form>
                            @else
                                <form action="{{ route('follow.destroy',$user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="p-2 my-2 cursor-pointer hover:bg-red-700 uppercase bg-red-600 text-white font-bold text-xs rounded" value="Dejar de Seguir ">
                                </form>
                            @endif
                        @endif
                    @endauth
                    
                </div>
            </div>
        </div>
        <section class="container mx-auto mt-10">
            <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
                @if (count($usuario_posts))
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 my-10">
                        @foreach ($usuario_posts as $post)
                            <div class="shadow-lg">
                                <a href="{{ route('post.show',['user' => $user, 'post' => $post]) }}">
                                    <img src="{{ asset('storage/galeria') . '/' . $post->imagen }}" alt="imagen">
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="my-10">
                        {{ $usuario_posts->links('pagination::tailwind') }}
                    </div>
                @else
                    
                    <div class="text-center text-2xl font-bold my-10">
                        <p>No has publicado ninguna publicación</p>
                    </div>
                @endif

           
            
        </section>

    </div>
@endsection
