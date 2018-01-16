@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Productos</h1>
	<p> Buscar por título o tipo </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
