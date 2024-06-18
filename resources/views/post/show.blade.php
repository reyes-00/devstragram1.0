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
                <div class="my-4">
                    <p>0 <span>Likes</span> </p>
                </div>
                <p class="text-gray-500 font-bold">
                    <a href="{{ route('post.index', $post->usuario->username) }}"> {{ $post->usuario->name }}</a>
                </p>
                <p>{{ $post->descripcion }}</p>
                <p class="text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <div class="md:w-1/2">
            <div class="bg-white p-8 rounded-lg shadow">
                @auth
                    <form action="{{ route('comentario.store', ['post' => $post, 'user' => $user]) }}" method="POST" class="p-8  ">
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
                <div class="p-8">
                    @forelse ($comentarios as $item)
                        <li class="list-none" >{{ $item->comentario }}</li>
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
    @endpush
@endsection
