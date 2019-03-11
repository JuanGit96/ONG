@php
$transactionsActive = "active";

@endphp

@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1><b>Findesin<b></h1>
                <h3>Historico de transacciones</h3>

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de Donador</th>
                        <th scope="col">Donacion</th>
                        <th scope="col">tipo de donacion</th>
                        <th scope="col">Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">{{$transaction->tra_id}}</th>
                            <td>{{$transaction->user->name}}</td>
                            <td>{{$transaction->tra_valor}}</td>
                            <td>{{$transaction->transactionType->ttr_nombre}}</td>
                            <td>{{$transaction->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$transactions->render()}}

            </div>
        </div>
    </div> <!--/ .container -->
@endsection