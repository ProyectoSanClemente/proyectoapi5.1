@extends('layouts.app')

@section('content')

    <div class="container">
        {!! Breadcrumbs::render('impresoras') !!}
        @include('flash::message')
        <h1 class="row pull-left">Impresoras</h1>
        @if(Auth::user()->rol=='admin')
            <div class="row">            
                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('impresoras.create') !!}">Agregar Nuevo</a>
            </div>
            <hr>
            <div class="row">
                @if($impresorasasignadas->isEmpty())
                    <div class="well text-center">Impresoras no encontradas.</div>
                @else
                    @include('impresoras_departamento.table')                
                @endif
            </div>
        @endif
        
        <div class="row col-md-12">
            <!-- Listado impresoras asignadas Impresora Field -->
            {!! Form::open(['url' => ['https://10.128.2.16/impresora/entrada.php'],'method' => 'post','name'=>'form1','id'=>'form1']) !!}
            @include('impresoras_departamento.imprimiendo')
            {!! Form::close() !!}
        </div>
        
    </div>
@endsection
