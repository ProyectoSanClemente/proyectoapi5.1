@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($cuenta, ['route' => ['cuentas.update', $cuenta->id], 'method' => 'patch']) !!}

        @include('cuentas.fields_edit')

    {!! Form::close() !!}
</div>
@endsection
