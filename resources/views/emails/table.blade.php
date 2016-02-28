

<table id="correos" class="table table-responsive">
    <thead>
        <th>Remitente</th>
        <th>Asunto</th>
        <th>Tamaño</th>
        <th>Fecha</th>
        <th>Leido</th>
        <th>Leer</th>
        <th>Acciones</th>
	</thead>

	@foreach ($mailsinfo as $mail)
		@if(!$mail->seen)
			<tr id="{{$mail->number}}" style='font-weight:bold'>
		@else
			<tr id="{{$mail->number}}">
		@endif
			<td>{!! $mail->from 	 !!}</td>
			<td>{!! $mail->subject !!}</td>
			<td>{!! $mail->size.' bytes'!!}</td>
			<td>{!! $mail->date !!}</td>
			@if($mail->seen == "0")
				<td>Sin leer</td>
			@else
				<td>Leido</td>
			@endif
			<td><a href="{!! url('emails/'.$mail->number.'/show') !!}"><i class="glyphicon glyphicon-envelope"></i></a>
			<td><a href="{!! url('emails/'.$mail->number.'/markMailAsRead') !!}" onclick="return confirm('Desea marcar el correo como leido?')"><i class="glyphicon glyphicon-eye-open"></i></a>

			<a href="{!! url('emails/'.$mail->number.'/markMailAsUnread') !!}" onclick="return confirm('Desea marcar el correo como no leido?')"><i class="glyphicon glyphicon-eye-close"></i></a></td>
		</tr>
	@endforeach
</table>

@push('styles')
{!! HTML::style('css/jquery.dataTables.css')!!}
{!! HTML::style('js/jQuery-contextMenu/jquery.contextMenu.css')!!}
@endpush

@push('scripts')
{!! HTML::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('#correos').DataTable();
    });
</script>

{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}

<script type="text/javascript">
    $(function(){
    $('#correos').contextMenu({
        selector: 'tr',
        items: {
            "show": {name: "Mostrar", icon: "fa-envelope",callback: function(){
                	var id=$(this).attr('id');
	                url="{!! url('emails/'.$mail->number.'/show') !!}"
	                var url = url.replace("{{$mail->number}}",id);
	                window.location.href = url;    
                }
            },
            "edit": {name: "Marcar como Visto", icon: "fa-eye",callback: function(){
                	var answer=confirm('Desea marcar el correo como leido?');
                	if(answer){
                		var id=$(this).attr('id');
	                	url="{!! url('emails/'.$mail->number.'/markMailAsRead') !!}"
		                var url = url.replace("{{$mail->number}}",id);
		                window.location.href = url;  
	                }
                }
            },
            "delete": {name: "Marcar como No Visto", icon: "fa-eye-slash",callback: function(){
	            	var answer=confirm('Desea marcar el correo como no leido?');
	                if(answer){
	                	var id=$(this).attr('id');
	                	url="{!! url('emails/'.$mail->number.'/markMailAsUnread') !!}"
		                var url = url.replace("{{$mail->number}}",id);
		                window.location.href = url;  
	                }
                }
            },	
        }
    });
});
</script>
@endpush