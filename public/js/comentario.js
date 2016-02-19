// $(document).ready(function(){
//  //    $('#post').click(function() {
//  //        $('#error').hide();
//  //    });
//  //        // body...
// 	// $('.send-button').click(function(){//En el envento click
//  //    if ($('#contenido').val()=="" ){
//  //            $('#error').show();
//  //            return false;
//  //        }
//  //    send_post($(this));
//  //    $('#modal-id').modal('toggle');
//  //    $('#muro').load( "#muro" );
// 	// });
//  //    refreshTable();
// });

// // function refreshTable(){
// //     $('#muro').load(" #muro", function(){
// //        setTimeout(refreshTable, 3000);
// //     });
// // }

	

// function send_comentario(input){
    
//     var dataString = {
//         contenido: $('#contenido').val(),
//     };
//     $.ajax({
//         type: "POST",
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         url: "comentarios/store",
//         data: dataString,
//         dataType: "json",
//         cache : false,
//         success: function(data){
//             if(data.success == true){
//                 $('#contenido').val('');

//                 /*var socket = io.connect( 'http://'+window.location.hostname+':3000');
//                 socket.emit('new_message',{ 
//                     titulo: data.titulo,
//                     contenido: data.contenido,
//                     tipo  : data.tipo,
//                     id_usuario : data.id_usuario,
//                     created_at: data.created_at,
//                     updated_at: data.updated_at
//                 });*/



//             }else if(data.success == false){
//                 if($('.text-message').val()==''){
//                     alert('Mensaje Vacio')
//                 }
//                 if($('#conversation_id').val()==''){
//                     alert('Se debe escoger alguien con quien conversar')
//                 }
//                 $("#message").val(data.message);
//                 $("#notif").html(data.notif);
//             }

//         } ,error: function(xhr, status, error) {
//             alert('Has sido desconectado del servidor');
//         },

//     });
// }

