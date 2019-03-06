@extends('integrantes.layouts.app')

@section('content')
<div class="background">
    <h1 class="title">Editar Integrante {{$girl->int_name}}</h1>
</div>

@if($errors->any())<!--Si tenemos algun error-->
<div class="alert alert-danger">
    <h5>Porfavor corrige los errores</h5>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{url('integrantes')}}/{{$girls->int_id}}">
{{ method_field('PUT') }}
{{ csrf_field() }}<!--Protección de ataques laravel(token)-->

    <div class="form-group">
        <label for="int_nombre">Nombre</label>
        <input type="text" class="form-control" id="int_nombre" name="int_nombre" value="{{old('int_nombre',$girl->int_nombre)}}"
               aria-describedby="nameHelp" placeholder="">
    </div>
    <div class="form-group">
        <label for="int_edad">Edad</label>
        <input type="number" class="form-control" id="int_edad" name="int_edad" value="{{old('int_edad',$girl->int_edad)}}"
               aria-describedby="activityHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="int_identificacion">Identificacion</label>
        <input type="text" class="form-control" id="int_identificacion" name="int_identificacion" value="{{old('int_identificacion',$girl->int_identificacion)}}"
               aria-describedby="seoHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="int_foto">Foto</label>
        <input type="text" class="form-control" id="int_foto" name="int_foto" value="{{old('int_foto',$girl->int_foto)}}"
               aria-describedby="imageHelp" placeholder="">
    </div>

    @if (Auth::user())<!--Si el usuario está logueado-->
    <button type="submit" class="btn btn-primary">Actualizar Integrante</button>
    @else
    <div class="alert alert-danger">
        Para actualizar una integrante porfavor inicia sesión...
    </div>         
    <button disabled type="submit" class="btn btn-primary">Actualizar Integrante</button>
    @endif
    <a class="btn btn-info" href="{{url('/integrantes')}}">Regresar al listado</a>
</form>

@endsection