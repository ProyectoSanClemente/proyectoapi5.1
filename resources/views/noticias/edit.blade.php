@extends('layouts.app')

@section('content')
<div class="container">
	{!! Breadcrumbs::render('noticiasedit') !!}
    @include('common.errors')

    {!! Form::model($notice, ['route' => ['noticias.update', $notice->id], 'method' => 'patch','files'=> 'true']) !!}

        @include('noticias.fields')

    {!! Form::close() !!}
</div>
@endsection
