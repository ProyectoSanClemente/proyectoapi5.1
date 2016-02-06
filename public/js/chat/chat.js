$(document).ready(function(){
    show_conversations();
    $('.scroll-users').slimScroll();
    $('.scroll-bottom').slimScroll();

    $('.user-selected').click(function(e){
        user_selected = $(this);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=user_selected.data('user2_id');
        var user2_accountname=user_selected.data('user2_accountname');  
        create_conversation(user1_id,user1_accountname,user2_id,user2_accountname);
    });

    $(document).delegate('.conversation-selected', 'click', function(e){//para el form creado dinamico
        conversation_selected= $(this);
        conversation_id=conversation_selected.data('id');
       $("#conversation_id").val(conversation_id);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=conversation_selected.data('user2_id');
        var user2_accountname=conversation_selected.data('user2_accountname');
        show_messages();
    });

    $('.text-message').keypress(function(e){ //Apretando enter
        if (e.which == 13) {
            send_message($('.send-button'));
        }
    });

    $('.send-button').click(function(){//En el envento click
        send_message($(this));
    });


});

function show_messages(){
    var dataString = {
        conversation_id: $('#conversation_id').val()
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "messages/showmessages",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            $('.user_conversation_title').html('Conversando con '+data.user2_accountname);
            $('#conversation_id').val(data.conversation_id);
            $('#conversation2_id').val(data.conversation2_id)
            if(data.messages.length==0){
                $('.div_conversation').html('Aun no hay mensajes enviados');
            }
            else{
                $('.div_conversation').html(''); //cls
                var messages=data.messages;
                for (i = 0; i < messages.length; i++){
                    var sender=messages[i].sender;
                    var message=messages[i].message;
                    $('.div_conversation').append(sender+': '+message+'<br>');
                }
                scroll();
            }
        },

    });
}

function send_message(input){
    var user1_id=$('#user1_id').val();
    var user1_accountname=$('#user1_accountname').val();
    var dataString = {
        user1_id: user1_id,
        sender: user1_accountname,
        conversation_id  : $('#conversation_id').val(),
        conversation2_id  : $('#conversation2_id').val(),
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
                    conversation_id  : $('#conversation_id').val(),
                    conversation2_id  : $('#conversation2_id').val(),
                    message: data.message,
                    created_at: data.created_at,
                });
            }else if(data.success == false){
                if($('.text-message').val()==''){
                    alert('Mensaje Vacio')
                }
                $("#message").val(data.message);
                $("#notif").html(data.notif);
            }
          
        } ,error: function(xhr, status, error) {
            alert(error);
        },

    });
}

function create_conversation(user1_id,user1_accountname,user2_id,user2_accountname){
    $('.user_conversation_title').html('Conversando con '+user2_accountname);
    $('.div_conversation').html('');
    var dataString = {
        user1_id: user1_id,
        user1_accountname: user1_accountname,
        user2_id: user2_id,
        user2_accountname: user2_accountname
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "chat/create",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            if(data.creado){                    
                $('.conversation-selected').html('');
                show_conversations();
                show_messages();
                //Emit new conversation
            }
            else{
                alert('ya existia la conversa');
                show_messages();
            }
            $("#conversation_id").val(data.id);
            conversation_id=data.id;
            //$('#conversation_id').val(data.id);

        } ,error: function(xhr, status, error) {
          alert(error);
        },
    });
}

function show_conversations(){
    var user1_id=$('#user1_id').val();
    var user1_accountname=$('#user1_accountname').val();
    var dataString = {
        user1_id: user1_id,
        user1_accountname: user1_accountname
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "chat/showconversations",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            $('.scroll-users').html('');
            if(data.length==0){
                $('.scroll-users').append($("<div/>",{
                    class:"alert alert-warning",
                    role : "alert"
                }).append('Aun no hay conversaciones, seleccione un usuario de la lista de arriba!')
                )
            }
            else{
                for (i = 0; i < data.length; i++) {
                    var id=data[i].id;
                    var user2_id=data[i].user2_id;
                    var user2_accountname=data[i].user2_accountname;
                    $('.scroll-users').append(                        
                        $("<form/>", {
                            class: 'form-horizontal form-bordered conversation-list'
                        }).append(
                            $("<span/>",{
                                class:'notifications-'+id
                            }),                       
                            $("<a/>",{
                                href: "#",
                                class: "conversation-selected",
                                'data-id': id,
                                'data-user2_id': user2_id,
                                'data-user2_accountname': user2_accountname
                            }).append(
                                $("<div/>",{
                                    class: "form-group row col-md-12"
                                }).append(
                                   $("<div/>",{
                                        class: "col-md-3"
                                    }).append(
                                        '<img src="images/avatar/default.png" class="crop-chat"/>'
                                    ),
                                    $("<div/>",{
                                        class: "col-md-9"
                                    }).append(
                                        $("<div/>",{
                                            id: 'user2-'+id,
                                        }).append(
                                            user2_accountname
                                        )
                                    )                                 
                                )
                            )
                        )
                    )
                }//endfor
            }
        }, error: function(xhr, status, error) {
          alert(error);
        },
    });
}

function scroll(){
    $('.scroll-bottom').slimScroll({
        scrollTo: $('.scroll-bottom')[0].scrollHeight
    });
}