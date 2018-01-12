@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Usuarios</h1>
	<p> Buscar por nombre, apellido, número de cédula o email </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
