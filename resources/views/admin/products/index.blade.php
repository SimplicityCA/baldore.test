@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Productos</h1>
	<p> Buscar por título, tipo o empaque </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
