@extends('layouts/app')

@section('title')
Formulario Solicitud
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<h2 class="col-md-10 col-md-offset-1">Solicitud para administrar mejengas</h2>
		</div>
		<div class="row col-md-10 col-md-offset-1">
			@if (session('alert'))
			    <div class="alert alert-success">
			        {{ session('alert') }}
			    </div>
			@endif
		</div>
		<div class="row">
			<form method="POST" role="form" class="col-md-10 col-md-offset-2" action="{{ route('requests.store') }}">
				{{ csrf_field() }}

				<input type="hidden" name="id" value="{{ auth()->user()->id }}">

				<p class="help-block">¡Llena tu solicitud env&iacute;ala, y espera que el administrador la acepte!</p>
				<div class="row">
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
				        <label for="email" class="col-md-2 control-label">Correo</label>
				        <div class="col-md-8">
				            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
				            @if ($errors->has('email'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('email') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
				        <label for="name" class="col-md-2 control-label">Nombre</label>
				        <div class="col-md-8">
				            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
				            @if ($errors->has('name'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('name') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>
				    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
				        <label for="message" class="col-md-2 control-label">Mensaje</label>
				        <div class="col-md-8">
				        	<textarea id="message" type="text" class="form-control" name="message" required rows="5">{{ old('message') }}</textarea>
				            @if ($errors->has('message'))
				                <span class="help-block">
				                    <strong>{{ $errors->first('message') }}</strong>
				                </span>
				            @endif
				        </div>
				    </div>
				    <div class="col-md-3 col-md-offset-8">
				    	<button type="submit" class="btn btn-success" id="send">Enviar solicitud</button>
				    </div>
				</div>
			</form>
			
		</div>
		
	</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if (Session::has('sweet_alert.alert'))
	    <script>
	        swal({
			  title: "¡Genial!",
			  text: "Solicituda enviada exitosamente.",
			  icon: "success",
			  timer: 4000,
			});
	    </script>
	@endif
@endsection