@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($impresora, ['route' => ['impresoras.update', $impresora->id], 'method' => 'patch']) !!}
        @include('impresoras.fields')

    {!! Form::close() !!}
</div>
@endsection
