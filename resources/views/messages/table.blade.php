<div class="table-responsive">
  <table id="mytable" class="table table-bordred table-striped">
    <thead>
      <th>Sender</th>
      <th>Mensaje</th>
      <th>Fecha</th>
      <th>Conversation_id</th>
    </thead>

    <tbody id="message-tbody">

    @if(count($ListMessage) > 0)            
      @foreach($ListMessage as $row)              
        <tr>
          <td>{{ $row->sender }}</td>
          <td>{{ $row->message }}</td>
          <td>{{ $row->created_at }}</td>
          <td>{{ $row->conversation_id}}</td>
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