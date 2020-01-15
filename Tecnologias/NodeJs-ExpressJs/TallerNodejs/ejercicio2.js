const http = require('http');

const handleServer = function (req, res){
    res.writeHead(200, {'Content-type':'text/html' }); //Código de estado
    res.write('<h1>Hola Mundo desde Nodejs</h1>');
    res.end();
}

const server = http.createServer(handleServer);

server.listen(3000, function(){
    console.log('Server on port 3000');
})