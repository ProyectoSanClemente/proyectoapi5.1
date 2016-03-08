@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('repositorios')!!}
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Repositorios</h1>
            @if(Auth::user()->rol=='admin')
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('repositorios.create') !!}">Agregar Nuevo</a>
            @endif
        </div>
        <hr>
        <div class="row">
            @if($repositorios->isEmpty())
                <div class="well text-center">Repositorios no Encontrados.</div>
            @else
                    @include('repositorios.table')
                    <hr>
            @endif
        </div>
    </div>
@endsection
