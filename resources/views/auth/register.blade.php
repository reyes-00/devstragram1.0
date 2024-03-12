@extends('layouts.plantilla')
@section('titulo')
    Registrar 
@endsection

@section('contenido')
    <div class="md:flex md:justify-center gap-10" >
      <div class="md:w-4/12 flex justify-center items-center">
        <p><img src="{{ asset('images/registrar.jpg') }}" alt=""></p>
      </div>
      <div class="md:w-4/12">
        <form action="{{ route('register.store') }}" class="bg-white p-10 rounded-lg shadow" method="POST">
            @csrf
          <div class="mb-5">
            <label for="name" class="mb-2 uppercase block text-gray-500 font-bold">
              Nombre
            </label>
            <input type="text" name="name" id="name" class="p-2 w-full border rounded-lg" placeholder="Tu nombre" value="{{ old('name') }}">

            @error('name')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="username" class="mb-2 uppercase block text-gray-500 font-bold">
              Username
            </label>
            <input type="text" name="username" id="username" class="p-2 w-full border rounded-lg" placeholder="Tu username" value="{{ old('username') }}">
            
            @error('username')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="email" class="mb-2 uppercase block text-gray-500 font-bold">
              Email
            </label>
            <input type="email" name="email" id="email" class="p-2 w-full border rounded-lg" placeholder="Tu email" value="{{ old('email') }}">
            
            @error('email')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
              Password
            </label>
            <input type="password" name="password" id="password" class="p-2 w-full border rounded-lg" placeholder="Tu password">

            @error('password')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="password_confirmation" class="mb-2 uppercase block text-gray-500 font-bold">
              Repetir Password
            </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="p-2 w-full border rounded-lg" placeholder="Repite tu password">

            @error('password')
              <p class="p-2 bg-red-500 text-white font-bold rounded">{{ $message }}</p>
            @enderror
          </div>
          <input type="submit"  value="Crear cuenta" class="bg-sky-600 w-full p-2 font-bold uppercase text-white cursor-pointer hover:bg-sky-700 rounded-md">
        </form>
      </div>
    </div>
@endsection
