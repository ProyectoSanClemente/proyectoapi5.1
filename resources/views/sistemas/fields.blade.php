<!-- Nombre Sistema Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('nombre_sistema', 'Nombre Sistema:') !!}
	{!! Form::text('nombre_sistema', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Sistema Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('imagen_sistema', 'Imagen Sistema:') !!}
	<div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file">
                Subir Imagen&hellip; 
                {!! Form::file('imagen_sistema',['accept'=>"image/x-png, image/gif, image/jpeg"]) !!}
            </span>
        </span>
        <input type="text" class="form-control" readonly>
    </div>
</div>


<!-- Redireccionar Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('controlador', 'Controlador:') !!}
	{!! Form::text('controlador', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('funcion', 'Funcion:') !!}
	{!! Form::text('funcion', null, ['class' => 'form-control']) !!}
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