@extends('layouts.admin')
@section('content')
<div class="container profile-container home-container box box-primary">
	<h1>{{$title}}</h1>
	<div class="row">
		{!! $create !!}
	</div>
</div> 
@endsection