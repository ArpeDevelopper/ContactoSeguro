var lon;
var lat;

function initMap(){
	var ubicacion = $('span#ultimaUbicacion').html();
            if(ubicacion!=''){
            	var latl = ubicacion.split(",");
            	var posicion = {lat:Number(latl[0]),lng:Number(latl[1])};
            	lon = Number(latl[1]);
				lat = Number(latl[0]);

			map = new google.maps.Map(document.getElementById('mapa'), {
			  center: {lat: lat, lng: lon},
			  zoom: 16
			});
			var infoWindow = new google.maps.InfoWindow({map: map});

            infoWindow.setPosition(posicion);
            infoWindow.setContent('Se encuentra aquí.');
            map.setCenter(posicion);
            }else{
            	var clase = $("#mapa").attr("class");
            	$("#mapa").attr("class",clase+' bg-warning');
            	$("#mapa").attr("class",clase+' bg-warning');
            	$("#mapa").html("<h3 style='padding:30px;'>No se ha registrado alguna ubicación</h3>");
            }
			
// AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0 
}
