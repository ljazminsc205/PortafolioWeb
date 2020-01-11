var mymap = L.map('mapid', {
    center: [10.0, 5.0],
    minZoom: 4,
    zoom: 4
}).setView([9.8536, -83.9104], 7.9);
// 

// var mymap = L.map('mapid').fitWorld();
// mymap.locate({ setView: true, maxZoom: 16 });

// var marker = L.marker([9.8536, -83.9104]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1IjoibGoyMDUiLCJhIjoiY2s1NDQ1MXllMGZoNTNybmtzdXN3aGo5cCJ9.M5Q8I-1kHdz_vADtm7_YQg'
}).addTo(mymap);


function loadJSON(callback) {

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'destinos.json', false); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function() {
        if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}
var destinos = [];
loadJSON(function(response) {
    // Parse JSON string into object
    destinos = JSON.parse(response);
});

var listaDestinos = [];
var ruta = [];

destinos.forEach(destino => {
    console.log(destino.coordenadas)
    L.marker(destino.coordenadas).bindPopup(`<b>${destino.nombre}</b>`).addTo(mymap);
    listaDestinos.push(destino.coordenadas);
    ruta.push(L.latLng(destino.coordenadas[0], destino.coordenadas[1]));
})

var recorrido = L.polygon(listaDestinos).addTo(mymap);
L.Routing.control({ waypoints: ruta }).addTo(mymap);

// console.log(destinos);
// console.log(destinos[1])
// console.log(destinos[1].nombre)

// var polygon = L.polygon([
//     [9.83935, -83.89015],
//     [9.95732, -83.87626],
//     [9.9804, -83.8538],
//     [9.93297, -83.88338],
//     [9.8865035, -83.947397],
//     [9.8912725, -83.8935526],
//     [9.8360297, -83.8433803],
//     [9.8186699, -83.8604253],
//     [9.7689177, -83.8010824],
//     [9.9727558, -83.6929656]
// ]).addTo(mymap);

// L.Routing.control({
//     waypoints: [
//         L.latLng(9.8536, -83.9104),
//         L.latLng(9.8574, -83.9112),
//         L.latLng(9.8550, -83.9141)
//     ]
// }).addTo(mymap);