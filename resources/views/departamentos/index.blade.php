@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('departamentos')!!}
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Departamentos</h1>
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('departamentos.create') !!}">Agregar Nuevo</a>
        </div>
        <hr>
        <div class="row">
            @if($departamentos->isEmpty())
                <div class="well text-center">Departamentos no encontrados.</div>
            @else
                    @include('departamentos.table')
                    <hr>
            @endif
        </div>
    </div>
@endsection
