@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message') 
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div align="center" class="panel-heading">Inicio de Sesion</div>
                <div class="panel-body">
                    {!! Form::open(['class'=>'form-horizontal','role'=>'form','method'=>'POST']) !!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('accountname') ? ' has-error' : '' }}">
                            {!! Form::label(null,'Usuario',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                            <div class="input-group">                                
                                {!! Form::input('accountname','accountname',old('accountname') ,['class'=>'form-control','id'=>'accountname'])!!}
                                 <label class="input-group-addon glyphicon glyphicon-user"></label>
                            </div>
                                @if ($errors->has('accountname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accountname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!!Form::label('password','Contraseña',['class'=>'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                <div class="input-group">
                                    {!! Form::input('password', 'password', null,['class'=>'form-control']) !!}
                                    <label class="input-group-addon glyphicon glyphicon-lock"></label>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                                </button>

                            </div>
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h2 class="text-center">Para acceder a la Intranet</h2> 
      
            <div class="info">
                Para acceder a la <b>Intranet</b> debe ingresar:<br><br>
                <b>Nombre de Usuario:</b><br>
                <b>Contraseña:</b><br><br>
                <b>"Si no acepta la clave, asegúrese de haberla escrito con mayúsculas, o en su defecto pruebe con minúsculas".</b><br><br>
                <p><b><u>Si no puede acceder:</u></b> Rogamos enviar un correo a: <a href="mailto:admin@sanclemente.cl">admin@sanclemente.cl</a>, indicando su problemática. El inconveniente será solucionado con un margen máximo de 72 horas hábiles.</p>
            </div><br>

            <div class="text-right"><b>Administración Intranet</b><br>Departamento Informática<br>Ilustre Municipalidad San Clemente</div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style type="text/css">
    .input-group-addon {
        color: #fff;
        background: #3276B1;
        margin-bottom: 2px;
    }
</style>
@endpush