@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('anexocreate')!!}
    @include('common.errors')

    {!! Form::open(['route' => 'repositorios.store','files'=> true]) !!}

        @include('repositorios.fields')

    {!! Form::close() !!}
</div>
@endsection
