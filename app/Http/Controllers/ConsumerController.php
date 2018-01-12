<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class ConsumerController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $filter = \DataFilter::source(new Consumer());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', 'Nombre',true);
        $grid->add('lastname','Apellido', true);
        $grid->add('email', 'Email');
        $grid->add('identity_number', 'Nº Cédula');
        
        $grid->edit('/admin/consumers/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/consumers/create',"Nuevo Usuario", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.consumers.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Consumer());
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'lastname' => 'required',
          'birthday' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'identity_number' => 'required|digits:10',
      ], [
          'name.required' => 'El nombre es requerido',
          'lastname.required' => 'El apellido es requerido',
          'birthday.required' => 'La fecha de nacimiento es requerida',
          'email.required' => 'El email es requerido',
          'email.email' => 'Debe ingresar un email válido',
          'phone.required' => 'El teléfono es requerido',
          'identity_number.required' => 'El número de cédula es requerido',
          'identity_number.digits' => 'El número de cédula debe tener 10 dígitos',
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nuevo Usuario";
          if($create->action == 'delete'){
            $title= "Eliminar Usuario";   
          }
          break;
        case 'modify':
          $title= "Actualizar Usuario";
          break;
        case 'show':
          $title= "Información de Usuario";
          break;
        case 'delete':
          $title= "Eliminar Usuario";
          break;
      }

      $create->add('name','Nombre','text');
      $create->add('lastname','Apellido','text');
      $create->add('birthday','Fecha de Nacimiento', 'date');
      $create->add('email','Email','text');
      $create->add('phone','Teléfono','text');
      $create->add('identity_number','Número de Cédula','text');
      
      if($create->action!='idle'){
        $create->saved(function () use ($create) {
          switch ($create->action) {
            case 'insert':
              $create->message("Registro almacenado correctamente");
              break;
            case 'update':
              $create->message("Registro actualizado correctamente");
              break;
            case 'delete':
              $create->message("Registro eliminado correctamente");
              break;
          }
          $create->link("admin/consumers", "Usuarios", "TR");
        });  
      }
      

      $create->build();

      return view('admin.consumers.create', compact('create','title'));

    }
}
