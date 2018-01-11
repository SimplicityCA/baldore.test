@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Productos</h1>
	<p> Buscar por nombre </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
