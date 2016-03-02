<!-- Nombre anexo Field -->
<div class="form-group">
    {!! Form::label('nombre_anexo', 'Nombre anexo:') !!}
    <p>{!! $anexo->nombre_anexo !!}</p>
</div>

<!-- Imagen anexo Field -->
<div class="form-group">
    {!! Form::label('imagen_anexo', 'Imagen anexo:') !!}
    <p>{!! $anexo->imagen_anexo !!}</p>
</div>

<!-- Redireccionar Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('controlador', 'Controlador:') !!}
	{!!$anexo->controlador!!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('funcion', 'Funcion:') !!}
	{!!$anexo->funcion !!}
</div>
