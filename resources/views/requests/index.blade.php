@extends('layouts/app')

@section('title')
Solicitudes
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Solicitudes para ser administrador</h2>
			<hr>
	</div>

			<p class="text-info" id="textTitle">Solicitudes que han enviado:</p>
	
		<div class="row" id="containerTable">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead class="thead-light">
						<tr>
							<th>Correo</th>
							<th>Nombre</th>
							<th>Mensaje</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($requests as $request)
							<tr @switch($request->status)
							    @case('C')
							        class="table-success" 
							        @break
							    @case('D')
							        class="table-danger" 
							        @break 
							@endswitch>
								<td>{{ $request->email }}</td>
								<td>{{ $request->name }}</td>
								<td>{{ $request->message}}</td>

								<td>
									<div class="accions">
										<div class="row">

												<form action="{{ route('requests.update', $request->email) }}" method="post" >
													{!! method_field('PUT') !!}
													{{ csrf_field() }}
													<input type="hidden" name="status" value="C">
													<button type="submit" name="confirm" class="btn btn-success btn-xs"
														@if($request->status === 'C' || $request->status === 'D')
														{{' disabled'}}
														@endif>
														<i class='fa fa-check' aria-hidden='true'></i>
													</button>
												</form>
												<form action="{{ route('requests.update', $request->email) }}" method="post">
													{!! method_field('PUT') !!}
													{{ csrf_field() }}
													<input type="hidden" name="status" value="D">
													<button type="submit" name="dismiss" class="btn btn-danger btn-xs"
														@if($request->status === 'C' || $request->status === 'D')
														{{' disabled'}}
														@endif>
														<i class='fa fa-times' aria-hidden='true'></i>
													</button>
												</form>

										</div>
									</div>
								</td>
							</tr>
					    @empty
					    <tr>
					    	<td colspan="4">No hay datos registrados</td>
					    </tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	
</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if (Session::has('sweet_alert.alert'))
	    <script>
	        swal({
			  title: "¡Info!",
			  text: "Status cambiado.",
			  icon: "success",
			  timer: 3000,
			});
	    </script>
	@endif
@endsection