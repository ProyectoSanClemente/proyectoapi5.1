@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"><head><title>GLPI - Autenticación</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Script-Type" content="text/javascript"/>
<link rel="shortcut icon" type="images/x-icon" href="/glpi/pics/favicon.ico" /><link rel="stylesheet" href="/glpi/css/styles.css" type="text/css" media="screen" /><!--[if lte IE 6]><link rel='stylesheet' href='/glpi/css/styles_ie.css' type='text/css' media='screen' >
<![endif]--></head><body><div id='firstboxlogin'><div id='logo_login'></div><div id='text-login'></div><div id='boxlogin'>

<form action='https://10.128.2.16/glpi/front/login.php' method='post'><fieldset><legend>Autenticación</legend><div class="loginrow"><span class="loginlabel"><label>Inicio de sesión</label></span><span class="loginformw"><input type="text" name="login_name" id="login_name" required="required" /></span></div><div class="loginrow"><span class="loginlabel"><label>Contraseña</label></span><span class="loginformw"><input type="password" name="login_password" id="login_password" required="required" /></span></div></fieldset><p><span><input type="submit" name="submit" value="Aceptar" class="submit" /></span></p><div id="forget"><a href="front/lostpassword.php?lostpassword=1">Olvidó su clave?</a></div>
<input type="hidden" name="_glpi_csrf_token" value="d8c46c297c1b2bb9617ed268560fa14b">
</form>
<script type='text/javascript' >
document.getElementById('login_name').focus();</script></div><div class='error'><noscript><p>Debe activar la funcion de JavaScript de su buscador</p></noscript></div></div><div id='footer-login'><a href='http://glpi-project.org/' title='Powered By Indepnet'>GLPI version 0.85.2 Copyright (C) 2003-2016 INDEPNET Development Team.</a></div><div style="background-image: url('/glpi/front/cron.php');"></div></body></html>

</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#submit').click();
});

</script>
@endpush
