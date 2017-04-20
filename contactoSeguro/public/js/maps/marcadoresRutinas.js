$(function(){
	var map = new google.maps.Map(document.getElementById('mapa'), {
			  center: {lat: 23.7144778, lng: -100.9222183},
			  zoom: 6
			});

	$(".verMapa").click(function(){
		var ubicacion = $(this).parent("td").children("span.ubicacion").html();
		if(ubicacion!=''){

			var latl = ubicacion.split(",");
            var posicion = {lat:Number(latl[0]),lng:Number(latl[1])};

            

			map.setCenter(posicion);
			map.setZoom(16);
			var marker = new google.maps.Marker({
			    map: map
			});

			marker.setPosition(posicion);
		}
	});
});


