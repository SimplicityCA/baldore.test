@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Promociones</h1>
	<p> Buscar por título </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
