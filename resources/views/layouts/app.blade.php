<!DOCTYPE html>
<html lang="en">
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

</head>
<body id="app-layout">
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>
    @include('layouts.navbar-top')
    @yield('content')


</body>
</html>



