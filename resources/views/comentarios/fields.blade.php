<div class="form-group ">
    {!! Form::label('contenido', 'Contenido:') !!}
	{!! Form::textarea('contenido', null, ['class' => 'form-control contenido2','id' => 'contenido2','placeholder' => 'Ingrese el Contenido']) !!}
</div>	
{!!Form::hidden('id_post',null,['id'=>'id_post'])!!}
{!!Form::hidden('id_usuario',Auth::id(),['id'=>'id_usuario'])!!}

<div class="form-group">
	<div class="col-sm-12">
	    {!! Form::submit('Guardar', ['class' => 'btn btn-primary send-comentario']) !!}
	    {!!Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss'=>'modal']) !!}
	</div>
</div>

<script>
    $('#contenido2').emojiarea({wysiwyg: false});  
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