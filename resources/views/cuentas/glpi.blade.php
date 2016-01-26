@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

		<!-- Modelo Impresora Field -->
    {!! Form::open(['url' => ['https://10.128.2.16/glpi/front/login.php'],'method' => 'post']) !!}
	@include('cuentas.includeglpi')
    {!! Form::close() !!}
</div>
@endsection
