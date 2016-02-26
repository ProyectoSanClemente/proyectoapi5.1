<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Intranet</title>
<!-- Favicon -->
<link rel="shortcut icon" href="{!!asset('favicon.ico')!!}" >
<!-- Fonts -->
{!! HTML::style('fonts/font-awesome-4.5.0/css/font-awesome.min.css')!!}
{!! HTML::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') !!}
    <!-- Styles -->
{!! HTML::style('css/bootstrap.min.css')    !!}
{!! HTML::style('css/navbar-with-icons.css')	!!}
@stack('styles')
    <!-- Javascipts -->
{!! HTML::script('js/jquery.min.js')        !!}
{!! HTML::script('js/bootstrap.min.js')     !!}
{!! HTML::script('js/navbar-with-icons.js')  !!}
{!! HTML::script('node_modules/socket.io/node_modules/socket.io-client/socket.io.js') !!} {{-- Modulo socket io--}}
@stack('scripts')
