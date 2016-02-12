@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('sistemascreate')!!}
    @include('common.errors')

    {!! Form::open(['route' => 'sistemas.store','files'=> true]) !!}

        @include('sistemas.fields')

    {!! Form::close() !!}
</div>
@endsection
