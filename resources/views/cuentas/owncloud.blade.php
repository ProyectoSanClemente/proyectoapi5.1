@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

	    <div align="center">{!!HTML::image("images/load/default.gif")!!}
		Redireccionando, por favor espere...
		</div>

<!DOCTYPE html>
<!--[if lte IE 8]><html class="ng-csp ie ie8 lte9 lte8" data-placeholder-focus="false" lang="es" ><![endif]-->
<!--[if IE 9]><html class="ng-csp ie ie9 lte9" data-placeholder-focus="false" lang="es" ><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="ng-csp" data-placeholder-focus="false" lang="es" ><!--<![endif]-->
	<head data-requesttoken="$oc_requesttoken">
		<meta charset="utf-8">
		<title>
		ownCloud		</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="referrer" content="never">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-itunes-app" content="app-id=543672169">
		<meta name="theme-color" content="#1d2d44">
		<link rel="shortcut icon" type="image/png" href="/owncloud/core/img/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="/owncloud/core/img/favicon-touch.png">
					<link rel="stylesheet" href="/owncloud/core/css/styles.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/header.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/mobile.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/icons.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/fonts.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/apps.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/fixes.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/multiselect.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/vendor/jquery-ui/themes/base/jquery-ui.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/jquery-ui-fixes.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/tooltip.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/share.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/apps/files_versions/css/versions.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/apps/files_pdfviewer/css/style.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/apps/firstrunwizard/css/colorbox.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/apps/firstrunwizard/css/firstrunwizard.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
					<link rel="stylesheet" href="/owncloud/core/css/jquery.ocdialog.css?v=6316a4ef16cffc7eda7028bb4849ded8" media="screen">
							<script src="/owncloud/index.php/core/js/oc.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/jquery/jquery.min.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/jquery-migrate/jquery-migrate.min.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/jquery-ui/ui/jquery-ui.custom.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/underscore/underscore.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/moment/min/moment-with-locales.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/handlebars/handlebars.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/blueimp-md5/js/md5.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/bootstrap/js/tooltip.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/backbone/backbone.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/placeholders.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/compatibility.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/jquery.ocdialog.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/oc-dialogs.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/js.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/l10n.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/l10n/es.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/octemplate.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/eventsource.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/config.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/search/js/search.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/oc-requesttoken.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/apps.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/mimetype.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/mimetypelist.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/snapjs/dist/latest/snap.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/backbone/backbone.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/oc-backbone.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/placeholder.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/jquery.avatar.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/avatar.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/backgroundjobs.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/shareconfigmodel.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/shareitemmodel.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/sharedialogresharerinfoview.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/sharedialoglinkshareview.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/sharedialogexpirationview.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/sharedialogshareelistview.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/sharedialogview.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/share.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/shorten/js/script.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/shorten/js/admin.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/files_pdfviewer/js/previewplugin.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/firstrunwizard/l10n/es.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/firstrunwizard/js/jquery.colorbox.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/firstrunwizard/js/firstrunwizard.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/gallery/l10n/es.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/apps/galleryplus/l10n/es.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/vendor/jsTimezoneDetect/jstz.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/visitortimezone.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/lostpassword.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
					<script src="/owncloud/core/js/login.js?v=6316a4ef16cffc7eda7028bb4849ded8"></script>
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
									<header role="banner">
						<div id="header">
							<div class="logo svg">
								<h1 class="hidden-visually">
									ownCloud								</h1>
							</div>
							<div id="logo-claim" style="display:none;"></div>
						</div>
					</header>
								
<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<form method="post" name="login" action="http://www.sanclemente.cl:8080/owncloud/index.php">
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
			<input type="checkbox" name="remember_login" value="0" id="remember_login" class="checkbox checkbox--white">
			<label for="remember_login">recordar</label>
		</div>
		<input type="hidden" name="timezone-offset" id="timezone-offset"/>
		<input type="hidden" name="timezone" id="timezone"/>
		<input type="hidden" name="requesttoken" value="$oc_requesttoken">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</fieldset>
</form>
				<div class="push"></div><!-- for sticky footer -->
			</div>
		</div>
		<footer role="contentinfo">
			<p class="info">
				<a href="https://owncloud.org" target="_blank" rel="noreferrer">ownCloud</a> – Servicios web bajo su control			</p>
		</footer>
	</body>
</html>

{{--     {!! Form::close() !!} --}}
</div>
@endsection
<script type="text/javascript">
$(document).on('ajaxSend',function(elm, xhr, settings) {
	if(settings.crossDomain === false) {
		xhr.setRequestHeader('requesttoken', oc_requesttoken);
		xhr.setRequestHeader('OCS-APIREQUEST', 'true');
	}
});

var app = angular.module('MyApp', []).config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.common.requesttoken = oc_requesttoken;
}]);
</script>