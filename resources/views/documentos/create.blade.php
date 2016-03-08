@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('anexocreate')!!}
    @include('common.errors')

    {!! Form::open(['route' => 'documentos.store','files'=> true]) !!}

        @include('documentos.fields')

    {!! Form::close() !!}
</div>
@endsection
