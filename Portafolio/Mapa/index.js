var mymap = L.map('mapid').setView([9.8536, -83.9104], 16);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    accessToken: 'pk.eyJ1IjoibGoyMDUiLCJhIjoiY2s1NDQ1MXllMGZoNTNybmtzdXN3aGo5cCJ9.M5Q8I-1kHdz_vADtm7_YQg'
}).addTo(mymap);

var marker = L.marker([9.8536, -83.9104]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker1 = L.marker([9.8574, -83.9112]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker2 = L.marker([9.8550, -83.9141]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);

var polygon = L.polygon([
    [9.8536, -83.9104],
    [9.8574, -83.9112],
    [9.8550, -83.9141]
]).addTo(mymap);