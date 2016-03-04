@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Breadcrumbs::render('impresoras') !!}
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Impresoras</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('impresoras.create') !!}">Agregar Nuevo</a>
        </div>
        <hr>
        <div class="row">
            @if($impresoras->isEmpty())
                <div class="well text-center">Impresoras no encontradas.</div>
            @else
                @include('impresoras.table')
            @endif
        </div>
    </div>
@endsection
