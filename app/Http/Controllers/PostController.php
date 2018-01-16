<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class PostController extends Controller
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
       $filter = \DataFilter::source(new Post());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('title', 'Titulo',true);
        $grid->add('slug', 'Slug');
       
        $grid->edit('/admin/posts/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/posts/create',"Nueva Noticia", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.posts.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $create = DataEdit::source(new Post());
      $validator = Validator::make($request->all(), [
          'title' => 'required',
          'body' => 'required',
          'picture' => 'required_if:create,1',
          'slug' => 'required',
      ], [
          'title.required' => 'El título es requerido',
          'body.required' => 'El cuerpo de la noticia es requerido',
          'picture.required_if' => 'La imagen es requerida',
          'slug.required' => 'El slug es requerido',
          
      ]);
      if ($request->isMethod('post') || $request->isMethod('patch')) {
          $create->validator = $validator;
      }

      $create->set('updated_at', date_create('now UTC'));
      switch ($create->status) {
        case 'create':
          $create->set('created_at', date_create('now UTC'));
          $title= "Nueva Noticia";
          $create->add('create', '', 'hidden')->insertValue(1);
          if($create->action == 'delete'){
            $title= "Eliminar Noticia";   
          }
          break;
        case 'modify':
          $title= "Actualizar Noticia";
          $create->add('create', '', 'hidden')->updateValue(2);
          break;
        case 'show':
          $title= "Información de Noticia";
          break;
        case 'delete':
          $title= "Eliminar Noticia";
          break;
      }

      $create->add('title','Título','text');
      $create->add('body','Cuerpo', 'textarea');
      $create->add('picture','Imagen', 'image')->move('img/posts/')->preview(180,180);
      $create->add('slug','Slug','text');

      
      
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
          $create->link("admin/posts", "Noticias", "TR");
        });  
      }
      

      $create->build();

      return view('admin.posts.create', compact('create','title'));

    }
}
