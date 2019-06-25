<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Benfeitoria') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <!-- Componente Navbar -->
        <navbar logo="img/benfeitoria-white.png" url="{{ url('/') }}">

          <li class="nav-item">
              <a class="nav-link" href="#">Projetos</a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="#">Saiba mais</a>
          </li>

          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Fazer login</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/admin">Dashboad</a>
                      <a class="dropdown-item" href="{{route('artigos.index')}}">Artigo</a>
                      <a class="dropdown-item" href="{{route('autores.index')}}">Autores</a>
                      <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Sair
                      </a>


                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contato
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Chat Online</a>
              <a class="dropdown-item" href="#">WhatsApp</a>
              <a class="dropdown-item" href="#">Ticketd</a>
            </div>
          </li>

        </navbar>




        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>
</html>
