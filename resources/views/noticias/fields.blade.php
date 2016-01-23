<div class="row">
					<!-- Titulo Field -->
					<div class="form-group col-sm-6 col-lg-4">
					    {!! Form::label('titulo', 'Titulo:',['class'=>'col-md-4 control-label']) !!}
						{!! Form::textarea('titulo', null, ['class' => 'form-control']) !!}
					</div>

					<!-- Contenido Field -->
					<div class="form-group col-sm-6 col-lg-4">
					    {!! Form::label('contenido', 'Contenido:',['class'=>'col-md-4 control-label']) !!}
						{!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group col-sm-6 col-lg-4">
					    {!! Form::label('imagen', 'Imagen:',['class'=>'col-md-4 control-label']) !!}
						{!! Form::file('imagen', null,['class' => 'form-control','accept'=>"image/x-png, image/gif, image/jpeg"]) !!}

					</div>


					<!-- Submit Field -->
					<div class="form-group col-sm-12">
						<button type="submit" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-floppy-disk"></i>    Guardar
					</div>

</div>