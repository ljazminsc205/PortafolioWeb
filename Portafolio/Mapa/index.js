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
var marker3 = L.marker([9.8536, -83.9104]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker4 = L.marker([9.8574, -83.9112]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker5 = L.marker([9.8550, -83.9141]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker6 = L.marker([9.8536, -83.9104]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker7 = L.marker([9.8574, -83.9112]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker8 = L.marker([9.8550, -83.9141]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker9 = L.marker([9.8550, -83.9141]).bindPopup("<b>Hello world!</b><br>I am a popup.").addTo(mymap);
var marker9 = L.marker([9.8550, -83.9141]).bindPopup("<b>I am here!</b><br>I am a popup.").addTo(mymap);

var polygon = L.polygon([
    [9.83935, -83.89015],
    [9.95732, -83.87626],
    [9.9804, -83.8538],
    [9.93297, -83.88338],
    [9.8865035, -83.947397],
    [9.8912725, -83.8935526],
    [9.8360297, -83.8433803],
    [9.8186699, -83.8604253],
    [9.7689177, -83.8010824],
    [9.9727558, -83.6929656]
]).addTo(mymap);

L.Routing.control({
    waypoints: [
        L.latLng(9.8536, -83.9104),
        L.latLng(9.8574, -83.9112),
        L.latLng(9.8550, -83.9141)
    ]
}).addTo(mymap);