@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')
	{!! Breadcrumbs::render('documentocreate')!!}
    {!! Form::open(['route' => 'documentos.store','files'=> true]) !!}

        @include('documentos.fields')

    {!! Form::close() !!}
</div>
@endsection
