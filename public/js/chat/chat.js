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
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN':user_selected.data('token')},
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

    });

    $('.text-message').keypress(function(e){ //Apretando enter
        if (e.which == 13) {
            send_message($('.send-button'));
        }
    });

    $('.send-button').click(function(){//En el envento click
        send_message($(this));
    });

    function send_message(input) {
        var dataString = {
              sender: $('#accountname').val(),
              conversation_id : $("#conversation_id").val(),
              message : $('.text-message').val(),
            };
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN':user_selected.data('token')},
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
