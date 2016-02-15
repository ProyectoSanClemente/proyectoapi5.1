<!-- Nombre post Field -->
<div class="form-group">
    {!! Form::label('nombre_post', 'Nombre post:') !!}
    <p>{!! $post->nombre_post !!}</p>
</div>

<!-- Imagen post Field -->
<div class="form-group">
    {!! Form::label('imagen_post', 'Imagen post:') !!}
    <p>{!! $post->imagen_post !!}</p>
</div>

<!-- Redireccionar Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('controlador', 'Controlador:') !!}
	{!!$post->controlador!!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('funcion', 'Funcion:') !!}
	{!!$post->funcion !!}
</div>
