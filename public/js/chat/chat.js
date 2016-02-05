$(document).ready(function(){
    show_conversations();
    $('.scroll-users').slimScroll();

    $('.user-selected').click(function(e){
        alert('hola');
        user_selected = $(this);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=user_selected.data('user2_id');
        var user2_accountname=user_selected.data('user2_accountname');  
        create_conversation(user1_id,user1_accountname,user2_id,user2_accountname);
    });

    $(document).delegate('.conversation-selected', 'click', function(e){//para el form creado dinamico
        conversation_selected= $(this);
        var user1_id=$('#user1_id').val();
        var user1_accountname=$('#user1_accountname').val();
        var user2_id=conversation_selected.data('user2_id');
        var user2_accountname=conversation_selected.data('user2_accountname');
    });



    $('.text-message').keypress(function(e){ //Apretando enter
        if (e.which == 13) {
            send_message($('.send-button'));
        }
    });

    $('.send-button').click(function(){//En el envento click
        send_message($(this));
    });

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
                    $('.scroller scroll-users').html('');
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
            }, error: function(xhr, status, error) {
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
                }
                else
                    alert('ya existia');
                $('#conversation_id').val(data.id);
                
                $('.scroll-bottom').slimScroll({
                    scrollTo: $('.scroll-bottom')[0].scrollHeight
                });

            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    }

    function show_messages(){
        alert('haha');

    }



    function send_message(input){
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
                }else if(data.success == false){
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
