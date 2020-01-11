var map = L.map('map', {
    center: [10.0, 5.0],
    minZoom: 2,
    zoom: 3
});

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/satellite-streets-v11',
    accessToken: 'pk.eyJ1IjoibGoyMDUiLCJhIjoiY2s1NDQ1MXllMGZoNTNybmtzdXN3aGo5cCJ9.M5Q8I-1kHdz_vADtm7_YQg'
}).addTo(map);



var myIcon = L.icon({
    iconUrl: 'icon4.png',
    iconRetinaUrl: 'icon4.png',
    iconSize: [29, 24],
    iconAnchor: [9, 21],
    popupAnchor: [0, -14]
});

var markerClusters = L.markerClusterGroup();


function loadJSON(callback) {

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'destinos2.json', false); // Replace 'my_data' with the path to your file
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
    markers = JSON.parse(response);
});


for (var i = 0; i < markers.length; ++i) {
    var popup = markers[i].nombre;

    var m = L.marker([markers[i].coordenadas[0], markers[i].coordenadas[1]], { icon: myIcon })
        .bindPopup(popup);

    markerClusters.addLayer(m);
}


map.addLayer(markerClusters);