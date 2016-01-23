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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Styles -->
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/navbar-fixed-top.css') !!}
    {!! HTML::style('css/navbar-fixed-bottom.css') !!}
    {!! HTML::style('css/jquery.dataTables.css') !!}      
    
        <!-- Javascipts -->
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/bootstrap.min.js') !!}
    {!! HTML::script('js/jquery.dataTables.js') !!}

</head>
<body id="app-layout">
    <nav class="navbar navbar-default  navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{!!  url('/home')  !!}">
                    Inicio
                </a>
            </div>
            
           
                <!-- Left Side Of Navbar -->
            @if(!Auth::guest())
                @if(Auth::user()->rol=='admin')             
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('usuarios', 'Directorio Empleados') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('impresoras', 'Impresoras') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('noticias', 'Noticias') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('usuarios', 'Contenido') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('cuentas', 'Cuentas') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('emails/index', 'Correo') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('usuarios', 'Administrador') !!}</li> 
                    </ul>                
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('sistemas', 'Sistemas') !!}</li>
                    </ul>
                @else
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('noticias', 'Noticias') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('cuentas', 'Cuentas') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('emails/index', 'Correo') !!}</li>
                    </ul>              
                    <ul class="nav navbar-nav">
                        <li> {!! HTML::link('sistemas', 'Sistemas') !!}</li>
                    </ul>
                @endif
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{!!  url('/login')  !!}">Iniciar Sesion</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {!! HTML::image(Auth::user()->imagen,null,array('class'=>'img-circle special-img','width'=>'25px')) !!}

                            {!!  Auth::user()->nombre.' '.Auth::user()->apellido  !!} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            
                            
                            <li><a href="{!!  URL::to('usuarios/' .Auth::id().'/edit')  !!}"><i class="fa fa-btn fa-edit"></i>Editar</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="{!!  url('/logout')  !!}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                        </ul>


                    </li>
                @endif
            </ul>
        </div>
    </nav>
    
    <div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('usuarios', 'Directorio Empleados') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('impresoras', 'Impresoras') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('noticias', 'Noticias') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('usuarios', 'Contenido') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('cuentas', 'Cuentas') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('emails/index', 'Correo') !!}</li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('usuarios', 'Administrador') !!}</li> 
                    </ul>                
                    <ul class="nav navbar-nav">
                        <li> {!!  HTML::link('sistemas', 'Sistemas') !!}</li>
            </ul>
        </div>
    </div>    
    @yield('content')
    
</body>
</html>



