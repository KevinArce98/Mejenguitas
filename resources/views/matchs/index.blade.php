@extends('layouts/app')

@section('title')
Mis Mejengas
@endsection

@section('link-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/matchsIndex.css') }}">
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<h1>Mis Mejengas</h1>
		</div>
		<div class="col-xs-6 text-right">
			<a href="{{ route('matchs.create', auth()->user()->id) }}" class="btn btn-outline-success">Crear Mejenga</a>
		</div>
	</div>
	<hr>
	<div id="containerTable">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th class="col-md-1">Nombre</th>
						<th class="col-md-3">Ubicación</th>
						<th class="col-md-1">Número Jugadores</th>
						<th class="col-md-1">Precio</th>
						<th class="col-md-1">Fecha</th>
						<th class="col-md-1">Hora</th>
						<th class="col-md-4">Información</th>
					</tr>
				</thead>
				<tbody>
					@forelse($matches as $match)
						<tr>
							<td>{{ $match->name }}</td>
							<td>{{ $match->site }}</td>
							<td>{{ $match->players }}</td>
							<td>₡ {{ $match->price }}</td>
							<td>{{ $match->convertDateToNormal($match->date) }}</td>
							<td>{{ $match->convertTimeToNormal($match->hour) }}</td>
							<td>{{ $match->info }}</td>
						</tr>
					@empty
					    <tr>
					    	<td colspan="6">No hay datos registrados</td>
					    </tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
	<div class="row text-center">
		{{ $matches->links() }}
	</div>
</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if (Session::has('sweet_alert.alert'))
	    <script>
	        swal({
			  title: "¡Genial!",
			  text: "Mejenga Creada exitosamente.",
			  icon: "success",
			  timer: 4000,
			});
	    </script>
	@endif
@endsection