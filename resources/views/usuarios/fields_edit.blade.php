<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
					<div class="panel-heading">Edicion datos de usuario</div>
					
					<div class="panel-body">                       
                    	<!-- accountname Field -->
                    	<div class="form-group{{ $errors->has('accountname') ? ' has-error' : '' }}">
	                        <div class="form-group">                            
	                            {!! Form::label('accountname', 'AccountName:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
		                        {!! Form::text('accountname', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
	                            
		                        @if ($errors->has('accountname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accountname') }}</strong>
                                    </span>
                                @endif	                            
	                            </div>
	                        </div>
	                    </div>

                        <!-- Nombre Field -->
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('nombre', 'Nombre:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>

                        <!-- Apellido Field -->
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('apellido', 'Apellido:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>

                        <!-- Email Field -->
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('email', 'Email:',array('class'=>"col-md-4 control-label")) !!}
		                        <div class="col-md-6">
								{!! Form::text('email', null, ['class' => 'form-control']) !!}
	                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>     					

                        

					   {!! Form::label('imagen', 'Imagen:',['class'=>'col-md-4 control-label "btn btn-default btn-file"']) !!}
							<div class="col-md-6">
							{!! Form::file('imagen', null,['class' => 'form-control btn btn-default btn-file"','accept'=>"image/x-png, image/gif, image/jpeg"]) !!}

							</div>
                        

                    </div>  <!-- End panel body -->
                    <!-- Submit Field -->    
                    <div class="panel-footer" >
                        <center>        
                            <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-user">
                            </i>Guardar</button>
                        </center>
                    </div>               
            </div>

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


            
             

		</div>
    </div>                
</div>
