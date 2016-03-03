

<table id="correos" class="table table-responsive">
    <thead>
        <th>Remitente</th>
        <th>Asunto</th>
        <th>Fecha</th>
        <th>Leido</th>
        <th>Leer</th>
	</thead>

	@foreach ($mailsinfo as $mail)
		@if(!$mail->seen)
			<tr id="{{$mail->number}}" style='font-weight:bold'>
		@else
			<tr id="{{$mail->number}}">
		@endif
			<td>{!! $mail->from 	 !!}</td>
			<td>{!! $mail->subject !!}</td>
			<td>{!! $mail->date !!}</td>
			@if($mail->seen == "0")
				<td>Sin leer</td>
			@else
				<td>Leido</td>
			@endif
			<td><a href="{!! url('emails/'.$mail->number.'/show') !!}"><i class="glyphicon glyphicon-envelope"></i></a>
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
        $('#correos').DataTable({
        	"order": [[3,'desc']]
        });
    });
</script>

{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}

<script type="text/javascript">
    $(function(){
    $('#correos').contextMenu({
        selector: 'tr',
        items: {
            "show": {name: "Leer", icon: "fa-envelope",callback: function(){
                	var id=$(this).attr('id');
	                url="{!! url('emails/'.$mail->number.'/show') !!}"
	                var url = url.replace("{{$mail->number}}",id);
	                window.location.href = url;    
                }
            }
        }
    });
});
</script>
@endpush