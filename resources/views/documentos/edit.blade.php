@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
	{!! Breadcrumbs::render('documentoedit')!!}
    {!! Form::model($documento, ['route' => ['documentos.update', $documento->id], 'method' => 'patch','files'=> true]) !!}

        @include('documentos.fields')

    {!! Form::close() !!}
</div>
@endsection
