@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'cuentas.store']) !!}

        @include('cuentas.fields')

    {!! Form::close() !!}
</div>
@endsection
