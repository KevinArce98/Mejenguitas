@extends('layouts.app')
@section('title')
Mostrar Mejenga
@endsection
@section('content')
<div class="container">
	<h2>Mejenga {{ $match->name }}</h2>
	<hr>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jugadores:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->players }}" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Precio:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->price }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hora:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->convertTimeToNormal($match->hour) }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Fecha:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->convertDateToNormal($match->date) }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jugadores:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->players }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Lugar:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->site }}" readonly>
    </div>
  </div>
  <div class="form-group">
		<div style="width: 100%; height: 420px;" id="map-canvas"></div>
		<input type="hidden" name="lng" id="lng" value="{{ old('lng') }}" readonly="">
		<input type="hidden" name="lat" id="lat" value="{{ old('lat') }}" readonly="">
	</div>
  @if(isset($match->info))
	  <div class="form-group row">
	    <label class="col-sm-2 col-form-label">Información Adicional:</label>
	    <div class="col-sm-10">
	    	<textarea class="form-control" readonly>{{ $match->info }}</textarea>
	    </div>
	  </div>
  @endif
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Creada:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{ $match->convertTimestamp($match->created_at) }}" readonly>
    </div>
  </div>


</div>
@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB6GiKkjwPqp9dkYPTtP4EqwgxGNf4gK_o&callback=initMap"
    async defer></script>
<script>
      var map;
      var lat = {{ $match->lat}};
      var lng = {{ $match->lng}};
	  var marker;
    </script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection