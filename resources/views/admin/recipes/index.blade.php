@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Recetas</h1>
	<p> Buscar por título </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
