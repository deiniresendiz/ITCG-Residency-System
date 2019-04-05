<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Egresados</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

<div class="row">
    <div class="col-12">
        <div class="container-fluid">
            <nav class="navbar navbar-light fixed-top bg-white flex-md-nowrap p-0 shadow" aria-label="breadcrumb">
                <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-dark nav-item " href="#" >
                    <img src="{{ asset('img/logo.png') }}" width="30" height="30"/> ITCG
                </a>
                    <ol class="breadcrumb bg-white mb-0 mt-0 p-0 nav-item ">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        @yield("breadcrumb")
                    </ol>
                <span class="text-dark mr-5"> {{ Auth::user()->name }}</span>
            </nav>
        </div>
    </div>
    <div class="col-lg-2 navbar-light sidebar sidebarsticky bg-white">
        <nav class="navbar navbar-expand-lg  flex-lg-column text-left mt-3">
            <button class="navbar-toggler mt-5" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-lg-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home">
                                <a href="{{ Route('home') }}" class="nav-link ">
                                    <i class="fas fa-home"></i> Inicio
                                </a>
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('account.index') }}">
                            <i class="fas fa-user-circle"></i> Mis Datos
                        </a>
                    </li>
                    @if(Auth::user()->isAdmin == 1)
                        <li class="nav-item">

                            <a href="{{ Route('egresados.index') }}" class="nav-link">
                                <i class="fas fa-user-graduate"></i> Egresados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('empresas.index') }}" class="nav-link">
                                <i class="fas fa-building"></i> Empresas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('trabajos.index') }}" class="nav-link">
                                <i class="fas fa-briefcase"></i> Trabajos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('cursos.index') }}" class="nav-link">
                                <i class="fas fa-chalkboard-teacher"></i> Cursos/Telleres
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('cursos.index') }}">
                                <i class="fas fa-chalkboard-teacher"></i> Cursos/Talleres
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('trabajos.index') }}">
                                <i class="fas fa-briefcase"></i> Bolsa de Trabajos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('estudios.index') }}">
                                <i class="fas fa-university"></i> Mis Estudios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ Route('ocupaciones.index') }}">
                                <i class="fas fa-building"></i> Mis Trabajos
                            </a>
                        </li>
                    @endif

                @if(Auth::user()->isRoot == 1)
                        <br>
                        <li class="nav-item">
                            <span class=" h6">
                                <i class="fas fa-tools"></i> Area Administrativa
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('admin.index') }}" class="nav-link">
                                <i class="fas fa-users-cog"></i> Administradores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('carreras.index') }}" class="nav-link ">
                                    <i class="fas fa-university"></i> Carreras
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ Route('adminegresado.index') }}">
                                <i class="fas fa-user-graduate"></i> Egresados
                            </a>
                        </li>

                    @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar Session <i class="fas fa-sign-out-alt"></i>

                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

            </div>
        </nav>
    </div>
    <div class="col-md-10 mt-3 py-2">
        @yield('content')

    </div>
</div>

{!! Html::script('js/jquery.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@yield('script')

@if(!Auth::check())
    <script>window.location = "/login";</script>
@endif
</body>
</html>
