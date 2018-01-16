<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class PackageController extends Controller
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
       $filter = \DataFilter::source(new Package());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('description', 'Descripción',true);
        
        $grid->edit('/admin/packages/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/packages/create',"Nuevo Empaque", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.packages.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Package());
      $validator = Validator::make($request->all(), [
          'description' => 'required',
      ], [
          'description.required' => 'La descripción es requerida',
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nuevo Empaque";
          if($create->action == 'delete'){
            $title= "Eliminar Empaque";   
          }
          break;
        case 'modify':
          $title= "Actualizar Empaque";
          break;
        case 'show':
          $title= "Información de Empaque";
          break;
        case 'delete':
          $title= "Eliminar Empaque";
          break;
      }

      $create->add('description','Descripción','textarea');
      
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
          $create->link("admin/packages", "Empaques", "TR");
        });  
      }
      

      $create->build();

      return view('admin.packages.create', compact('create','title'));

    }
}
