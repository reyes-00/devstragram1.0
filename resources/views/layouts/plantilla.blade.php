<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>DevsTagram - @yield('titulo')</title>
</head>
<body class="bg-gray-100">
  <header class="p-5 border-b bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h3 class="text-3xl font-black">
        Devstagram
      </h3>
      <nav class="flex gap-3 items-center">
        <a href="" class="text-sm uppercase font-bold ">Login</a>
        <a href="/register" class="text-sm uppercase font-bold ">Crear cuenta</a>
      </nav>
    </div>
  </header>
  <main class="container mx-auto mt-10 ">
    <h2 class="text-center font-black text-3xl mb-10">
      @yield('titulo')
    </h2>
    @yield('contenido')
  </main>

  <footer class="mt-10 text-center p-5 text-gray-500 uppercase font-bold">Devstagram - Todos los  derechos reservados {{ now()->year }}
  </footer>
</body>
</html>