@extends('layouts.plantilla')
@section('titulo')
    Registrar
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
      <div class="md:w-4/12">
        <p>Imagen aqui</p>
      </div>
      <div class="md:w-4/12">
        <form action="">
          <div class="mb-5">
            <label for="name" class="mb-2 uppercase block text-gray-500 font-bold">
              Nombre
            </label>
            <input type="text" name="name" id="name" class="p-2 w-full border rounded-lg" placeholder="Tu nombre">
          </div>
          <div class="mb-5">
            <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">
              Username
            </label>
            <input type="text" name="username" id="username" class="p-2 w-full border rounded-lg" placeholder="Tu username">
          </div>
          <div class="mb-5">
            <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
              email
            </label>
            <input type="email" name="email" id="email" class="p-2 w-full border rounded-lg" placeholder="Tu email">
          </div>
          <div class="mb-5">
            <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
              Password
            </label>
            <input type="password" name="password" id="password" class="p-2 w-full border rounded-lg" placeholder="Tu password">
          </div>
          <div class="mb-5">
            <label for="password_confirmation" class="mb-2 uppercase block text-gray-500 font-bold">
              Repetir Password
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="p-2 w-full border rounded-lg" placeholder="Repite tu password">
          </div>
          <input type="submit"  value="Crear cuenta" class="bg-sky-600 w-full p-2 font-bold uppercase text-white cursor-pointer hover:bg-sky-700 rounded-md">
        </form>
      </div>
    </div>
@endsection