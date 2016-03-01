 var url= 'getunseen';
$(document).ready(function(){
	 GetUnseenMails();
	 GetConversationsUseen();
});

function GetUnseenMails(){	
	$.ajax({
        type: "GET",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        dataType: "json",
        timeout: 2000,
        cache : true,
        success: function(data){
        	$('#mails-unseen').html(data);
        },
        error: function(xhr, status, error) {
            url='../getunseen';
            //GetUnseenMails();
        },
        
    });
	setTimeout(GetUnseenMails, 1000*60);
}


function GetConversationsUseen(){
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

	setTimeout(GetConversationsUseen, 1000*30);
}
