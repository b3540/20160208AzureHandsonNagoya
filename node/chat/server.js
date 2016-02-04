var app = require('express')();
var http = require('http').Server(app);
var port = process.env.PORT||1337;
var io = require('socket.io')(http);

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', function(socket){
    socket.on('message',function(message){ 
        io.emit('broadcast-message',message);
    });
});

http.listen(port, function(){
  console.log('listening on *:'+port);
});
