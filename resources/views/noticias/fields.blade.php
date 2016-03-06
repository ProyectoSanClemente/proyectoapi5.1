<div class="row">
	<!-- Titulo Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('titulo', 'Titulo:',['class'=>'col-md-4 control-label']) !!}
		{!! Form::textarea('titulo', null, ['class' => 'form-control']) !!}
	</div>

	<!-- Contenido Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('contenido', 'Contenido:',['class'=>'col-md-4 control-label']) !!}
		{!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}
	</div>

    <!-- Imagen Field -->
    <div class="form-group"> 
       {!! Form::label('imagen', 'Imagen:',['class'=>'col-md-4 control-label']) !!}
		<div class="col-md-4">                            
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

	<!-- Submit Field -->
	<div class="form-group col-sm-12">
		<button type="submit" class="btn btn-primary">
                    <i class="glyphicon glyphicon-floppy-disk"></i>    Guardar
	</div>

</div>

@push('styles')
    {!! HTML::style('css/file-input.css')!!}
@endpush
@push('scripts')
    {!! HTML::script('js/file-input.js')!!}
@endpush