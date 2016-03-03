<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
					<div class="panel-heading">Ingreso Nuevo Usuario</div>
					
					<div class="panel-body">                       
                    	<!-- accountname Field -->
                    	<div class="form-group{{ $errors->has('accountname') ? ' has-error' : '' }}">
	                        <div class="form-group">                            
	                            {!! Form::label('accountname', 'Cuenta:',['class'=>"col-md-4 control-label"]) !!}
		                        <div class="col-md-6">
		                        {!! Form::text('accountname', null, ['class' => 'form-control','Placeholder'=>'Cuenta Usuario']) !!}
	                            
		                        @if ($errors->has('accountname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accountname') }}</strong>
                                    </span>
                                @endif	                            
	                            </div>
	                        </div>
	                    </div>
                        
                        <!-- Rol Select -->
                        <div class="form-group">                           
                            {!! Form::label('rol', 'Rol:',['class'=>"col-md-4 control-label"]) !!}
                            <div class="col-md-6">
                                {!!Form::select('rol', ['usuario' => 'Usuario', 'admin' => 'Administrador'],null,['class'=>'form-control']);!!}           
                            </div>
                        </div>

                        <!-- Rut Field -->
                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            <div class="form-group">
                                {!! Form::label('rut', 'Rut:',['class'=>"col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    
                                    {!! Form::text('rut', null, ['class' => 'form-control','Placeholder'=>'Ej:11.111.111-1  o  11111111-1']) !!}
                                
                                 @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif  
                                </div>
                            </div>
                        </div>

                        <!-- Nombre Field -->
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
	                        <div class="form-group">
	                            {!! Form::label('nombre', 'Nombre:',['class'=>"col-md-4 control-label"]) !!}
		                        <div class="col-md-6">
								{!! Form::text('nombre', null, ['class' => 'form-control','Placeholder'=>'Nombre Usuario']) !!}
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
	                            {!! Form::label('apellido', 'Apellido:',['class'=>"col-md-4 control-label"]) !!}
		                        <div class="col-md-6">
								{!! Form::text('apellido', null, ['class' => 'form-control','Placeholder'=>'Apellido Usuario']) !!}
	                             @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif	
	                            </div>
	                        </div>
	                    </div>

                        <!-- Departamento Select -->
                        <div class="form-group">                           
                            {!! Form::label('Departamento', 'Departamento:',['class'=>"col-md-4 control-label"]) !!}
                            <div class="col-md-6">
                                <select name="departamento" class='form-control'>
                                    @foreach ($departamentos as $departamento)                                   
                                        <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password','Contraseña',['class'=>'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!! Form::password('password',['class'=>'form-control','Placeholder'=>'Contraseña'])!!}
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation','Confirmar Contraseña',['class'=>'col-md-4 control-label'])!!}
                            
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation',['class'=>'form-control','Placeholder'=>'Confirmación contraseña'])!!}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group"> 
					       {!! Form::label('imagen', 'Imagen:',['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">                            
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            Subir Imagen&hellip; 
                                            {!! Form::file('imagen',['accept'=>"image/x-png, image/gif, image/jpeg"]) !!}
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly>
                                </div>							
							</div>
                        </div>

                	</div>
                   <!-- Submit Field -->	
                    <div class="panel-footer" >
                    	<center>        
                            <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-user">
                            </i>Guardar</button>
						</center>
					</div>
				</form>                    
            </div>
        </div>
    </div>
</div>
@push('styles')
    {!! HTML::style('css/file-input.css')!!}
@endpush
@push('scripts')
    {!! HTML::script('js/file-input.js')!!}
@endpush