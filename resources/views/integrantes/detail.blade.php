@extends('integrantes.layouts.app')

@section('content')

<div class="background">
    <h1 class="title">Detalle Integrante {{$girl->int_id}}</h1>
</div>
<p><b>Nombre:</b> {{$girl->int_nombre}}</p>
<p><b>Edad:</b> {{$girl->int_edad}}</p>
<p><b>Identificacion:</b> {{$girl->int_identificacion}}</p>
<p><b>Foto:</b> <img src="{{url("$girl->int_foto")}}"></p>

<p class="return_index">
    <a class="btn btn-info" href="{{url('/integrantes')}}">Regresar al listado</a>
</p>

@endsection