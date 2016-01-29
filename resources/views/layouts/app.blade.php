<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intranet</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{!!  asset('favicon.ico')  !!}" >
    <!-- Fonts -->
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css')!!}
    {!! HTML::style('https://fonts.googleapis.com/css?family=Lato:100,300,400,700') !!}
        <!-- Styles -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/jquery.dataTables.css') !!}
    
        <!-- Javascipts -->
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/jquery.dataTables.js') !!}
    {!! HTML::script('node_modules/socket.io/node_modules/socket.io-client/socket.io.js') !!} {{-- Modulo socket io--}}
    {!! HTML::script('js/nodesocket.js')!!} {{-- Servidor escuchando :) --}}
    
    @stack('scripts')

</head>
<body id="app-layout">
    @include('layouts.navbar-top')
    {{-- @include('layouts.navbar-bottom')   --}}
    
    @yield('content')

</body>
</html>



