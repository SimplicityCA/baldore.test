@extends('layouts.admin')
@section('content')
<div class="container profile-container home-container box box-primary">
	<h1>Sorteo de Receta</h1>
	<div class="row">
		<div style="color:green">{{$message}}</div>
		@if($winner)
			<div class="rpd-dataform">
	      <div class="form-horizontal">
	        <div class="btn-toolbar" role="toolbar">
	            <div class="pull-right">
	                <a href="/admin/draws/" class="btn btn-primary">Sorteos</a>
	            </div>
	        </div>
	        <br />
	        <div class="form-group clearfix col-sm-6" id="fg_title" >
	            <label for="title" class="col-sm-4 control-label">Título Receta</label>
	            <div class="col-sm-8" id="div_title">           
	                <div class='help-block'>{{$winner->title}}</div>
	            </div>
	        </div>
	        <div class="form-group clearfix col-sm-6" id="fg_email" >
	            <label for="email" class="col-sm-4 control-label">Usuario</label>
	            <div class="col-sm-8" id="div_email">           
	                <div class='help-block'>{{$winner->consumer->email}}</div>
	            </div>
	        </div>
	        <div class="form-group clearfix col-sm-6" id="fg_product" >
	            <label for="product" class="col-sm-4 control-label">Producto</label>
	            <div class="col-sm-8" id="div_product">           
	                <div class='help-block'>{{$winner->product->title}}</div>
	            </div>
	        </div>
	      </div>
	    </div>
		@endif
	</div>
</div> 
@endsection