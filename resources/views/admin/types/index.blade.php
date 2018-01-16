@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Tipos de Productos</h1>
	<p> Buscar por descripción </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
