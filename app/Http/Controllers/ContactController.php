<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class ContactController extends Controller
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
       $filter = \DataFilter::source(new Contact());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name', 'Nombre',true);
        $grid->add('lastname','Apellido', true);
        $grid->add('email', 'Email');
        
        $grid->edit('/admin/contacts/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/contacts/create',"Nuevo Contacto", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.contacts.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Contact());
      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'lastname' => 'required',
          'email' => 'required|email',
      ], [
          'name.required' => 'El nombre es requerido',
          'lastname.required' => 'El apellido es requerido',
          'email.required' => 'El email es requerido',
          'email.email' => 'Debe ingresar un email válido',
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nuevo Contacto";
          if($create->action == 'delete'){
            $title= "Eliminar Contact";   
          }
          break;
        case 'modify':
          $title= "Actualizar Contacto";
          break;
        case 'show':
          $title= "Información de Contacto";
          break;
        case 'delete':
          $title= "Eliminar Contacto";
          break;
      }

      $create->add('name','Nombre','text');
      $create->add('lastname','Apellido','text');
      $create->add('email','Email','text');
      
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
          $create->link("admin/contacts", "Contactos", "TR");
        });  
      }
      

      $create->build();

      return view('admin.contacts.create', compact('create','title'));

    }
}
