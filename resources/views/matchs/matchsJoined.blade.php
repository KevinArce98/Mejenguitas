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
	        <div class="col-md-4">
	            <form action="#" method="POST" role="form" class="form-inline">
	                <h3>Buscar en mis mejengas</h3>
	                <label class="radio-inline"><input type="radio" name="optradio" checked>Nombre</label>
					<label class="radio-inline"><input type="radio" name="optradio">Ubicación</label>
					<label class="radio-inline"><input type="radio" name="optradio">Fecha</label>
					<div id="nameDiv">
						<div class="form-group top bottom">
		                    <label for="name" class="control-label">Nombre</label>
		                    <input type="text" class="form-control" id="name" name="name" placeholder="Filtar Nombres">
		                </div>
					</div>
	                <div id="siteDiv">
						<div class="form-group top bottom">
		                    <label for="site" class="control-label">Ubicación</label>
		                    <input type="text" class="form-control" id="site" name="site" placeholder="Filtar Ubicación">
		                </div>
					</div>
					 <div id="dateDiv">
						<div class="form-group top bottom">
							<label for="date" class="control-label">Fecha:</label>
							<div class="input-group date">
							  <input type="text" class="form-control" name="date" value="{{ date("d/m/Y") }}"><span class="input-group-addon" readonly><i class="fa fa-calendar" aria-hidden="true"></i></span>
							</div>
						</div>
					</div>
	                <div class="form-group">
	                    <button type="submit" class="btn btn-outline-info">Buscar</button>
	                </div>
	            </form>
	        </div>
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

