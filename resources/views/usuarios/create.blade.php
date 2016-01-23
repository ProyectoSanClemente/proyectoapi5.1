@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'usuarios.store','files'=> true]) !!}

        @include('usuarios.fields_create')

    {!! Form::close() !!}
</div>
@endsection
