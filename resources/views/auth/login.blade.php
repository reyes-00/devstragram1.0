@extends('layouts.plantilla')
@section('titulo')
    Login 
@endsection

@section('contenido')
    <div class="md:flex md:justify-center gap-10" >
      <div class="md:w-4/12 flex justify-center items-center">
        <p><img src="{{ asset('images/registrar.jpg') }}" alt=""></p>
      </div>
      <div class="md:w-4/12">
       
        <form action="{{ route('login.store') }}" class="bg-white p-10 rounded-lg shadow" method="POST">
            @csrf
          
          @if (session('respuesta'))
            <div class="p-2 border bg-red-500 text-white font-bold rounded my-2">
              {{ session('respuesta')}}
            </div>  
          @endif

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
         
          <input type="submit"  value="Iniciar Sesión" class="bg-sky-600 w-full p-2 font-bold uppercase text-white cursor-pointer hover:bg-sky-700 rounded-md">
        </form>
      </div>
    </div>
@endsection
