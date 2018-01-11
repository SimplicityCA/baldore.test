@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Usuarios</h1>
	<p> Buscar por nombre </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
