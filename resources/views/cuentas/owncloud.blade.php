@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

	    <div align="center">{!!HTML::image("images/load/default.gif")!!}
		Redireccionando, por favor espere...
		</div>

<!--[if lte IE 8]><html class="ng-csp ie ie8 lte9 lte8" data-placeholder-focus="false" lang="es" ><![endif]-->
<!--[if IE 9]><html class="ng-csp ie ie9 lte9" data-placeholder-focus="false" lang="es" ><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="ng-csp" data-placeholder-focus="false" lang="es" ><!--<![endif]-->
	<head data-requesttoken="">
		<meta charset="utf-8">
		<title>
		ownCloud		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="referrer" content="never">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-itunes-app" content="app-id=543672169">
		<meta name="theme-color" content="#1d2d44">
		<link rel="shortcut icon" type="image/png" href="/owncloud/core/img/favicon.png">
					</head>
	<body id="body-login">
		<noscript>
	<div id="nojavascript">
		<div>
			Esta aplicación requiere JavaScript para operar correctamente. Por favor, <a href="http://enable-javascript.com/" target="_blank" rel="noreferrer">habilite JavaScript</a> y recargue la página.		</div>
	</div>
</noscript>
		<div class="wrapper">
			<div class="v-align">
			
<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<form method="post" name="login" action="http://www.sanclemente.cl:8080/owncloud/index.php" style="display:none">
	<fieldset>
									<div id="message" class="hidden">
			<img class="float-spinner" alt=""
				src="/owncloud/core/img/loading-dark.gif">
			<span id="messageText"></span>
			<!-- the following div ensures that the spinner is always inside the #message div -->
			<div style="clear: both;"></div>
		</div>
		<p class="grouptop">
			<input type="text" name="user" id="user"
				placeholder="Nombre de usuario"
				value="{!!$user!!}"
				autofocus				autocomplete="on" autocapitalize="off" autocorrect="off" required>
			<label for="user" class="infield">Nombre de usuario</label>
		</p>

		<p class="groupbottom">
			<input type="password" name="password" id="password" value="{!!$pass!!}"
				placeholder="Contraseña"
								autocomplete="on" autocapitalize="off" autocorrect="off" required>
			<label for="password" class="infield">Contraseña</label>
			<input type="submit" id="submit" class="login primary icon-confirm svg" title="Ingresar" value=""/>
		</p>

						<div class="remember-login-container">
			<input type="checkbox" name="remember_login" value="1" id="remember_login" class="checkbox checkbox--white">
			<label for="remember_login">recordar</label>
		</div>
		<input type="hidden" name="timezone-offset" id="timezone-offset"/>
		<input type="hidden" name="timezone" id="timezone"/>
		<input type="hidden" name="requesttoken" value="">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</fieldset>
</form>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#submit').click();
});
</script>
@endpush