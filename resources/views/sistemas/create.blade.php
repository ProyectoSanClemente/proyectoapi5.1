@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'sistemas.store','files'=> true]) !!}

        @include('sistemas.fields')

    {!! Form::close() !!}
</div>
@endsection
