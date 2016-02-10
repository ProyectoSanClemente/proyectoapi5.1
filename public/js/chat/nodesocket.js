var socket = io.connect( 'http://'+window.location.hostname+':3000' );

socket.on('new_message', function( data ) {
	if($('.div_conversation').text()=='Aun no hay mensajes enviados')
		$('.div_conversation').html('');//cls 

	var sender=data.sender;
	var created_at=data.created_at;
	var message='<div style="font-size: 13pt">'+data.message.replace(/<[^>]*>/g, '')+'</div>'; //HTML to plain text
	if(data.conversation_id==$("#conversation_id").val()){
		printmessage('right','me',sender,created_at,message);
		scroll();
	}

	if(data.conversation2_id==$("#conversation_id").val()){		
		printmessage('left','you',sender,created_at,message);
     	scroll();
	}

	if(data.user2_accountname==$('#user1_accountname').val()){
		$('#notif_audio')[0].play();
		show_conversations();
	}

});

