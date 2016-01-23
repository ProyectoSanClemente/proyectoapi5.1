<div class="panel panel-default">
    <div class="panel-heading">Edicion Password</div>
        
    <div class="panel-body">

        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Password actual</label>

            <div class="col-md-6">

                {!! Form::password('old_password', ['class'=>'form-control']) !!}
                @if ($errors->has('old_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>            



        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                {!! Form::password('password', ['class'=>'form-control']) !!}
                 @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Confirmar Password</label>

            <div class="col-md-6">
                
                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>            
    </div>

    <div class="panel-footer" >
        <center>        
            <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-user">
            </i>Guardar</button>
        </center>
    </div>    
</div>