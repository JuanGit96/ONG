@extends('layouts.app2')

@section('content')
@if (Auth::user())<!--Si el usuario está logueado-->
@else
<div class="alert alert-danger">
    Para eliminar un registro porfavor inicia sesión...
</div>
@endif

<p>
    <a href="{{ route('integrantes.new') }}" class="btn btn-primary">Nueva Integrate</a>
</p>

<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">edad</th>
        <th scope="col">Identificacion</th>
        <th scope="col">Foto</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
<!--Mostrando usuarios-->
@forelse($integrantes as $integrante)
    <tbody>
        <tr>
        <th scope="row"> {{$integrante->int_id}}</th>
        <td> {{$integrante->int_nombre}}</td>
        <td> {{$integrante->int_edad}}</td>
        <td> {{$integrante->int_identificacion}}</td>
        <td> <img src="{{url("$integrante->int_foto")}}"></td>
        <td class="action">
            <form method="POST" action="{{route('integrantes.delete',$integrante->int_id)}}">
            {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
            {{ method_field('DELETE') }}
            <a class="btn btn-link" href="{{route('integrantes.detail', $integrante->int_id)}}"><span class="oi oi-eye"></span></a>
            <a class="btn btn-link" href="{{route('integrantes.edit', $integrante->int_id)}}"><span class="oi oi-pencil"></span></a>
            @if (Auth::user())<!--Si el usuario está logueado-->
            <button class="btn btn-link" type="submit" name="delete"><span class="oi oi-trash"></span></button>
            @else
            <button disabled class="btn btn-link" type="submit" name="delete"><span class="oi oi-trash"></span></button>
            @endif
            </form>
        </td>
        </tr>
    </tbody>
@empty
    <h3 class="alert alert-danger">Noy Hay registros Aún</h3>
@endforelse
</table>
<div class="center-block">
{!! $integrantes->links() !!}
</div>
@endsection