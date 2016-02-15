@extends('layouts.app')

@section('content')
<div class="container">
    @include('common.errors')

    {!! Form::open(['route' => 'posts.store','files'=> true]) !!}

        @include('posts.fields')

    {!! Form::close() !!}
</div>
@endsection
