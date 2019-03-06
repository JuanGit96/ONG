@extends('integrantes.layouts.app')

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
@forelse($girls as $girl)
    <tbody>
        <tr>
        <th scope="row"> {{$girl->int_id}}</th>
        <td> {{$girl->int_nombre}}</td>
        <td> {{$girl->int_edad}}</td>
        <td> {{$girl->int_identificacion}}</td>
        <td> <img src="{{url("$girl->int_foto")}}"></td>
        <td class="action">
            <form method="POST" action="{{route('integrantes.delete',$girl->int_id)}}">
            {{ csrf_field() }}<!--Protección de ataques laravel(token)-->
            {{ method_field('DELETE') }}
            <a class="btn btn-link" href="{{route("integrantes.index")}}/{{$girl->int_id}}"><span class="oi oi-eye"></span></a>
            <a class="btn btn-link" href="{{route('integrantes.edit', $girl->id)}}"><span class="oi oi-pencil"></span></a>
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
{!! $girls->links() !!}
</div>
@endsection