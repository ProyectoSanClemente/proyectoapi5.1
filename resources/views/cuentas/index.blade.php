@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Cuentas</h1>
        </div>
        <hr>
        <div class="row">
            @if($cuentas->isEmpty())
                <div class="well text-center">Cuentas no encontradas.</div>
            @else
                @include('cuentas.table')
            @endif
        </div>


    </div>
@endsection
