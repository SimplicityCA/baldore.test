<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class PromotionController extends Controller
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
       $filter = \DataFilter::source(new Promotion());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('title', 'Titulo',true);
       
        $grid->edit('/admin/promotions/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/promotions/create',"Nueva Promoción", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.promotions.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Promotion());
      $validator = Validator::make($request->all(), [
          'title' => 'required',
          'body' => 'required',
          'picture' => 'required_if:create,1',
      ], [
          'title.required' => 'El título es requerido',
          'body.required' => 'El cuerpo de la noticia es requerido',
          'picture.required_if' => 'La imagen es requerida',
          
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nueva Promoción";
          $create->add('create', '', 'hidden')->insertValue(1);
          if($create->action == 'delete'){
            $title= "Eliminar Promoción";   
          }
          break;
        case 'modify':
          $title= "Actualizar Promoción";
          $create->add('create', '', 'hidden')->updateValue(2);
          break;
        case 'show':
          $title= "Información de Promoción";
          break;
        case 'delete':
          $title= "Eliminar Promoción";
          break;
      }

      $create->add('title','Título','text');
      $create->add('body','Cuerpo', 'textarea');
      $create->add('picture','Imagen', 'image')->move('img/promotions/')->preview(180,180);

      
      
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
          $create->link("admin/promotions", "Promociones", "TR");
        });  
      }
      

      $create->build();

      return view('admin.promotions.create', compact('create','title'));

    }
}
