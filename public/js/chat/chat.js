$(document).ready(function(){
    show_conversations();
    $('.scroll-conversations').slimScroll();
    $('.scroll-conversation').slimScroll();
    $('.scroll-users').slimScroll();
    $('.text-message').focus();

    $('.user-selected').click(function(e){
        user_selected = $(this);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=user_selected.data('user2_id');
        var user2_accountname=user_selected.data('user2_accountname');  
        create_conversation(user1_id,user1_accountname,user2_id,user2_accountname);
        $('.text-message').focus();
        $('#tabs a[href="#conversations"]').tab('show'); //Select conversations tab
    });

    $(document).delegate('.conversation-selected', 'click', function(e){//para el form creado dinamico
        conversation_selected= $(this);
        conversation_id=conversation_selected.data('id');
       $("#conversation_id").val(conversation_id);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=conversation_selected.data('user2_id');
        var user2_accountname=conversation_selected.data('user2_accountname');
        $('#user2_accountname').val(user2_accountname);
        show_messages();
        $('.text-message').focus();
    });  

    $('.text-message').keypress(function(e){ //Apretando enter
        if (e.which == 13) {
            send_message($('.send-button'));
        }
    });

    $('.send-button').click(function(){//En el envento click           
        send_message($(this));
    });

    $('.scroll-conversation').click(function(){
        update_notifications();
    });
});

function update_notifications(){
    var dataString = {
        conversation_id: $('#conversation_id').val()
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "chat/update",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(id){
            var convunseen=parseInt($('#notification-'+id).text());
            var totalunseen=parseInt($('#conversation-unseen').text());
            $('#conversation-unseen').html(totalunseen-convunseen);
            $('#notification-'+id).html('0');
        },
    });
}

function show_messages(){
    var dataString = {
        conversation_id: $('#conversation_id').val()
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "chat/showmessages",
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
                    var message='<div style="font-size: 13pt">'+messages[i].message+'</div>'; //HTML to plain text
                    
                    var created_at=messages[i].created_at;
                    if(sender==data.user1_accountname){                        
                        printmessage('right','me',sender,created_at,message);
                    }

                    if(sender==data.user2_accountname)
                        printmessage('left','you',sender,created_at,message);
                }
                scroll();
            }
        },

    });
}

function send_message(input){
    var url='10.128.2.59';
    var input = $('.text-message').val();
    var output = emojione.shortnameToImage(input.replace(/<[^>]*>/g, ''));
    var dataString = {
        user1_id: $('#user1_id').val(),
        sender: $('#user1_accountname').val(),
        user2_accountname: $('#user2_accountname').val(),
        conversation_id  : $('#conversation_id').val(),
        conversation2_id  : $('#conversation2_id').val(),
        message : output,
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "chat/store",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            if(data.success == true){
                $('.text-message').val('');
                var socket = io.connect( 'http://'+window.location.hostname+':3000');
                socket.emit('new_message',{ 
                    sender: data.sender,
                    user2_accountname: data.user2_accountname,
                    conversation_id  : $('#conversation_id').val(),
                    conversation2_id  : $('#conversation2_id').val(),
                    message: data.message,
                    created_at: data.created_at,
                });
            }else if(data.success == false){
                if($('.text-message').val()==''){
                    alert('Mensaje Vacio')
                }
                if($('#conversation_id').val()==''){
                    alert('Se debe escoger alguien con quien conversar')
                }
                $("#message").val(data.message);
            }

        } ,error: function(xhr, status, error) {
            alert('Has sido desconectado del servidor');
        },

    });
}

function create_conversation(user1_id,user1_accountname,user2_id,user2_accountname){
    $('.user_conversation_title').html('Conversando con '+user2_accountname);
    $('.div_conversation').html('');
    $('.text-message').focus();
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
            $("#conversation_id").val(data.id);
            if(data.created){
                $('.conversation-selected').html('');
                show_messages();
                show_conversations();
            }
            else{//Si ya existia la conversacion                
                show_messages();
            }
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
        url: "chat/show",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            $('.scroll-conversations').html('');
            if(data.length==0){
                $('.scroll-conversations').append($("<div/>",{
                    class:"alert alert-warning",
                    role : "alert"
                }).append('Aun no hay conversaciones activas, seleccione un usuario para conversar desde la pestaña Usuarios!')
                )
            }
            else{
                for (i = 0; i < data.length; i++) {
                    var id=data[i].id;
                    var user2_id=data[i].user2_id;
                    var user2_accountname=data[i].user2_accountname;
                    var imagen=data[i].imagen;
                    var notification=data[i].unseen;
                    $('.scroll-conversations').append(                 
                        $("<form/>", {
                            class: 'form-horizontal'
                        }).append(                                  
                            $("<a/>",{
                                href: "#",
                                class: "conversation-selected",
                                'data-id': id,
                                'data-user2_id': user2_id,
                                'data-user2_accountname': user2_accountname
                            }).append(
                                $("<div/>",{
                                    class: "form-group col-md-12"
                                }).append(
                                   $("<div/>",{
                                        class: "col-md-3"
                                    }).append(
                                        $("<img/>",{
                                            class: "img-circle crop-chat",
                                            src: imagen
                                            })
                                        ),                                    
                                    $("<div/>",{
                                        class: "col-md-9"
                                    }).append(
                                        $("<div/>",{
                                            id: 'user2-'+id,
                                        }).append(
                                            user2_accountname,
                                            $("<span/>",{
                                                id: 'notification-'+id,
                                                class:'notification'
                                            }).append(notification)
                                        )
                                    )                                 
                                )
                            )
                        )
                    )
                }//endfor
            }
        }, error: function(xhr, status, error) {
          //alert(error);
        },
    });
}

function scroll(){
    $('.scroll-conversation').slimScroll({
        scrollTo: $('.scroll-conversation')[0].scrollHeight        
    });
    update_notifications()
}

function printmessage(direction,who,sender,created_at,message){
    $('.div_conversation').append(
            $('<row/>',{
                class: 'col-md-9 pull-'+direction
            }).append(
            $("<div/>",{
                class: 'bubble '+who
            }).append(sender+' dice:'+'<span class="pull-right"> enviado:'+created_at+'</span>'+'<br>'+message)
        )
    )
}
