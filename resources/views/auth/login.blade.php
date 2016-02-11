@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message') 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div align="center" class="panel-heading">Inicio de Sesion</div>
                <div class="panel-body">
                    {!! Form::open(['class'=>'form-horizontal','role'=>'form','method'=>'POST']) !!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('accountname') ? ' has-error' : '' }}">
                            {!! Form::label(null,'Usuario',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!! Form::input('accountname','accountname',old('accountname') ,['class'=>'form-control'])!!}
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
                                {!! Form::input('password', 'password', null,['class'=>'form-control']) !!}
                                
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
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Olvido su contraseña?</a>
                            </div>
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
