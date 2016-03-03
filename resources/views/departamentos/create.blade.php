@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('departamentocreate')!!}
    @include('common.errors')

    {!! Form::open(['route' => 'departamentos.store','files'=> true]) !!}

        @include('departamentos.fields')

    {!! Form::close() !!}
</div>
@endsection
