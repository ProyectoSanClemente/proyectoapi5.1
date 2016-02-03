var socket = io.connect( 'http://'+window.location.hostname+':3000' );

socket.on( 'new_count_message', function( data ) {
    $( "#new_count_message" ).html( data.new_count_message );
    $('#notif_audio')[0].play();
});

socket.on( 'update_count_message', function( data ) {
    $( "#new_count_message" ).html( data.update_count_message );
});

socket.on( 'new_message', function( data ) {
	if(data.conversation_id==$("#conversation_id").val()){

		if(data.sender==$('#accountname').val()){
			$('.div_conversation').append('<p class="bg-success">'+data.sender+': '+data.message+'</p>');        
		}
		else{
			$('.div_conversation').append('<p class="bg-warning">'+data.sender+': '+data.message+'</p>');    
		}
        $('.scroll-bottom').slimScroll({
        scrollTo: $('.scroll-bottom')[0].scrollHeight
        });

	    //$( "#message-tbody" ).prepend('<tr><td>'+data.sender+'</td><td>'+data.message+'</td><td>'+data.created_at+'</td><td>'+data.conversation_id+'</td>');
	    //$( "#no-message-notif" ).html('');
	    //$( "#new-message-notif" ).html('<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nuevo ...</div>');
	
	}
});