@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Recetas</h1>
	<p> Buscar por título, email de usuario o título de producto </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
