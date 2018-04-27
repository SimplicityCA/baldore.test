@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>{{$title}}</h1>
	<div class="form-container">
		@if($admin->id)
		<form method="POST" action="/admin/users/create/{{$admin->id}}">
		@else
			<form method="POST" action="/admin/users/create">
		@endif;
			{{ csrf_field() }}	
			@include ('admin.errors')
			<div class="row">
				@if($admin->id)
		    	<input type="hidden" name="update" value="1">
	    	@else
	    		<input type="hidden" name="update" value="0">
	    	@endif
	    	<div class="form-group col-sm-6">
					<label for="name">Nombre:</label>
					<input type="text" name="name" id="name" class="form-control" value="{{old('name',$admin->name)}}">
				</div>
				<div class="form-group col-sm-6">
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" class="form-control" value="{{old('email',$admin->email)}}">
				</div>
				<div class="form-group col-sm-12">
					<label for="password">Contraseña:</label> <span>Completar solo si el administrador es nuevo, o se quiere modificar la contraseña del administrador</span>
					<input type="password" name="password" id="password" class="form-control" value="">
				</div>
				<div class="col-sm-12">
					<input type="submit" class="btn btn-primary" name="save" value="Guardar">
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
