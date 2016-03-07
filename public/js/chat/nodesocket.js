var url='10.128.2.59';
var socket = io.connect( 'http://'+window.location.hostname+':3000' );


socket.on('new_message', function( data ) {
	if($('.div_conversation').text()=='Aun no hay mensajes enviados')
		$('.div_conversation').html('');//cls
	
	var sender=data.sender;
	var created_at=data.created_at;
	var message='<div style="font-size: 13pt">'+data.message+'</div>'; //HTML to plain text
	
	if(data.conversation_id==$("#conversation_id").val()){
		printmessage('right','me',sender,created_at,message);
		scroll();
	}

	if(data.conversation2_id==$("#conversation_id").val()){		
		printmessage('left','you',sender,created_at,message);
     	scroll();
	}

	if(data.user2_accountname==$('#accountname').val()){
		$('#notif_audio')[0].play();
		//$('#notif_zumbido')[0].play();

	    var dataString = {
	        accountname: $('#accountname').val()
	    };
		$.ajax({
	 		type: "POST",
	        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        url: "chat/getunseen",
	        data: dataString,
	        dataType: "json",
	        cache : false,
	        success: function(data){
	        	$('#conversation-unseen').html(data);
	        },
	        error: function(xhr, status, error) {
	            
	        },        
    	});

		show_conversations();
	}




});