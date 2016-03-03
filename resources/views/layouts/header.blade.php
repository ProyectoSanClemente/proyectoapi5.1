<nav class="navbar navbar-inverse">
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
            <a class="navbar-brand" href="{!!url('/home')!!}">Inicio</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(!Auth::guest())
                    @if(Auth::user()->rol=='admin')   
                        <li> <a href="{{url('usuarios')}}"><i class="fa fa-users"></i><p>Usuarios</p></a> </li>
                        <li> <a href="{{url('impresoras')}}"><i class="glyphicon glyphicon-print"></i><p>Impresoras</p></a> </li>
                        <li> <a href="{{url('noticias')}}"><i class="fa fa-newspaper-o"></i><p>Noticias</p></a></li>
                    @endif
                        <li><a href="{{url('cuentas')}}"><i class="glyphicon glyphicon-hdd"></i><p>Cuentas</p></a> </li>
                        <li> <a href="{{url('anexos')}}"><i class="fa fa-phone"></i><p>Anexos</p></a></li>
                        <li><a href="{{url('emails/unseen')}}"><i class="fa fa-envelope"><span class="label" id='mails-unseen'><div class="glyphicon glyphicon-remove"></div></span></i><p>Correo</p></a></li>
                        <li><a href="{{url('sistemas')}}"><i class="glyphicon glyphicon-th-large"></i><p>Sistemas</p></a></li>
                        <li><a href="{{url('chat')}}"><i class="fa fa-whatsapp"><span class="label" id='conversation-unseen'></span></i><p>Chat</p></a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
                @if (Auth::guest())
                    <li> <a href="{!!  url('/login')  !!}"><i class="fa fa-btn fa-sign-in"></i><p>Inicio Sesión</p></a> </li>

                @else
                    {!! Form::hidden('accountname', Auth::user()->accountname, ['id'=>'accountname']) !!}
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i>{!! HTML::image(Auth::user()->imagen,null,array('class'=>'img-circle special-img','width'=>'25px')) !!}</i>
                                <p>{!!  Auth::user()->nombre.' '.Auth::user()->apellido  !!}</p>
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