jQuery(function($){
    'use strict';

    var user_selected = null,

        users_list
;

    $('.scroll-users').slimScroll();

    $('.user-selected').click(function(e) {
        user_selected = $(this);
        var user2=$('#nombre-'+user_selected.data('user-id')).text();
        $('.user_conversation_title').html('Conversando con '+user2);
        
        var dataString = {
              user2: user2.trim()              
            };

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN':user_selected.data('token')},
            url: "conversations/create",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
                $('#conversation_id').val(data.id);
                $('.div_conversation').html(data.messages);
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });

    });

    $('.send-button').click(function(){
        var dataString = { 
              sender: '{{ Auth::user()->accountname }}',
              conversation_id : $("#conversation_id").val(),
              message : $('.text-message').val(),
              
            };

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN':user_selected.data('token')},
            url: "chat/store",
            data: dataString,
            dataType: "json",
            cache : false,

        });        
    });


    $('.scroll-bottom').slimScroll({
        scrollTo: $('.scroll-bottom')[0].scrollHeight
    });
});
