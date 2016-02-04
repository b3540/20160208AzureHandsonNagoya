var express = require('express');
var http = require('http');
var socketio = require('socket.io');
var app = express();
var server = http.createServer(app);
var io = socketio(server);
var port = process.env.PORT||1337;
var usercount = 0;

app.use(express.static('public'));

/*app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});
*/
io.on('connection', function(socket){
    socket.on('login',function(name){
        usercount++;
        var data = {
            name:name,
            count:usercount
        };
        io.emit('broadcast-login',data);
        
    });
    socket.on('message',function(data){ 
        io.emit('broadcast-message',data);
    });
    socket.on('logout',function(name){
        usercount--;
        var data = {
            name:name,
            count:usercount
        };
        io.emit('broadcast-logout',data);
    });
});

server.listen(port, function(){
  console.log('listening on *:'+port);
});
