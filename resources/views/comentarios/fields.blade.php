<!-- Nombre Sistema Field -->
	<div class="form-group" id="error" >
		<div class="alert alert-danger">
			<label>Ingrese un contenido</label>
		</div>
	</div>
	<!-- Redireccionar Field -->
	<div class="form-group">
	    {!! Form::label('contenido', 'Contenido:') !!}
		{!! Form::textarea('contenido', null, ['class' => 'form-control','id' => 'contenido','placeholder' => 'Ingrese el Contenido']) !!}
	</div>