@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<body onload="document.form1.submit()">
		<!-- Modelo Impresora Field -->
    {!! Form::open(['url' => ['http://reset.sanclemente.cl/sistemas/orden/index.php'],'method' => 'post','name'=>"form1"]) !!}
		<br><br><br><br><br><br>
		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
		{!!Form::hidden('kt_login_user',$user)!!}
    {!! Form::close() !!}
</div>
@endsection