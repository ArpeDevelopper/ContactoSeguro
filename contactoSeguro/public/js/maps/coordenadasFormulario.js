var lon;
var lat;

function initMap(){
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(objPosition)
		{
			lon = objPosition.coords.longitude;
			lat = objPosition.coords.latitude;

			map = new google.maps.Map(document.getElementById('mapa'), {
			  center: {lat: lat, lng: lon},
			  zoom: 16
			});
			var infoWindow = new google.maps.InfoWindow({map: map});
			var pos = {
              lat: lat,
              lng: lon
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Se encuentra aquí.');
            map.setCenter(pos);
            var marker = new google.maps.Marker({
				    map: map
				  });

            var ubicacionEvento = $('input#ubicacionEvento').val();
            if(ubicacionEvento!=''){
            	var latl = ubicacionEvento.split(",");
            	console.log(latl[0]);
            	var posicion = {lat:Number(latl[0]),lng:Number(latl[1])};
            	console.log(posicion);
            	map.setCenter(posicion);

            	marker.setPosition(posicion);
            } 
            map.addListener('click', function(e) {
	            marker.setPosition(e.latLng);
	            //console.log(marker.getPosition().toString());
	            //console.log(marker.getPosition().toJSON());
	            $("input#ubicacionEvento").val(marker.getPosition().toUrlValue());
	            console.log(marker.getPosition().toUrlValue());
	        });
// AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0 
		}, function() {
          });
	}else{
		alert("Tu navegador no soporta la geolocalización.");
		$("#mapa").html("<h3>No se pudpo cargar el mapa</h3>");
	}
}
