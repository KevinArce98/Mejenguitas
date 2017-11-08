@extends('layouts/app')

@section('content')
<div class="container">
	<h1>Enviar Nuevo Mensaje</h1>
	<hr>
	<div class="row">
		<form action="{{ route('message.store') }}" method="POST" role="form" class="col-sm-6 col-sm-offset-3">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="email_receive" class="control-label">Para:</label>
				<input type="email" class="form-control" id="email_receive" name="email_receive" placeholder="Persona que va recibir el mensaje" autofocus>
			</div>
			<div class="form-group">
				<label for="subject" class="control-label">Asunto</label>
				<input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto del mensaje">
			</div>
			<div class="form-group">
				<label for="body" class="control-label">Mensaje</label>
				<textarea rows="5" class="form-control" id="body" name="body"></textarea>
			</div>
			<button type="submit" class="btn btn-success">Enviar</button>
		</form>	
	</div>
	
</div>
@endsection