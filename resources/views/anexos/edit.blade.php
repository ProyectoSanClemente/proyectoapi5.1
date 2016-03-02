@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('anexoedit')!!}
    @include('common.errors')

    {!! Form::model($anexo, ['route' => ['anexos.update', $anexo->id], 'method' => 'patch','files'=> true]) !!}

        @include('anexos.fields')

    {!! Form::close() !!}
</div>
@endsection
