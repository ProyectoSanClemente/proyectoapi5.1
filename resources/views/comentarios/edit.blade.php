@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')

    {!! Form::model($sistema, ['route' => ['posts.update', $sistema->id], 'method' => 'patch','files'=> true]) !!}

        @include('posts.fields')

    {!! Form::close() !!}
</div>
@endsection
