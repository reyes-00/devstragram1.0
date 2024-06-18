<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @stack('css')
  <title>DevsTagram - @yield('titulo')</title>
</head>
<body class="bg-gray-100">
  <header class="p-5 border-b bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h3 class="text-3xl font-black">
        Devstagram
      </h3>
      <div>
        <input type="text" name="buscador" id="buscador" class="border p-2 rounded" placeholder="Buscar">
      </div>
      <nav class="flex gap-3 items-center">
        @auth
          <a href="{{ route('post.index',auth()->user()->username) }}" class="text-sm uppercase font-bold flex gap-2  p-2">Hola: {{ auth()->user()->username }}</a>
          <a href="{{ route('post.create',auth()->user()->username) }}" class="text-sm uppercase font-bold flex gap-2 border p-2 hover:bg-gray-100">
            <img src="{{ asset('images/camara-fotografica.png') }}" width="20px" alt="crear">
              Publicar
          </a>
          <a href="{{ route('logout') }}" class="text-sm uppercase font-bold ">Cerrar Sesión</a>         
        @endauth

        @guest
          <a href="{{ route('login') }}" class="text-sm uppercase font-bold ">Login</a>
          <a href="{{ route('resgister') }}" class="text-sm uppercase font-bold ">Crear cuenta</a>
        @endguest
        
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

  @stack('scripts')

  <script>
    
    const buscador = document.querySelector('#buscador');
    buscador.addEventListener('keyup', function(e) {
        const busqueda = e.target.value;
        const url = "/buscador";
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        const consultarApi = async (busqueda) => {
            try {
                const respuesta = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ busqueda: busqueda })
                });
                if (!respuesta.ok) {
                    throw new Error('Error al enviar los datos al backend');
                }
                const resultado = await respuesta.json();
                console.log(resultado);
            } catch (error) {
                console.error(error);
            }
        };

        consultarApi(busqueda);
    });
  </script>
</body>
</html>