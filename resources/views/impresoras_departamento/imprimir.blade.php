@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

		<!-- Modelo Impresora Field -->
    {!! Form::open(['url' => ['https://10.128.2.16/impresora/entrada.php'],'method' => 'post','name'=>'form1','id'=>'form1']) !!}
	@include('impresoras_departamento.imprimiendo')
    {!! Form::close() !!}
</div>
@endsection
