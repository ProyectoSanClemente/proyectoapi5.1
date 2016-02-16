<!-- Nombre Sistema Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
	{!! Form::text('titulo', null, ['class' => 'form-control','id' => 'titulo','placeholder' => 'Ingrese un Titulo','maxlength' => 30,'required' => true]) !!}
</div>


<!-- Redireccionar Field -->
<div class="form-group">
    {!! Form::label('contenido', 'Contenido:') !!}
	{!! Form::textarea('contenido', null, ['class' => 'form-control','id' => 'titulo','placeholder' => 'Ingrese el Contenido','maxlength' => 30,'required' => true]) !!}
</div>
{!!Form::hidden('tipo','comunidad')!!}
{!!Form::hidden('id_usuario','1')!!}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!!Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss'=>'modal']) !!}
</div>