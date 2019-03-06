@extends('integrantes.layouts.app')

@section('content')

<div class="background">
    <h1 class="title">Crear nueva Integrante</h1>
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
<form method="POST" action="{{url('crearIntegrante')}}">
{{ csrf_field() }}<!--Protección de ataques laravel(token)-->
    <div class="form-group">
        <label for="n_nombre">Nombre</label>
        <input type="text" class="form-control" id="n_nombre" name="n_nombre" value="{{old('n_nombre')}}"
        aria-describedby="nameHelp" placeholder="">
    </div>
    <div class="form-group">
        <label for="n_edad">Edad</label>
        <input type="number" class="form-control" id="n_edad" name="n_edad" value="{{old('n_edad')}}"
        aria-describedby="activityHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="int_identificacion">Identificacion</label>
        <input type="text" class="form-control" id="int_identificacion" name="int_identificacion" value="{{old('int_identificacion')}}"
        aria-describedby="seoHelp" placeholder="">
    </div> 

    <div class="form-group">
        <label for="int_foto">Foto</label>
        <input type="text" class="form-control" id="int_foto" name="int_foto" value="{{old('int_foto')}}"
        aria-describedby="imageHelp" placeholder="url http://...">
    </div>

    @if (Auth::user())<!--Si el usuario está logueado-->
    <button type="submit" class="btn btn-primary">Crear Integrante</button>
    @else
    <div class="alert alert-danger">
        Para crear una nueva integrante porfavor inicia sesión...
    </div>      
    <button disabled type="submit" class="btn btn-primary">Crear Integrante</button>
    @endif
    <a class="btn btn-info" href="{{url('/crud_galery')}}">Regresar al listado</a>
</form>

@endsection