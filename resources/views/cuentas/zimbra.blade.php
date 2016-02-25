@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<!-- Modelo Impresora Field -->


		{!! Form::open(['url' => ['https://www.sanclemente.cl'],'method' => 'post','id'=>'zimbra','name'=>'loginForm','style'=>"display:none","accept-charset"=>"UTF-8"]) !!}

                <input type="hidden" name="loginOp" value="login">                 
				
					
				<label for="username">Nombre de usuario:</label></td>
                
                <input id="username" class="zLoginField" name="username" type="text" value="{{$user}}" size="40" maxlength="1024" autocapitalize="off" autocorrect="off">
                
                <label for="password">Contraseña:</label>
                
                <input id="password" autocomplete="off" class="zLoginField" name="password" type="password" value="{{$pass}}"size="40" maxlength="1024">


                    <input id="remember" value="1" type="checkbox" name="zrememberme">
                    <label for="remember">Recordarme</label>
                    <input type="submit" class="ZLoginButton DwtButton" value="Iniciar sesión">
 
			{!! Form::close()!!}

	<div align="center">{!!HTML::image("images/load/default.gif")!!}
		Redireccionando, por favor espere...
	</div>

</div>
@endsection

@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {

    $('form#zimbra').submit();
});

</script>
@endpush