@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('departamentoedit')!!}
    @include('common.errors')

    {!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'method' => 'patch','files'=> true]) !!}

        @include('departamentos.fields')

    {!! Form::close() !!}
</div>
@endsection
