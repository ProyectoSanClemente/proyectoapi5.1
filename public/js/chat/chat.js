$(document).ready(function(){
    
    $('.scroll-users').slimScroll();

    $('.user-selected').click(function(e){
        user_selected = $(this);
        var user2=$('#nombre-'+user_selected.data('user-id')).text();
        $('.user_conversation_title').html('Conversando con '+user2);
        
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
                $('.div_conversation').html(data.messages);
                
                $('.scroll-bottom').slimScroll({
                    scrollTo: $('.scroll-bottom')[0].scrollHeight
                });

            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });

    });

    $('.send-button').click(function(){
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
                var conversa=$('.div_conversation').html();
                $('.div_conversation').html(conversa+data.message);
                $('.scroll-bottom').slimScroll({
                    scrollTo: $('.scroll-bottom')[0].scrollHeight
                });
            },

        });
    });
    

});
