<!-- Nombre Sistema Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre_sistema', 'Nombre Sistema:') !!}
	{!! Form::text('nombre_sistema', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Sistema Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('imagen_sistema', 'Imagen Sistema:') !!}
	{!! Form::file('imagen_sistema') !!}
</div>

<!-- Redireccionar Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('redireccionar', 'Redireccionar:') !!}
	{!! Form::text('redireccionar', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
