@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'impresoras.store']) !!}

        @include('impresoras.fields')

    {!! Form::close() !!}
</div>
@endsection
