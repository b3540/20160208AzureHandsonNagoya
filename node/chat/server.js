var express = require('express');
var http = require('http');
var socketio = require('socket.io');
var app = express();
var server = http.createServer(app);
var io = socketio(server);
var port = process.env.PORT||1337;

app.use(express.static('public'));

/*app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});
*/
io.on('connection', function(socket){
    socket.on('message',function(message){ 
        io.emit('broadcast-message',message);
    });
});

server.listen(port, function(){
  console.log('listening on *:'+port);
});
