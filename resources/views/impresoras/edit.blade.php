@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($impresora, ['route' => ['impresoras.update', $impresora->id], 'method' => 'patch']) !!}

        @include('impresoras.fields_edit')

    {!! Form::close() !!}
</div>
@endsection
