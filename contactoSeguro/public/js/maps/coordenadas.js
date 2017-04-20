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
// AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0 
		}, function() {
          });
	}else{
		alert("Tu navegador no soporta la geolocalización.");
		$("#mapa").html("<h3>No se pudpo cargar el mapa</h3>");
	}
}
