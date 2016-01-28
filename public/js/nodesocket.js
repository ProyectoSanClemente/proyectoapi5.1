$(document).ready(function(){

        $("#load").hide();

     $(document).on("click",".detail-message",function() {
      
      $( "#load" ).show();

       var dataString = { 
              id : $(this).attr('id'),
              _token : '{{ csrf_token() }}'
            };

        $.ajax({
            type: "POST",
            url: "{{ URL::to('message') }}",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){

              $( "#load" ).hide();
             
              if(data){

                $("#show_name").html(data.name);
                $("#show_subject").html(data.subject);
                $("#show_message").html(data.message);

                var socket = io.connect( 'http://'+window.location.hostname+':3000' );
                
                socket.emit('update_count_message', { 
                  update_count_message: data.update_count_message
                });

              } 
          
            } ,error: function(xhr, status, error) {
              alert(error);
            },

        });

    });

  });

  var socket = io.connect( 'http://'+window.location.hostname+':3000' );

  socket.on( 'new_count_message', function( data ) {
  
      $( "#new_count_message" ).html( data.new_count_message );
      $('#notif_audio')[0].play();

  });

  socket.on( 'update_count_message', function( data ) {

      $( "#new_count_message" ).html( data.update_count_message );
    
  });

  socket.on( 'new_message', function( data ) {  
      $( "#message-tbody" ).prepend('<tr><td>'+data.sender+'</td><td>'+data.message+'</td><td>'+data.created_at+'</td><td>'+data.conversation_id+'</td>');
      $( "#no-message-notif" ).html('');
      $( "#new-message-notif" ).html('<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nuevo ...</div>');
  });