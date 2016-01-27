<div class="table-responsive">
  <table id="mytable" class="table table-bordred table-striped">
    <thead>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Asunto</th>
      <th>Fecha</th>
    </thead>

    <tbody id="message-tbody">

    @if(count($ListMessage) > 0)            
      @foreach($ListMessage as $row)              
        <tr>
          <td>{{ $row->name }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->subject }}</td>
          <td>{{ $row->created_at }}</td>
        </tr>

      @endforeach
    @else              
      <tr id="no-message-notif">
        <td colspan="5" align="center"><div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only"></span> No message</div>
        </td>
      </tr>              
    @endif

    </tbody>
  </table>
</div>