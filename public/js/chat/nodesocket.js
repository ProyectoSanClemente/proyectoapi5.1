var socket = io.connect( 'http://'+window.location.hostname+':3000' );

socket.on( 'new_count_message', function( data ) {
    $( "#new_count_message" ).html( data.new_count_message );
    $('#notif_audio')[0].play();
});

socket.on( 'update_count_message', function( data ) {
    $( "#new_count_message" ).html( data.update_count_message );
});

socket.on('new_conversation',function(data){
	//
});

socket.on('new_message', function( data ) {
	if($('.div_conversation').text()=='Aun no hay mensajes enviados')
		$('.div_conversation').html('');//cls 

	var message='<div style="font-size: 13pt">'+data.message.replace(/<[^>]*>/g, '')+'</div>'; //HTML to plain text

	if(data.conversation_id==$("#conversation_id").val()){
		$('.div_conversation').append(
                $('<row/>',{
                    class: 'col-md-9 pull-left'
                }).append(
                $("<div/>",{
                    class: 'bubble me'
                }).append(data.sender+' dice:'+'<span class="pull-right"> enviado:'+data.created_at+'</span>'+'<br>'+message)
            )
        )
		scroll();
		//show_messages();
	}

	if(data.conversation2_id==$("#conversation_id").val()){
		$('.div_conversation').append(
                $('<row/>',{
                    class: 'col-md-9 pull-right'
                }).append(
                $("<div/>",{
                    class: 'bubble you'
                }).append(data.sender+' dice:'+'<span class="pull-right"> enviado:'+data.created_at+'</span>'+'<br>'+message)
            )
        )
		scroll();
		//show_messages();
		$('#notif_audio')[0].play();
	}



});