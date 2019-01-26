<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top justify-content-between" style="background-color: #e3f2fd;height:9%;">
    <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">Dashboard</a>
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sessión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>


<ul id="menuVertical" class="bg-dark navbar-nav  navbar-dark mr-auto">
    @if(Auth::user()->isAdmin == 1)
        <li class="list-group-item bg-primary  text-white font-weight-bold">
            <span data-toggle="collapse" data-target="#egresados">
                 Egresados
            </span>

            <div id="egresados" class="collapse">
                <a href="{{ Route('egresados.index') }}" class="nav-link text-white font-weight-light ">Todos</a>
                <a href="{{ Route('egresados.create') }}" class="nav-link text-white font-weight-light ">Nuevo</a>
            </div>
        </li>
        <li class="list-group-item bg-primary text-white font-weight-bold">
            <span data-toggle="collapse" data-target="#empresas">
                 Empresas
            </span>

            <div id="empresas" class="collapse">
                <a href="{{ Route('empresas.index') }}" class="nav-link text-white font-weight-light ">Todos</a>
                <a href="{{ Route('empresas.create') }}" class="nav-link text-white font-weight-light ">Nuevo</a>
            </div>
        </li>
        <li class="list-group-item bg-primary text-white font-weight-bold">
            <span data-toggle="collapse" data-target="#trabajos">
                 Trabajos
            </span>

            <div id="trabajos" class="collapse">
                <a href="{{ Route('trabajos.index') }}" class="nav-link text-white font-weight-light ">Todos</a>
                <a href="{{ Route('trabajos.create') }}" class="nav-link text-white font-weight-light ">Nuevo</a>
            </div>
        </li>
        <li class="list-group-item bg-primary text-white font-weight-bold">
            <span data-toggle="collapse" data-target="#cursos">
                 Cursos/Telleres
            </span>

            <div id="cursos" class="collapse">
                <a href="{{ Route('cursos.index') }}" class="nav-link text-white font-weight-light ">Todos</a>
                <a href="{{ Route('cursos.create') }}" class="nav-link text-white font-weight-light ">Nuevo</a>
            </div>
        </li>
    @else
        <div class="list-group-item bg-primary text-white font-weight-bold">
            <a href="{{ Route('cursos.index') }}" class="nav-link text-white font-weight-light ">Cursos</a>
        </div>
        <div class="list-group-item bg-primary text-white font-weight-bold">
            <a href="{{ Route('trabajos.index') }}" class="nav-link text-white font-weight-light ">Trabajos</a>
        </div>
    @endif

</ul>
<div style="margin-left:15%;padding:1px 1em;height:90%; margin-top: 4%; " class="jumbotron jumbotron-fluid">

    @yield('content')


</div>

{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/dropdown.js') !!}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@yield('script')
</body>
</html>
