@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<!-- Modelo Impresora Field -->
		<body onload="document.form1.submit()">
	    {!! Form::open(['url' => ['http://www.sanclemente.cl:8080/owncloud/?user='.$id],'method' => 'post','id'=>'form1','name'=>'form1']) !!}
	    <br><br><br><br><br><br>
	    <div align="center">{!!HTML::image("images/load/default.gif")!!}
		Redireccionando, por favor espere...
		</div>
    {!! Form::close() !!}
</div>
@endsection
