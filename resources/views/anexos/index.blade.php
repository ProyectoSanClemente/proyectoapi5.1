@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('anexo')!!}
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Anexo</h1>
            @if(Auth::user()->rol=='admin')
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('anexos.create') !!}">Agregar Nuevo</a>
            @endif
        </div>
        <hr>
        <div class="row">
            @if($anexos->isEmpty())
                <div class="well text-center">anexo no encontrados.</div>
            @else
                    @include('anexos.table')
                    <hr>
            @endif
        </div>
    </div>
@endsection
