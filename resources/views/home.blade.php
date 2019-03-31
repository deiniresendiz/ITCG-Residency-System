@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
       <div class="row pt-2">
           <div class="col-12 col-md-6">
               <p class="lead m-3">Cursos/Talleres</p>
               @foreach($cursos as $curso)
                   <div class="card text-center m-3">
                       @if($curso->imagen)
                           <img src="{{ $curso->imagen }}" class="img-fluid card-img-top " alt="...">
                       @endif
                       <div class="card-body">
                           <h5 class="card-title">{{ $curso->nombre }}</h5>
                           <p class="card-text">{{ substr($curso->descripcion,0,100) }}...</p>
                           <a href="{{ route('cursos.show',$curso) }}" class="btn btn-danger">Mas Informacion</a>

                       </div>
                   </div>
               @endforeach
           </div>
           <div class="col-12 col-md-6">
               <p class="lead m-3">Ofertas de empleo</p>
               @foreach($trabajos as $trabajo)
                   <div class="card text-center m-3">
                       @if($trabajo->imagen)
                           <img src="{{ $trabajo->imagen }}" class="img-fluid card-img-top " alt="...">
                       @endif
                       <div class="card-body">
                           <h5 class="card-title">{{ $trabajo->puesto }}</h5>
                           <p class="card-text">{{ substr($trabajo->descripcion,0,100) }}...</p>
                           <a href="{{ route('trabajos.show',$trabajo) }}" class="btn btn-danger">Mas Informacion</a>

                       </div>
                   </div>
               @endforeach
           </div>
       </div>
    </div>
@endsection

