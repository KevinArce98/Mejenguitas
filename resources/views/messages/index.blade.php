@extends('layouts/app')

@section('title')
 Mis Mensajes
@endsection
@section('content')
<div class="container">
	<div class="row text-right">
		<a href="{{ route('message.create') }}" class="btn btn-outline-danger">Nuevo Mensaje</a>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>No Leídos</h3>
			@forelse($messagesUnread as $message)
				<div class="notice notice-warning">
					<a href="{{ route('message.show', $message->id) }}" class="link-message">
						<h4 class="from-name">{{ $message->user->name }}</h4>
						<hr>
						<h5 class="subject-message"><span class="subject-color">Asunto:</span> {{ $message->subject }}</h5>
					</a>
					<div class="options-messages">
						<form action="{{ route('message.markAsRead', ['id' => $message->id, 'read' => 1]) }}" method="post">
							{{ csrf_field() }}
							<button type="submit" class="btn btn-sm btn-info">Marcar como leído</button>
						</form>
						<form action="{{ route('message.destroy', $message->id) }}" method="post" class="ml">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			@empty
				<p>No tienes mensajes sin leer</p>
			@endforelse
		</div>
		<div class="col-md-6">
			<h3>Leídos</h3>
			@forelse($messagesRead as $message)
				<div class="notice notice-info">
					<a href="{{ route('message.show', $message->id) }}" class="link-message">
						<h4 class="from-name">{{ $message->user->name }}</h4>
						<hr>
						<h5 class="subject-message"><span class="subject-color">Asunto:</span> {{ $message->subject }}</h5>
					</a>
					<div class="options-messages">
						<form action="{{ route('message.markAsUnRead', ['id' => $message->id, 'read' => 0]) }}" method="post">
							{{ csrf_field() }}
							<button type="submit" class="btn btn-sm btn-warning">Marcar como no leído</button>
						</form>
						<form action="{{ route('message.destroy', $message->id) }}" method="post" class="ml">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			@empty
				<p>No tienes mensajes leídos</p>
			@endforelse
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if (Session::has('sweet_alert.alert'))
	    <script>
	        swal({
			  title: "¡Genial!",
			  text: "Mensaje Enviado exitosamente.",
			  icon: "success",
			  timer: 4000,
			});
	    </script>
	@endif
@endsection