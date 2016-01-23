@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'impresoras.imprimir','files'=> true]) !!}

    {!! Form::close() !!}
</div>
@endsection
