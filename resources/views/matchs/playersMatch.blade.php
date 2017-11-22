@extends('layouts.app')

@section('title')
Jugadores
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2>Jugadores de la mejenga "{{ $match->name }}"</h2>
		<hr>
	</div>
	<div class="row">
		<div id="containerTable">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						@forelse($match->users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone ? $user->phone : 'No tiene teléfono registrado' }}</td>
								<td>
									@if(auth()->user()->id != $user->id)
										<form action="{{ route('matchs.pushOut', ['match' => $match, 'id' => $user->id]) }}" method="post">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-outline-danger btn-sm">Expulsar</button>
											
										</form>
									@endif
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">No hay jugadores unidos a ésta mejenga</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection