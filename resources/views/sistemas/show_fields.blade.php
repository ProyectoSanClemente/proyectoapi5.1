<!-- Nombre Sistema Field -->
<div class="form-group">
    {!! Form::label('nombre_sistema', 'Nombre Sistema:') !!}
    <p>{!! $sistema->nombre_sistema !!}</p>
</div>

<!-- Imagen Sistema Field -->
<div class="form-group">
    {!! Form::label('imagen_sistema', 'Imagen Sistema:') !!}
    <p>{!! $sistema->imagen_sistema !!}</p>
</div>

<!-- Redireccionar Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('controlador', 'Controlador:') !!}
	{!!$sistema->controlador!!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('funcion', 'Funcion:') !!}
	{!!$sistema->funcion !!}
</div>
