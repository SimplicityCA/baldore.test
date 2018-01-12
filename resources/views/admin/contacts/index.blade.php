@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Contactos</h1>
	<p> Buscar por nombre, apellido o email </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
