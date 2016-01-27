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
              name : $("#name").val(),
              email : $("#email").val(),
              subject : $("#subject").val(),
              message : $("#message").val(),
              _token : '{{ csrf_token() }}'
            };

        $.ajax({
            type: "POST",
            url: "",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){

              $( "#load" ).hide();
              $("#name").val('');
              $("#email").val('');
              $("#subject").val('');
              $("#message").val('');

              if(data.success == true){

                $("#notif").html(data.notif);

                var socket = io.connect( 'http://'+window.location.hostname+':3000' );

                socket.emit('new_count_message', { 
                  new_count_message: data.new_count_message
                });

                socket.emit('new_message', { 
                  name: data.name,
                  email: data.email,
                  subject: data.subject,
                  created_at: data.created_at,
                  id: data.id
                });

              } else if(data.success == false){

                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#subject").val(data.subject);
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