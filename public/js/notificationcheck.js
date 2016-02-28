 var url= 'getunseen';
$(document).ready(function(){

	 GetUnseenMails();
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