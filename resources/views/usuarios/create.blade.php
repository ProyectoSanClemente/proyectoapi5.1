@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('usuarioscreate') !!}
    @include('common.errors')

    {!! Form::open(['route' => 'usuarios.store','files'=> true]) !!}

        @include('usuarios.fields_create')

    {!! Form::close() !!}
</div>
@endsection
