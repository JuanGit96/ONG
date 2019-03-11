@extends('layouts.app2')

@section('content')

<div class="background">
    <h1 class="title">Detalle Integrante {{$integrante->int_id}}</h1>
</div>
<p><b>Nombre:</b> {{$integrante->int_nombre}}</p>
<p><b>Edad:</b> {{$integrante->int_edad}}</p>
<p><b>Identificacion:</b> {{$integrante->int_identificacion}}</p>
<p><b>Foto:</b> <img src="{{Storage::url($integrante->int_foto)}}"></p>

<p class="return_index">
    <a class="btn btn-info" href="{{url('/integrantes')}}">Regresar al listado</a>
</p>

@endsection