@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'noticias.store','files'=> true]) !!}
    
        @include('noticias.fields')

    {!! Form::close() !!}
</div>
@endsection
