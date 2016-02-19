@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('sistemas')!!}
        @include('flash::message')
        <div class="row">
            <h1 class="pull-left">Sistemas</h1>
            @if(Auth::user()->rol=='admin')
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('sistemas.create') !!}">Agregar Nuevo</a>
            @endif
        </div>
        <hr>
        <div class="row">
            @if($sistemas->isEmpty())
                <div class="well text-center">Sistemas no encontrados.</div>
            @else
                @if(Auth::user()->rol=='admin')
                    @include('sistemas.table')
                    <hr>
                @endif
                @include('sistemas.index_user')
            @endif
        </div>
    </div>
@endsection
