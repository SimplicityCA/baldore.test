<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Consumer;
use App\Product;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class RecipeController extends Controller
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
        $filter = \DataFilter::source(Recipe::with('consumer','product'));
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('title','Título', true);
        
        $grid->add('{{ $consumer->email }}','Usuario', true);
        $grid->add('{{ $product->title }}','Producto', true);
        $grid->edit('/admin/recipes/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/recipes/create',"Nueva Receta", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.recipes.index', compact('filter', 'grid','error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $create = DataEdit::source(new Recipe());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'consumer_id' => 'required',
            'product_id' => 'required',
            'picture' => 'required_if:create,1',
        ], [
            'title.required' => 'El título de la receta es requerido',
            'description.required' => 'La descripción de la receta es requerida',
            'consumer_id.required' => 'El usuario es requerido',
            'product_id.required' => 'El producto es requerido',
            'picture.required_if' => 'La imagen es requerida',
        ]);
        if ($request->isMethod('post') || $request->isMethod('patch')) {
            $create->validator = $validator;
        }

        $create->set('updated_at', date_create('now UTC'));
        switch ($create->status) {
          case 'create':
            $create->set('created_at', date_create('now UTC'));
            $title= "Nueva Receta";
            $create->add('create', '', 'hidden')->insertValue(1);
            if($create->action == 'delete'){
              $title= "Eliminar Receta";   
            }
            break;
          case 'modify':
            $title= "Actualizar Receta";
            $create->add('create', '', 'hidden')->updateValue(2);
            break;
          case 'show':
            $title= "Información de Receta";
            break;
          case 'delete':
            $title= "Eliminar Receta";
            break;
        }
        
        $create->add('title','Título','text');
        $create->add('description','Descripción','text');
        $create->add('consumer_id','Usuario','select')->options(Consumer::pluck('email', 'id')->all());
        $create->add('product_id','Producto','select')->options(Product::pluck('title', 'id')->all());
        $create->add('picture','Imagen', 'image')->move('img/recipes/')->preview(180,180);


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
            $create->link("admin/recipes", "Recetas", "TR");
          });  
        }
        

        $create->build();


        return view('admin.recipes.create', compact('create','title'));
    }
}
