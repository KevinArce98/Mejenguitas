@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Perfil</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      
      
      <!-- edit form column -->
      <div class="personal-info ">
        <h3 class="text-center">Información Personal</h3>
        
        <form class="form-horizontal" role="form" method="POST" action="{{ route('user.update', auth()->user()->id) }}" enctype="multipart/form-data">
        	{{ csrf_field() }}
        	{{ method_field('PATCH') }}
        	<div class="row">
        		<div class="col-md-3">
			        <div class="text-center">
			          <img src="{{ auth()->user()->avatar != 'http://proyectolaravel.com/img/default.png' ? auth()->user()->url : 'http://proyectolaravel.com/img/default.png'}}" class="avatar img-circle" alt="avatar" id="imgAvatar" width="100px" height="100px">
			          <h6>Sube una foto diferente ...</h6>
			          <input type="file" class="form-control" name="avatar" id="avatar">
			        </div>
			      </div>
				<div class="col-md-9">
	        		<div class="form-group">
			            <label class="col-lg-3 control-label">Nombre:</label>
			            <div class="col-lg-8">
			              <input class="form-control" type="text" value="{{ auth()->user()->name}}" name="name" required>
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-lg-3 control-label">Teléfono:</label>
			            <div class="col-lg-8">
			              <input class="form-control" type="text" value="{{ auth()->user()->phone }}" name="phone">
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="col-lg-3 control-label">Correo:</label>
			            <div class="col-lg-8">
			              <input class="form-control" type="text" value="{{ auth()->user()->email }}" readonly required>
			            </div>
			          </div>
	        	</div>

        	</div>
        	<div class="row text-center">
        		<input type="submit" class="btn btn-primary" value="Guardar Cambios">
				<span></span>
				<a href="{{ route('home') }}" class="btn btn-warning">Cancelar</a>
        	</div>
        </form>
      </div>
  </div>
</div>

@endsection

@section('scripts')
	<script src="{{ asset('js/showImage.js') }}"></script>
	<script >console.log($('#avatar'));</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@if (Session::has('sweet_alert.alert'))
	    <script>
	        swal({
			  title: "¡Genial!",
			  text: "Perfil Actualizado",
			  icon: "success",
			  timer: 4000,
			});
	    </script>
	@endif
@endsection