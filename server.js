var socket  = require( './public/node_modules/socket.io' );
var express = require('./public/node_modules/express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {
  console.log('Usuario conectado');

  socket.on( 'new_count_message', function( data ) {
    io.sockets.emit( 'new_count_message', { 
    	new_count_message: data.new_count_message

    });
  });

  socket.on( 'update_count_message', function( data ) {
    io.sockets.emit( 'update_count_message', {
    	update_count_message: data.update_count_message 
    });
  });

    socket.on( 'new_conversation', function( data ) {
    io.sockets.emit( 'new_conversation', {
      user1: data.user_1,
      user2: data.user_2,
      
      created_at: data.created_at,
      id: data.id
    });
    console.log('Nueva Conversacion %d',id);
  });


  socket.on( 'new_message', function( data ) {
    io.sockets.emit( 'new_message', {
    	sender: data.sender,
    	message: data.message,
      conversation_id: data.conversation_id,
    	created_at: data.created_at,
    	id: data.id
    });
  });
  
});
