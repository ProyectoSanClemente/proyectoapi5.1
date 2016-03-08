@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('repositorioedit')!!}
    @include('common.errors')

    {!! Form::model($repositorio, ['route' => ['repositorios.update', $repositorio->id], 'method' => 'patch','files'=> true]) !!}

        @include('repositorios.fields')

    {!! Form::close() !!}
</div>
@endsection
