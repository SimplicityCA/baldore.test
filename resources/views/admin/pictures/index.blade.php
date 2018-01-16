@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Imágenes</h1>
	<p> Buscar por nombre de imagen o nombre de producto </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
