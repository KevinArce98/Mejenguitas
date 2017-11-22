@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Mensaje</h1>
		<hr>
		<div class="row">
			<div class="msg-panel">
				<h2>Enviado por {{ $message->user->name }}</h2>
				<h3>Asunto: {{ $message->subject }}</h3>
				<textarea rows="5" class="form-control" readonly="">{{ $message->body }}</textarea>
			</div>
			<a href="{{ route('message.create') }}" class="btn btn-success">Responder</a>
		</div>
	</div>
@endsection