@extends('layouts.app')

@section('title')
	Mis Mejenguitas
@endsection

@section('link-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
@endsection
 	
@section('content')
	<div class="container">
		<div class="row">
			@if(isset($doIt))
				<div class="{{ $doIt ? 'alert-success ' : 'alert-danger ' }} text-center">
					@if($doIt)
						Se ha eliminado la mejenga de tu lista	
					@else
						No se ha podido eliminar la mejenga de tu lista
						***La mejenga está a 30min o menos, o ya ha iniciado***	
					@endif
				</div>
			@endif
		</div>
		<div class="row">
	            <h2>Mejengas Unido</h2>
	        <hr>
	    </div>
	    <div class="row top">
	    	<p class="help-text">Selecciona una mejenga para ver más detalles.</p>
	    	<div class="table-responsive">
	    		<table class="table table-hover">
	    			<thead class="thead-dark">
	    				<tr>
	    					<th>Nombre</th>
	    					<th>Fecha</th>
	    					<th>Hora</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@forelse($matchs as $match)
							<tr id="{{ $match->id }}" href="{{ route('matchs.show', $match->id) }}">
		    					<td>{{ $match->name }}</td>
		    					<td>{{ $match->convertDateToNormal($match->date) }}</td>
		    					<td>{{ $match->convertTimeToNormal($match->hour) }}</td>
		    				</tr>
	    				@empty
		    				<tr>
		    					<td colspan="3">No hay registros</td>
		    				</tr>
	    				@endforelse
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>
@endsection

@section('scripts')
	<script>
		$('#nameDiv').css('display', 'block');
		$('#siteDiv').css('display', 'none');
		$('#dateDiv').css('display', 'none');


		$(document).on('change', '.radio-inline', function() {
		    console.log(this.innerText);

		    $('.active').attr('class', '');
		    $('#nameDiv').css('display', 'none');
		    $('#siteDiv').css('display', 'none');
		    $('#dateDiv').css('display', 'none');
		    $('#name').val('');
		    $('#date').val('');
		    $('#site').val('');

		    switch(this.innerText) {
			    case 'Nombre':
				        $('#nameDiv').css('display', 'block');
			        break;
			    case 'Ubicación':
			            $('#siteDiv').css('display', 'block');
			        break;
			    case 'Fecha':
			       		$('#dateDiv').css('display', 'block');
			        break;
			    default:
			        
			}
		});
	</script>

	<script type="text/javascript" src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
	<script type="text/javascript">
		$('.form-group .input-group.date').datepicker({
		    format: "dd/mm/yyyy",
		    todayBtn: "linked",
		    language: "es",
		    orientation: "bottom auto",
		    autoclose: true
		});
	</script>
	<script src="{{ asset('js/home.js') }}"></script>
@endsection

