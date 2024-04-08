@extends('layouts.plantilla')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Publicación
@endsection

@section('contenido')
<div class="container md:flex gap-10">
  <div class="md:w-1/2 ">
      <form action="{{ route('imagen.store') }}" class="dropzone border-dashed w-full h-96 rounded flex flex-col justify-center items-center"  id="dropzone" enctype="multipart/form-data">
        @csrf
      </form>
  </div>
  <div class="md:w-1/2">
    <div class="bg-white p-4">
      <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-2">
          <label for="titulo" class="block font-bold text-gray-500">Titulo:</label>
          <input type="text" class="border p-2 w-full rounded" placeholder="Agrega un titulo" name="titulo" value="{{ old('titulo') }}">

          <div>
            @error('titulo')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="my-2">
          <label for="descripcion" class="block font-bold text-gray-500">Decripción:</label>
          <textarea class="border w-full p-2 rounded" name="descripcion" placeholder="Agrega una Descripcion">{{ old('titulo') }}</textarea>
          <div>
            @error('descripcion')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="my-2">
          <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">
          @error('imagen')
            <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <input type="submit" value="Enviar" class="bg-sky-500 text-white w-full p-2 rounded font-bold cursor-pointer hover:bg-sky-600">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection


@push('scripts')

@endpush