@extends('layouts.app')

@section('content')
  <div id="load">Porfavor Espere ...</div>  
  <center><a href="{{ URL::to('chat') }}">Lista de Mensajes</a></center><br />
  <div class="container">
    <div class="row">
      <div id="notif"></div>
        <div class="col-md-6 col-md-offset-3">
          <div class="well well-sm">
            {!! Form::open(['class'=>'form-horizontal'])!!}           
              @include('chat.fields')
            {!! Form::close()!!}
          </div>
        </div>
    </div>
  </div>
@endsection
@push('scripts')

{!! HTML::script('node_modules/socket.io/node_modules/socket.io-client/socket.io.js') !!}
<script>
  $(document).ready(function(){

        $("#load").hide();

    $("#submit").click(function(){
      
      $( "#load" ).show();

       var dataString = { 
              sender: '{{ Auth::user()->accountname }}',
              conversation_id : $("#conversation_id").val(),
              message : $("#message").val(),
              _token : '{{ csrf_token() }}'
            };

        $.ajax({
            type: "POST",
            url: "store",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
              $("#load" ).hide();
              $("#conversation_id").val(''),
              $("#message").val('');

              if(data.success == true){

                $("#notif").html(data.notif);

                var socket = io.connect( 'http://'+window.location.hostname+':3000' );

                socket.emit('new_count_message', { 
                  new_count_message: data.new_count_message
                });

                socket.emit('new_message', { 
                  sender: data.sender,
                  conversation_id: data.conversation_id,
                  message: data.message,
                  created_at: data.created_at,
                  id: data.id
                });

              } else if(data.success == false){
                $("#conversation_id").val(data.conversation_id);
                $("#message").val(data.message);
                $("#notif").html(data.notif);
              }
          
            } ,error: function(xhr, status, error) {
              alert(error);
            },

        });

    });

  });
    </script>
@endpush