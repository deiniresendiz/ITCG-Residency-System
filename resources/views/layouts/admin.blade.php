<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-light fixed-top bg-danger flex-md-nowrap p-0 shadow  ">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-white" href="#">
        <i class="fas fa-university"></i> ITCG
    </a>
    <span class="text-white ml-auto"> {{ Auth::user()->name }}</span>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sessión') }}
                <i class="fas fa-sign-out-alt"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row ">
        <nav class="col-md-2 col-sm-2 d-none d-md-block bg-light sidebar ">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
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
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#egresados">
                                <i class="fas fa-user-graduate"></i> Egresados
                            </span>
                        </span>
                            <div id="egresados" class="collapse">
                                <a href="{{ Route('egresados.index') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('egresados.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#empresas">
                                <i class="fas fa-building"></i> Empresas
                            </span>
                        </span>
                            <div id="empresas" class="collapse">
                                <a href="{{ Route('empresas.index') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('empresas.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#trabajos">
                                <i class="fas fa-briefcase"></i> Trabajos
                            </span>
                        </span>
                            <div id="trabajos" class="collapse">
                                <a href="{{ Route('trabajos.index') }}" class="nav-link  font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('trabajos.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#cursos">
                                <i class="fas fa-chalkboard-teacher"></i> Cursos/Telleres
                            </span>
                        </span>
                            <div id="cursos" class="collapse">
                                <a href="{{ Route('cursos.index') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('cursos.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
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
                    @endif
                </ul>
                @if(Auth::user()->isRoot == 1)
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>
                            <i class="fas fa-tools"></i> Area Administrativa
                        </span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#administradoresAdmi">
                                <i class="fas fa-users-cog"></i> Administradores
                            </span>
                        </span>
                            <div id="administradoresAdmi" class="collapse">
                                <a href="{{ Route('admin.index') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('admin.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
                        </li>
                        <li class="nav-item">
                        <span class="nav-link" href="#">
                            <span data-toggle="collapse" data-target="#carrerasAdm">
                                <i class="fas fa-university"></i> Carreras
                            </span>
                        </span>
                            <div id="carrerasAdm" class="collapse">
                                <a href="{{ Route('carreras.index') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Todos</a>
                                <a href="{{ Route('carreras.create') }}" class="nav-link font-weight-light "><i class="fas fa-angle-right"></i>Nuevo</a>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                </div>
            </div>-->

            <div class="container">
                @yield('content')

            </div>
        </main>
    </div>
</div>




{!! Html::script('js/jquery.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

{!! Html::script('js/dropdown.js') !!}



@yield('script')
</body>
</html>
