{!! HTML::style('css/navbar-fixed-top.css') !!}   

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Branding Image -->
            <a class="navbar-brand" href="{!!  url('/home')  !!}">Inicio</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(!Auth::guest())
                    @if(Auth::user()->rol=='admin')    
                        <li> {!! HTML::link('usuarios', 'Directorio Empleados') !!}</li>
                        <li> {!! HTML::link('impresoras', 'Impresoras') !!}</li>
                        <li> {!! HTML::link('noticias', 'Noticias') !!}</li>
                        <li> {!! HTML::link('usuarios', 'Contenido') !!}</li>
                        <li> {!! HTML::link('cuentas', 'Cuentas') !!}</li>
                        <li> {!! HTML::link('emails/index', 'Correo') !!}</li>
                        <li> {!! HTML::link('sistemas', 'Sistemas') !!}</li>
                        <li role="presentation"><a href="chat">Chat <span class="badge" id="new_count_message">{{ $CountNewMessage }}</span></a></li>
                    
                    @else
                        <li> {!! HTML::link('noticias', 'Noticias') !!}</li>
                        <li> {!! HTML::link('cuentas', 'Cuentas') !!}</li>
                        <li> {!! HTML::link('emails/index', 'Correo') !!}</li>
                        <li> {!! HTML::link('sistemas', 'Sistemas') !!}</li>
                        <li role="presentation"><a href="chat">Chat <span class="badge" id="new_count_message">{{ $CountNewMessage }}</span></a></li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{!!  url('/login')  !!}">Iniciar Sesion</a></li>
                @else
                    <li class="dropdown">                  
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!! HTML::image(Auth::user()->imagen,null,array('class'=>'img-circle special-img','width'=>'25px')) !!}

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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>