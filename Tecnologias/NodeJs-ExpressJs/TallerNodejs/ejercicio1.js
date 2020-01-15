const fs = require('fs');

fs.readFile('./texto.txt',function(err, data){
    if(err){
        console.log(err);
    }

    const dataSTRING = data.toString();
    var dataJSON = JSON.parse(dataSTRING);
    console.log(dataSTRING);
    console.log(dataJSON);
})