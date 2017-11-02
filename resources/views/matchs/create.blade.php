@extends('layouts/app')


@section('link-css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/clockpicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('libs/datepicker/css/bootstrap-datepicker.min.css') }}">
@endsection


@section('content')
<div class="container">	
	<h2>Crear Mejenga</h2>
	<hr>
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
			    <li>{{ $error }}</li>
			    @endforeach
			</ul>
		</div>
	@endif
<form action="{{ route('matchs.store') }}" method="POST" role="form">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
	</div>
	<div class="form-group">
		<label for="players" class="control-label">Jugadores:</label>
		<input type="number" class="form-control" id="players" placeholder="Jugadores" min="1" value="{{ old('players') }}" name="players" required>
	</div>

	<div class="form-group">
		<label for="price" class="control-label">Precio Por Jugador:</label>
		<input type="number" class="form-control" id="price" placeholder="Precio" min="1" name="price" value="{{ old('price') }}" required>
	</div>
	<div class="form-group">
		<label for="hour" class="control-label">Hora:</label>
		<div class="input-group clockpicker">
			<input type="text" class="form-control" value="{{ date("h:iA") }}"  name="hour" readonly>
			<span class="input-group-addon">
			<i class="fa fa-clock-o" aria-hidden="true"></i>
			</span>
		</div>
	</div>
	<div class="form-group">
		<label for="date" class="control-label">Fecha:</label>
		<div class="input-group date">
		  <input type="text" class="form-control" name="date" value="{{ date("d/m/Y") }}"><span class="input-group-addon" readonly><i class="fa fa-calendar" aria-hidden="true"></i></span>
		</div>
	</div>
	<div class="form-group">
		<label for="site" class="control-label">Lugar:</label>
		<input id="site" name="site" type="text" class="form-control" placeholder="Busqueda de la ubicación" value="{{ old('date') }}" required>
	</div>
	<div class="form-group">
		<div style="width: 100%; height: 420px;" id="map-canvas"></div>
		<input type="hidden" name="lng" id="lng" value="{{ old('lng') }}" readonly="">
		<input type="hidden" name="lat" id="lat" value="{{ old('lat') }}" readonly="">
	</div>
	<div class="form-group">
		<label for="info" class="control-label">Información Adicional</label>
        <textarea id="info" name="info" type="text" class="form-control" rows="5" value="{{ old('info') }}"></textarea>
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-outline-primary">Crear Mejenga</button>
		<a href="{{route('matchs.index')}}" class="btn btn-outline-warning">Cancelar</a>
	</div>
</form>

</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/clockpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$('.clockpicker').clockpicker({ twelvehour: true });
	$('.form-group .input-group.date').datepicker({
	    format: "dd/mm/yyyy",
	    todayBtn: "linked",
	    language: "es",
	    orientation: "bottom auto",
	    autoclose: true
	});
</script>
<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });

        var marker = new google.maps.Marker({
        	position: {
        		lat: -34.397, lng: 150.644
        	},
        	map: map,
        	draggable: true
        });
        var lat = marker.getPosition().lat();
    	var lng = marker.getPosition().lng();
    	
    	$('#lat').val(lat);
    	$('#lng').val(lng);
        var searchBox = new google.maps.places.SearchBox(document.getElementById('site'));

        google.maps.event.addListener(searchBox, 'places_changed', function(){
        	var places = searchBox.getPlaces();
        	var bounds = new google.maps.LatLngBounds();
        	var i, place;
        	for (var i = 0; place=places[i]; i++) {
        		bounds.extend(place.geometry.location);
        		marker.setPosition(place.geometry.location);
        	}
        	map.fitBounds(bounds);
        	map.setZoom(15);
        });
        google.maps.event.addListener(marker, 'position_changed', function(){
        	var lat = marker.getPosition().lat();
        	var lng = marker.getPosition().lng();
        	
        	$('#lat').val(lat);
        	$('#lng').val(lng);
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB6GiKkjwPqp9dkYPTtP4EqwgxGNf4gK_o&callback=initMap"
    async defer></script>
@endsection