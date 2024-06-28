@extends('layouts.plantilla')
@section('titulo')
  Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
      <div class="md:w-1/2 bg-white  p-6">
        <form class="p-10 rounded-lg" action="{{ route('perfil.update',$user) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="mb-5">
          <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">
            Username
          </label>
          <input type="text" name="username" id="username" class="p-2 w-full border rounded-lg" placeholder="Tu username" value="{{ $user->username }}">

          @error('username')
            <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="imagen" class="mb-2 uppercase block text-gray-500 font-bold">
            Imagen
          </label>
          <input type="file" name="imagen" id="imagen" class="p-2 w-full border rounded-lg" accept=".png, .jpg, .jpeg" >

        </div>
        <div class="mb-5">
          <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
            Correo
          </label>
          <input type="email" name="email" id="email" class="p-2 w-full border rounded-lg" value="{{ $user->email }}" >
          @error('email')
            <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
            Password
          </label>
          <input type="password" name="password" id="password" class="p-2 w-full border rounded-lg" >
          @error('password')
            <span class="invalid-feedback" role="alert">
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            </span>
          @enderror
        </div>
        <div class="mb-5">
          <label for="new_password" class="mb-2 uppercase block text-gray-500 font-bold">
            Nueva Password
          </label>
          <input type="password" name="new_password" id="new_password" class="p-2 w-full border rounded-lg" >

        </div>
        <input type="submit"  value="Guardar Cambios" class="bg-sky-600 w-full p-2 font-bold uppercase text-white cursor-pointer hover:bg-sky-700 rounded-md">
      </div>
    </div>
@endsection
