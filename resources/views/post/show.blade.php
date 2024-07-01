@extends('layouts.plantilla')

@push('css')
    <link href="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css" rel="stylesheet">
@endpush

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="md:flex gap-8">
        <div class="md:w-1/2">
            <img src="{{ asset('storage/galeria') . '/' . $post->imagen }}" class="w-full object-cover" alt="{{ $post->titulo }}">
            <div class="my-8 p-4">
                <div class="flex items-center gap-1">
                        @auth
                            <livewire:like-post :post="$post"
                            />
                        @endauth
                      
                    </div>
               
                <p class="text-gray-500 font-bold">
                    <a href="{{ route('post.index', $post->usuario->username) }}"> {{ $post->usuario->username }}</a>
                </p>
                <p>{{ $post->descripcion }}</p>
                <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                @auth
                    @if (auth()->user()->id == $post->usuario->id)
                        <div class="bg-red-500 inline-block p-2 text-white mt-10">    
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Eliminar" class=" cursor-pointer"> 
                            </form>
                        </div>
                    @endif
                @endauth
                
                   
            </div>
        </div>
        <div class="md:w-1/2">

            <div class="bg-white p-8 rounded-lg shadow">

                @auth
                    @if (session('message'))
                        <div class="bg-green-500 text-white font-bold p-2 text-center alerta">
                            {{ session('message') }}
                        </div>
                    @endif
                <form action="{{ route('comentario.store', ['user' => auth()->user()->id, 'post' => $post]) }}" method="POST" class="p-8  ">
                        @csrf
                        <div class="my-4">
                            <label for="comentario" class="block text-gray-500 font-bold text-xl">Comentario:</label>
                            <textarea type="text" placeholder="Agrega un comentario" name="comentario" id='content' class="border p-2 w-full rounded"></textarea>
                            <div>
                                @error('comentario')
                                    <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="my-4">
                            <input type="submit" class="border bg-sky-500 w-full text-white p-2 rounded hover:bg-sky-600 cursor-pointer" value="Enviar">
                        </div>
                    </form>
                @endauth
                <div class="bg-white shadow  mb-5  max-h-96 mt-10 overflow-y-scroll">
                    @forelse ($post->comentarios as $comentario)
                        <div class="border-b border-gray-300 p-5">
                           <p class="px-2 my-2 font-bold"> 
                            <a href="{{ route('post.index', $comentario->usuario) }}">{{ $comentario->usuario->username }} </a> 
                            </p> 
                           <p class="px-2"> {{ $comentario->comentario }} </p> 
                           <p class="px-2 text-gray-500"> {{ $comentario->created_at->diffForHumans() }} </p> 
                        </div>
                    @empty
                        <li>Aun no hay comentarios</li>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.js"></script>
        <script>
            $("#content").emojioneArea({
                pickerPosition: "bottom"
            });
        </script>

        <script>
            const alerta = document.querySelector('.alerta');

            if(alerta){
                setTimeout(() => {
                    alerta.remove();
                }, 2000);
            }
        </script>
    @endpush
@endsection
