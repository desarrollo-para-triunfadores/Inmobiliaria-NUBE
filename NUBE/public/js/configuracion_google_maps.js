function instanciar_mapa() {//Mapa usado en la sección de ubicación
    
    console.log("marcador");
    
console.log(marcador);

    $("#latitud").val(marcador.lat);
    $("#longitud").val(marcador.lng);
   
       var map = new google.maps.Map(document.getElementById('map'), {//instancio mapa
           zoom: 12,
           center: marcador,
           mapTypeId: google.maps.MapTypeId.TERRAIN
       });
       var marker = new google.maps.Marker({//instancio marcador
           map: map,
           draggable: true,
           animation: google.maps.Animation.DROP,
           position: marcador
       });
       marker.addListener('dragend', function () { //este es el evento que detecta las coordenadas al mover el marcador y setea los inputs ocultos en en el form.
           $("#latitud").val(marker.getPosition().lat());
           $("#longitud").val(marker.getPosition().lng());
       });
       marker.addListener('click', toggleBounce);
   }
   
   
   function toggleBounce() { //función para la animación del marcador
     if (marker.getAnimation() !== null) {
         marker.setAnimation(null);
     } else {
         marker.setAnimation(google.maps.Animation.BOUNCE);
     }
   }