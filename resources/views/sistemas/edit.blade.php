@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($sistema, ['route' => ['sistemas.update', $sistema->id], 'method' => 'patch','files'=> true]) !!}

        @include('sistemas.fields')

    {!! Form::close() !!}
</div>
@endsection
