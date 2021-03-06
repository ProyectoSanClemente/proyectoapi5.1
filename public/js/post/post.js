$(document).ready(function(){

    $("#contenido").on('keyup change input',function(e) {
      var source = $('#contenido').val();
      var preview = emojione.toImage(source);
      $('#contenido').html(preview);
    });

    $('#post').click(function() {
        $('#error').hide();
    });
        // body...

	$('.send-button').click(function(){//En el envento click
        if ($('#titulo').val()=="" || $('#contenido').val()=="" ){
                $('#error').show();
                return false;
            }
        //send_post($(this));
        var input = $('#contenido').val();
        var output = emojione.shortnameToImage(input);
        $('#contenido').val(output);
        $('#modal-id').modal('toggle');
        $('#muro').load( " #muro" );
	});

    $('#modal-comentario').on('show.bs.modal',function (e){
        var id = $(e.relatedTarget).data('post-id');
        $('#id_post').val(id);
        $('#modal-comentario').animate({ scrollTop: 0 }, 'slow');
        show_comentarios($(this));
        $('#muro').load( " #muro" )
    });

    $('.send-comentario').click(function(){//En el envento click
        if ($('#contenido2').val()==""){
            return false;
            }
        send_comentario($(this));
        $('#modal-comentario').modal('toggle');
        $('#muro').load(" #muro");
    });
    $('.goto-anchor-top').click(function(){
        $('#modal-comentario').animate({ scrollTop: 1123123 }, 'slow');
    });
    
    refreshTable();
});

function refreshTable(){
    $('#muro').load(" #muro", function(){
       setTimeout(refreshTable, 3000);
    });
}

function refreshComentario () {
    $('modal-comentario').find('.comentarios').load('modal-comentario').find('.comentarios',function(){
     setTimeout(refreshComentario,1000);
    });
}


function send_post(input){
    var input = $('#contenido').val();
    var output = emojione.shortnameToImage(input);
    $('#contenido').val(output);
    var dataString = {
        titulo: $('#titulo').val(),
        contenido: $('#contenido').val(),
        tipo: $('#tipo').val(),
        id_usuario  : $('#id_usuario').val(),
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "posts/store",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            if(data.success == true){
                $('#titulo').val('');
                $('#contenido').val('');

                var socket = io.connect( 'http://'+window.location.hostname+':3000');
                socket.emit('send_post',{ 
                    titulo: data.titulo,
                    contenido: data.contenido,
                    tipo  : data.tipo,
                    id_usuario : data.id_usuario,
                    created_at: data.created_at,
                    updated_at: data.updated_at
                });



            }else if(data.success == false){
                if($('.text-message').val()==''){
                    alert('Mensaje Vacio')
                }
                if($('#conversation_id').val()==''){
                    alert('Se debe escoger alguien con quien conversar')
                }
                $("#message").val(data.message);
                $("#notif").html(data.notif);
            }

        } ,error: function(xhr, status, error) {
            alert('Has sido desconectado del servidor');
        },

    });
}

function show_comentarios(modal){
    var dataString = {
        id_post:$('#id_post').val()
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "comentarios/show_comentarios",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            modal.find(".comentarios").html('');
            for (i = 0; i < data.length; i++) {
                var usuario=data[i].usuario;
                var nombre=usuario.nombre+' '+usuario.apellido+' ';
                var imagen=usuario.imagen;
                var contenido=data[i].contenido;
                var created_at=data[i].created_at;
                modal.find(".comentarios").prepend(
                    $("<row/>", {
                        class: 'row'
                    }).append(
                        $("<div/>",{
                            class: 'col-sm-1 thumbnail'
                        }).append(
                            $("<img/>",{
                                class: "img-responsive user-photo",
                                src: imagen
                            })
                        ),
                        $("<div/>",{
                            class: "col-sm-11"
                        }).append(
                            $("<div/>",{
                                class: "panel panel-default"
                            }).append(
                                $("<div/>",{
                                    class: "panel-heading"
                                }).append(
                                    $("<strong/>",{
                                        style: "color:black"
                                    }).append(
                                        nombre,
                                        $("<span/>",{
                                            class: "text-muted"
                                        }).append(
                                            created_at
                                        )
                                    )
                                ),
                                $("<div/>",{
                                    class: "panel-body"
                                }).append(
                                contenido
                                )

                            )

                        )

                    ) //end row
                                   
                ) //end append modal
            }//endfor
        }
    });
}

function send_comentario(input){
    var input = $('#contenido2').val();
    var output = emojione.shortnameToImage(input);
    $('#contenido2').val(output);
    var dataString = {
        contenido: $('#contenido2').val(),
        id_usuario:$('#id_usuario').val(),
        id_post:$('#id_post').val()
    };
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "comentarios/store",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){
            if(data.success == true){
                $('#contenido2').val('');

                /*var socket = io.connect( 'http://'+window.location.hostname+':3000');
                socket.emit('new_message',{ 
                    titulo: data.titulo,
                    contenido: data.contenido,
                    tipo  : data.tipo,
                    id_usuario : data.id_usuario,
                    created_at: data.created_at,
                    updated_at: data.updated_at
                });*/



            }else if(data.success == false){
                if($('.text-message').val()==''){
                    alert('Mensaje Vacio')
                }
                if($('#conversation_id').val()==''){
                    alert('Se debe escoger alguien con quien conversar')
                }
                $("#message").val(data.message);
                $("#notif").html(data.notif);
            }

        } ,error: function(xhr, status, error) {
            alert('Has sido desconectado del servidor');
        },

    });
}