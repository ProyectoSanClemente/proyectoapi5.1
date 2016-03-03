<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading">Edición datos de usuario </div>					
				<div class="panel-body">                       
                	<!-- accountname Field -->
                	<div class="form-group{{ $errors->has('accountname') ? ' has-error' : '' }}">
                        <div class="form-group">                            
                            {!! Form::label('accountname', 'Cuenta:',['class'=>"col-md-4 control-label"]) !!}
	                        <div class="col-md-6">
                            {!! Form::text('accountname', null, ['class' => 'form-control','readonly'=>'readonly','style'=>'border: none;']) !!}
                            
	                        @if ($errors->has('accountname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('accountname') }}</strong>
                                </span>
                            @endif	                            
                            </div>
                        </div>
                    </div>
                    <!-- Rut Field -->
                    <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                        <div class="form-group">
                            {!! Form::label('rut', 'Rut:',['class'=>"col-md-4 control-label"]) !!}
                            <div class="col-md-6">
                            @if(empty($usuario->rut))
                                {!! Form::text('rut', null, ['class' => 'form-control']) !!}
                            @else
                                {!! Form::text('rut', null, ['class' => 'form-control','readonly'=>'readonly','style'=>'border: none;']) !!}
                            @endif 
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
                            {!! Form::label('apellido', 'Apellido:',['class'=>"col-md-4 control-label"]) !!}
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

                    <!-- Imagen Field -->
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
                        <label class="col-md-4 control-label">Contraseña actual</label>

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
                        <label class="col-md-4 control-label">Constraseña nueva</label>

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
                        <label class="col-md-4 control-label">Confirmar Contraseña</label>

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

@push('styles')
    {!! HTML::style('css/file-input.css')!!}
@endpush
@push('scripts')
    {!! HTML::script('js/file-input.js')!!}
@endpush