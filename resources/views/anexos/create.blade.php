@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('anexocreate')!!}
    @include('common.errors')

    {!! Form::open(['route' => 'anexos.store','files'=> true]) !!}

        @include('anexos.fields')

    {!! Form::close() !!}
</div>
@endsection
