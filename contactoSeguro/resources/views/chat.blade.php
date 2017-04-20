<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<script type="text/javascript">
		var conn = new WebSocket('ws://localhost:8888');
		conn.onopen = function(e) {
		    console.log("Connection established!");
		};

		conn.onmessage = function(e) {
		    console.log(e.data);
		};

		function send(){
			conn.send('Hello World!');
		}
	</script>
</head>
<body>
<input type="button" onclick="send();" name="enviar" value="Enviar">
</body>
</html>