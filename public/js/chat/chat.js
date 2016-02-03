$(document).ready(function(){
    
    
    $('.scroll-users').slimScroll();

    $('.user-selected').click(function(e){
        user_selected = $(this);
        var user2=$('#nombre-'+user_selected.data('user-id')).text();
        $('.user_conversation_title').html('Conversando con '+user2);
        $('.div_conversation').html('');
        var dataString = {
                user1: $('#accountname').val(),
                user2: user2.trim()        
        };        
        create(dataString);
        location.reload();

    });

    $('.conversation-selected').click(function(e){
        conversation_selected= $(this);
        var id=conversation_selected.data('conversation-id');
        var user1=$('#accountname').val();
        var user2=$('#user2-'+id).text();
        $('.user_conversation_title').html('Conversando con '+user2);
        $('.div_conversation').html('');
        var dataString = {
            user1: user1,
            user2: user2.trim()        
        };
        create(dataString);
    });



    $('.text-message').keypress(function(e){ //Apretando enter
        if (e.which == 13) {
            send_message($('.send-button'));
        }
    });

    $('.send-button').click(function(){//En el envento click
        send_message($(this));
    });

    
    function create(dataString){
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "chat/create",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
                $('#conversation_id').val(data.id);
                $('.div_conversation').html(data.messages);//Obtener Historial Mensajes
                
                $('.scroll-bottom').slimScroll({
                    scrollTo: $('.scroll-bottom')[0].scrollHeight
                });

            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    }


    function send_message(input) {
        var dataString = {
              sender: $('#accountname').val(),
              conversation_id : $("#conversation_id").val(),
              message : $('.text-message').val(),
            };
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "messages/store",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
                $('.text-message').val('');
                if(data.success == true){
                    var socket = io.connect( 'http://'+window.location.hostname+':3000' );                
                    socket.emit('new_message', { 
                      sender: data.sender,
                      conversation_id: data.conversation_id,
                      message: data.message,
                      created_at: data.created_at,
                      id: data.id
                    });

                  } else if(data.success == false){
                    if($('.text-message').val()==''){
                        alert('Mensaje Vacio')
                    }
                    $("#conversation_id").val(data.conversation_id);
                    $("#message").val(data.message);
                    $("#notif").html(data.notif);
                  }
              
                } ,error: function(xhr, status, error) {
                  alert(error);
                },

        });
    }
    

});
