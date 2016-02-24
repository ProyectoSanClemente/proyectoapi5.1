@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<body onload="document.form1.submit()">
		<!-- Modelo Impresora Field -->
    {!! Form::open(['url' => ['http://reset.sanclemente.cl/sistemas/orden/index.php'],'method' => 'post','name'=>"form1"]) !!}
		<br><br><br><br><br><br>
		<?php  
			 $_SESSION["kt_login_id"] = "1";
  $_SESSION["kt_login_user"] = "informatica";
  $_SESSION["kt_login_level"] = "master";
  $_SESSION["kt_nombre"] = "Depto. Informática";
  $_SESSION["kt_email"] = "mlillo@sanclemente.cl";
  $_SESSION["kt_fecha_ingreso"] = "2009-04-22";
  $_SESSION["kt_hora_ingreso"] = "2009-04-22";
  $_SESSION["kt_cargo"] = "Programador";
  $_SESSION["kt_depto"] = "";
  $_SESSION["kt_ubicacion"] = "Ninguno";
  $_SESSION["kt_nivel_temp"] = "";
  ?>
		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
		{!!Form::hidden('kt_login_user',$user)!!}
    {!! Form::close() !!}
</div>
@endsection