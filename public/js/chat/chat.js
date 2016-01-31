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
        $('.div_conversation').html('<div class="center" style="line-height:350px">'+user_selected.data('user-url')+'</div>');

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
        });
    });

    $('.scroll-bottom').slimScroll({
        scrollTo: $('.scroll-bottom')[0].scrollHeight
    });
});
