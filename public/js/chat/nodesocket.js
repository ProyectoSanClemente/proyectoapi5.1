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
		$('.div_conversation').append('<div class="bg-success">'+data.sender+': '+data.message+'<span class=pull-right>'+'enviado a las'+data.created_at+'</span></div>');        
		scroll();
	}

	if(data.conversation2_id==$("#conversation_id").val()){
		$('.div_conversation').append('<div class="bg-warning">'+data.sender+': '+data.message+'<span class=pull-right>'+'enviado a las'+data.created_at+'</span></div>');
		scroll();
	}

	if($('#accountname').val()==data.user1_accountname)
		$('#notif_audio')[0].play();
	if($('#accountname').val()==data.user2_accountname)
		$('#notif_audio')[0].play();
});