

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
			<tr style='font-weight:bold'>
		@else
			<tr>
		@endif
			<td>{!! $mail->from 	 !!}</td>
			<td>{!! $mail->subject !!}</td>
			<td>{!! $mail->size.' bytes'!!}</td>
			<td>{!! date_format(new DateTime($mail->date), 'Y-m-d H:i:s') !!}</td>
			@if($mail->seen == "0")
				<td>Sin leer</td>
			@else
				<td>Leido</td>
			@endif
			<td><a href="{!! url('emails/'.$mail->uid.'/show') !!}"><i class="glyphicon glyphicon-envelope"></i></a>
			<td><a href="{!! url('emails/'.$mail->uid.'/markMailAsRead') !!}" onclick="return confirm('Desea marcar el correo como no leido?')"><i class="glyphicon glyphicon-eye-open"></i></a>

			<a href="{!! url('emails/'.$mail->uid.'/markMailAsUnread') !!}" onclick="return confirm('Desea marcar el correo como no leido?')"><i class="glyphicon glyphicon-eye-close"></i></a></td>
		</tr>
	@endforeach
</table>

@push('styles')
{!! HTML::style('css/jquery.dataTables.css')!!}
@endpush

@push('scripts')
{!! HTML::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('#correos').DataTable();
    });
</script>
@endpush