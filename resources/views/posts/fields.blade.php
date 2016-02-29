<!-- Nombre Sistema Field -->
	<div class="form-group" id="error" >
		<div class="alert alert-danger">
			<label>Ingrese Titulo y/o Contenido</label>
		</div>
	</div>
	<div class="form-group">
	    {!! Form::label('titulo', 'Titulo:') !!}
		{!! Form::text('titulo', null, ['class' => 'form-control','id' => 'titulo','placeholder' => 'Ingrese un Titulo','maxlength' => 30]) !!}
	</div>

	<!-- Redireccionar Field -->
	<div class="form-group">
	    {!! Form::label('contenido', 'Contenido:') !!}
		{!! Form::textarea('contenido', null, ['class' => 'form-control contenido','id' => 'contenido','placeholder' => 'Ingrese el Contenido']) !!}
	</div>

	{!!Form::hidden('tipo','comunidad',['id'=>'tipo'])!!}
	{!!Form::hidden('id_usuario',Auth::id(),['id'=>'id_usuario'])!!}

	<!-- Submit Field -->
	<div class="form-group col-sm-12">
	    {!! Form::submit('Guardar', ['class' => 'btn btn-primary send-button']) !!}
	    {!!Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss'=>'modal']) !!}
	</div>

<script>
    $('#contenido').emojiarea({wysiwyg: false});  
    var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
    var $wysiwyg_value = $('#emojis-wysiwyg-value');
    
    $wysiwyg.on('change', function() {
        $wysiwyg_value.text($(this).val());
    });
    $wysiwyg.trigger('change');
</script>

@push('scripts')
    {!! HTML::script('js/emoticons/emojiarea/jquery.emojiarea.js')!!}
    {!! HTML::script('images/emoticons/emojis.js')!!}
@endpush

@push('styles')
    {!! HTML::style('css/emoticons/jquery.emojiarea.css') !!}    
@endpush