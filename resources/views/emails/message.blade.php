<!DOCTYPE html>
<html>
<head>
	<title>Mensaje Recibido</title>
</head>
<body>
	<h1>Saludos {{ auth()->user()->name }}</h1>
	<hr>
	<p>El correo que enviaste a {{ $msg->email_receive }}, fué enviado exitosamente</p><br>
	<p>Esperamos que sea contestado lo más antes posible</p>
</body>
</html>