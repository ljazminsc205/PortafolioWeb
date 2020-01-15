const express = require('express');
const app = express();


app.set('views',__dirname + '/views');
app.set('view engine', 'ejs');

app.use(function(req, res, next){
    console.log('request url: ' + req.url);
    next();
});

app.get('/', (req, res) => {
    res.render('index.ejs');
});

app.get('/image', (req, res) => {
    res.render('Image.ejs');
});

app.get('*', (req, res) => {
    res.end('Ruta no encontrada');
});

app.listen(3001, function(){
    console.log('servidor funcionando! En el puerto 3001');
});