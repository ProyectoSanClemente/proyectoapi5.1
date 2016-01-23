@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')
        <h1 class="pull-left">Usuarios</h1>

        <div class="row">
             <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('getldapusers') !!}">  Actualizar Usuarios  LDAP<span class="glyphicon glyphicon-plus"></span></a>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('usuarios.create') !!}">  Añadir Nuevo Usuario<span class="glyphicon glyphicon-plus"></span></a>
        </div>
        <hr>
        <div class="row">
            @if($usuarios->isEmpty())
                <div class="well text-center">Usuarios No Encontrados.</div>
            @else
                @include('usuarios.table')
            @endif
        </div>
    
    </div>
        
@endsection
