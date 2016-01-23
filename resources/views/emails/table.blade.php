<script type="text/javascript">
    $(document).ready(function() {
        $('#correos').DataTable();
    } );
</script>

<table id="correos" class="table">
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
		@if($mail->seen == "0")
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
			<td><a href="{!! route('emails.show', [$mail->uid]) !!}"><i class="glyphicon glyphicon-envelope"></i></a>
			<td><a href="{!! route('emails.markMailAsRead', [$mail->uid]) !!}" onclick="return confirm('Desea marcar el correo como no leido?')"><i class="glyphicon glyphicon-eye-open"></i></a>

			<a href="{!! route('emails.markMailAsUnread', [$mail->uid]) !!}" onclick="return confirm('Desea marcar el correo como no leido?')"><i class="glyphicon glyphicon-eye-close"></i></a></td>
		</tr>
	@endforeach
</table>


