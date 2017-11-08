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
			@forelse($messages as $message)
				<div class="br-message">
					<a href="#" class="link-message">
						<h4 class="from-name">{{ $message->user->name }}</h4>
						<h5>{{ $message->subject }}</h5>
					</a>
				</div>
			@empty
				<p>No tienes mensajes sin leer</p>
			@endforelse
		</div>
		<div class="col-md-6">
			<h3>Leídos</h3>
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