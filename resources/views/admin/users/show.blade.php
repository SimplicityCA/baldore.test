@extends('layouts.admin')
@section('content')
<div class="container">
	<h1>Información de Administrador</h1>
	<div class="row">
  	<div class="rpd-dataform">
      <div class="form-horizontal">
        <div class="btn-toolbar" role="toolbar">
            <div class="pull-right">
                <a href="/admin/users/create/{{ $admin->id }}" class="btn btn-primary">Modificar</a>
            </div>
        </div>
        <br />
        <div class="form-group clearfix col-sm-6" id="fg_name" >
            <label for="identity_number" class="col-sm-4 control-label">Nombre</label>
            <div class="col-sm-8" id="div_identity_number">           
                <div class='help-block'>{{$admin->name}}</div>
            </div>
        </div>
        <div class="form-group clearfix col-sm-6" id="fg_email" >
            <label for="email" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8" id="div_email">           
                <div class='help-block'>{{$admin->email}}</div>
            </div>
        </div>
        <div class="form-group clearfix col-sm-6" id="fg_created" >
            <label for="created" class="col-sm-4 control-label">Fecha de Creación</label>
            <div class="col-sm-8" id="div_created">           
                <div class='help-block'>{{$admin->created_at}}</div>
            </div>
        </div>
        <div class="form-group clearfix col-sm-6" id="fg_created" >
            <label for="created" class="col-sm-4 control-label">Fecha de Actualización</label>
            <div class="col-sm-8" id="div_created">           
                <div class='help-block'>{{$admin->updated_at}}</div>
            </div>
        </div>
      </div>
    </div>
	</div>
</div>
@endsection