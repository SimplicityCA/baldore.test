<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class ContentController extends Controller
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
       $filter = \DataFilter::source(new Content());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('title', 'Título',true);
        
        $grid->edit('/admin/contents/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/contents/create',"Nuevo Contenido", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.contents.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Content());
      $validator = Validator::make($request->all(), [
          'title' => 'required',
          'body' => 'required',
      ], [
          'title.required' => 'El título es requerido',
          'body.required' => 'El cuerpo es requerido',
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nuevo Contenido";
          if($create->action == 'delete'){
            $title= "Eliminar Contenido";   
          }
          break;
        case 'modify':
          $title= "Actualizar Contenido";
          break;
        case 'show':
          $title= "Información de Contenido";
          break;
        case 'delete':
          $title= "Eliminar Contenido";
          break;
      }

      $create->add('title','Título','text');
      $create->add('body','Cuerpo','textarea');
      
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
          $create->link("admin/contents", "Contenidos", "TR");
        });  
      }
      

      $create->build();

      return view('admin.contents.create', compact('create','title'));

    }
}
