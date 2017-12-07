<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Mensaje</title>
</head>
<body>
	<h1>Saludos {{ $msg->email_receive }}</h1>
	<hr>
	<p>{{ $msg->body }}</p>
</body>
</html>