<script type="text/javascript">
	var goto_top = ''
		+ '<a class="goto-anchor-top" href="#top" onclick="self.scrollTo(0,0);return false;" rel="nofollow" title="Goto Top"></a>'
		+ '';
	document.writeln( goto_top );
</script>
<!-- Nombre Sistema Field -->
	<!-- Redireccionar Field -->
	<div class="form-group">
	    {!! Form::label('contenido', 'Contenido:') !!}
		{!! Form::textarea('contenido', null, ['class' => 'form-control','id' => 'contenido2','placeholder' => 'Ingrese el Contenido']) !!}
	</div>	
	{!!Form::hidden('id_post',null,['id'=>'id_post'])!!}
	{!!Form::hidden('id_usuario',Auth::id(),['id'=>'id_usuario'])!!}

	<div class="form-group col-sm-10">
	    {!! Form::submit('Guardar', ['class' => 'btn btn-primary send-comentario']) !!}
	    {!!Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss'=>'modal']) !!}
	</div>
	<div class="form-group col-sm-2">
	    {!!Form::button('', ['align'=>'right','class' => 'btn btn-primary glyphicon glyphicon-chevron-up goto-anchor-top']) !!}
	</div>
