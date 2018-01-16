<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use App\Type;
use Validator;

class TypeController extends Controller
{
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
      $filter = \DataFilter::source(new Type());
      $error = "";

      $filter->text('src','Buscar')->scope('search');

      $filter->submit('Buscar');
      $filter->reset('Limpiar');
      $filter->build();

      $grid = DataGrid::source($filter);
      $grid->add('description','Descripción', true);
      $grid->edit('/admin/types/create', 'Acciones','show|modify|delete');
      $grid->link('/admin/types/create',"Nuevo Tipo", "TR");

      $grid->orderBy('description','desc');
      $grid->paginate(10);

      return view('admin.types.index', compact('filter', 'grid','error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         
      $create = DataEdit::source(new Type());
      $validator = Validator::make($request->all(), [
          'description' => 'required',
      ], [
          'description.required' => 'La descripción es requerida',
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }
      // Default values
      $create->set('updated_at', date_create('now UTC'));

      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nuevo Tipo";
          if($create->action == 'delete'){
            $title= "Eliminar Tipo";   
          }
          break;
        case 'modify':
          $title= "Actualizar Tipo";
          break;
        case 'show':
          $title= "Información de Tipo";
          break;
        case 'delete':
          $title= "Eliminar Tipo";
          break;
      }
      
      $create->add('description','Descripción', 'text');

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
            $create->link("admin/types", "Tipos", "TR");
        });
      }

      $create->build();


      return view('admin.types.create', compact('create','title'));
    }
}
