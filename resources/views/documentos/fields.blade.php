  {!! Form::hidden('id_repositorio',$repositorio->id) !!}
<!-- Nombre documento Field -->
<div class="form-group col-sm-8 col-sm-offset-2">
    {!! Form::label('nombre', 'Nombre Documento:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>



<!-- Documento Field -->
<div class="form-group col-sm-8 col-sm-offset-2"> 
   {!! Form::label('documento', 'Documento:',['class'=>'col-md-4 control-label']) !!}
	<div class="form-group ">                            
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file">
                    Subir Documento&hellip; 
                    {!! Form::file('documento') !!}
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>							
	</div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

@push('styles')
    {!! HTML::style('css/file-input.css')!!}
@endpush
@push('scripts')
    {!! HTML::script('js/file-input.js')!!}
@endpush