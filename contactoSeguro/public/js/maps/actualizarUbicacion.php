
var lon;
var lat;
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(objPosition)
		{
			lon = objPosition.coords.longitude;
			lat = objPosition.coords.latitude;

			var pos = {
              lat: lat,
              lng: lon
            };

            $.ajax({
			  method: "POST",
			  url: "'actualizar/ubicacion'?>",
			  data: { ubicacion: lat+','+lon, _token : <?=csrf_token()?>,fecha: <?=getDate()?> }
			})
			  .done(function( msg ) {
			    alert( "Data Saved: ");
			  });

// AIzaSyAjGz2gYVbF02dEl8-Bnh0jSuMY0npmTz0 
		}, function() {
          });
	}else{
		alert("Tu navegador no soporta la geolocalización.");
	}

