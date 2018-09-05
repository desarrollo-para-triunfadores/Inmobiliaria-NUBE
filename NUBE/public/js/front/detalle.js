/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var map;

function initMap() {
    console.log("swsw");
    map = new google.maps.Map(document.getElementById('map'), {
        center: marcador,
        zoom: 15
    });

    var marker = new google.maps.Marker({
        position: marcador,
        map: map,
        title: 'Hello World!'
    });

//    marker.addListener('click', toggleBounce);
}




