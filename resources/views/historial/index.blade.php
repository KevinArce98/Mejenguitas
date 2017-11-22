@extends('layouts.app')

@section('link-css')
	<link rel="stylesheet" href="{{ asset('css/alerts.css') }}">
@endsection
@section('content')
	<!--<h2>Historial de mejengas</h2>
	<hr>
	<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha Creación</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2">No hay registros</td>
			</tr>
		</tbody>
	</table>
</div>-->
<div class="container">
	<div class="alert">
		<div class="alert-container">
			<h3 class="alert-title">Lorem ipsum dolor sit amet.</h3>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>	
	</div>
	
</div>
@endsection