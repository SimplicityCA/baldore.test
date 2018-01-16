@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Administradores</h1>
		<p> Buscar por nombre o email </p>
		{!! $filter !!}
		{!! $grid !!}
</div>
@endsection
