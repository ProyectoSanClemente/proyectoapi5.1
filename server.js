var socket  = require( './public/node_modules/socket.io' );
var express = require('./public/node_modules/express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen(server);
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Escuchando en el puerto: %d', port);
});


io.on('connection', function (socket) {

  socket.on( 'new_message', function( data ) {
    io.sockets.emit( 'new_message', {
    	sender: data.sender,
      user2_accountname: data.user2_accountname,
    	message: data.message,
      conversation_id: data.conversation_id,
      conversation2_id: data.conversation2_id,
    	created_at: data.created_at
    });
  });

  socket.on( 'send_post', function( data ) {
    io.sockets.emit( 'send_post', {
      sender: data.sender,
      titulo: data.titulo,
      contenido: data.contenido,
      tipo  : data.tipo,
      id_usuario : data.id_usuario,
      created_at: data.created_at,
      updated_at: data.updated_at
  });

});
