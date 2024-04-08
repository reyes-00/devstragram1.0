@extends('layouts.plantilla')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="md:flex gap-8">
      <div class="md:w-1/2">
        <img src="{{ asset('storage/galeria') .'/' . $post->imagen }}" class="w-full object-cover" alt="{{ $post->titulo }}">
        <div class="my-8 p-4">
          <p>0 <span>Likes</span> </p>
          <p>{{ $post->descripcion }}</p>
        </div>
      </div>
      <div class="md:w-1/2">
        <form action="{{ route('comentario.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow">
          @csrf
          <div class="my-4">
            <label for="comentario" class="block text-gray-500 font-bold text-xl">Comentario:</label>
            <input type="text" placeholder="Agrega un comentario" class="border p-2 w-full rounded">
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
      </div>
    </div>
@endsection