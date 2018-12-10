var io = require('socket.io')(6001)
console.log('connection to port 6001')
io.on('error',function(socket){
    console.log('error')
})
io.on('connection', function(socket){
    console.log('Co nguoi vua ket noi'+socket.id)
})
var Redis = require('ioredis')
var redis = new Redis(1000)
redis.psubscribe("*", function(error, count){
    //
})
redis.on('pmessage', function(partner, channel, message){
    console.log(channel)
    console.log(message)
    console.log(partner)
})

// var app = require('express')();
// var server = require('http').Server(app);
// var io = require('socket.io')(server);
// var redis = require('redis');
 
// server.listen(8890);
// io.on('connection', function (socket) {
 
//   console.log("new client connected");
//   var redisClient = redis.createClient();
//   redisClient.subscribe('message');
 
//   redisClient.on("message", function(channel, message) {
//     console.log("mew message in queue "+ message + "channel");
//     socket.emit(channel, message);
//   });
 
//   socket.on('disconnect', function() {
//     redisClient.quit();
//   });
 
// });