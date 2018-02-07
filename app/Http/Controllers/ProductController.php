<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Recipe;
use App\Type;
use App\Package;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','recipe']]);
    }

        

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
        $product= Product::where('slug',$slug)->where('active',1)->first();
        View::share('background_product',$product->background);
        return view('products.view', compact('product'));
    }
    public function recipe($id){
        $post= Recipe::find($id);
        return view('products.recipe', compact('post'));
    }
    public function index()
    {
        $filter = \DataFilter::source(Product::with('type','package'));
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('title','Título', true);
        
        $grid->add('{{ $type->description }}','Tipo', true);
        $grid->add('{{ $package->description }}','Empaque', true);
        $grid->edit('/admin/products/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/products/create',"Nuevo Producto", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.products.index', compact('filter', 'grid','error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $create = DataEdit::source(new Product());
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'package_id' => 'required',
            'grade' => 'required',
            'components' => 'required',
            'suggestion' => 'required',
            'slug' => 'required',
            'container' => 'required_if:create,1',
            'background' => 'required_if:create,1',
        ], [
            'title.required' => 'El título del producto es requerido',
            'description.required' => 'La descripción es requerida',
            'type_id.required' => 'El tipo es requerido',
            'package_id.required' => 'El empaque es requerido',
            'grade.required' => 'El grado es requerido',
            'components.required' => 'Los componentes son requeridos',
            'suggestion.required' => 'La sugerencia es requerida',
            'slug.required' => 'El slug del producto es requerido',
            'container.required_if' => 'La imagen es requerida',
            'background.required_if' => 'La imagen es requerida',
        ]);
        if ($request->isMethod('post') || $request->isMethod('patch')) {
            $create->validator = $validator;
        }

        $create->set('updated_at', date_create('now UTC'));
        switch ($create->status) {
          case 'create':
            $create->set('created_at', date_create('now UTC'));
            $title= "Nuevo Producto";
            $create->add('create', '', 'hidden')->insertValue(1);
            if($create->action == 'delete'){
              $title= "Eliminar Producto";   
            }
            break;
          case 'modify':
            $title= "Actualizar Producto";
            $create->add('create', '', 'hidden')->insertValue(0);
            break;
          case 'show':
            $title= "Información de Producto";
            break;
          case 'delete':
            $title= "Eliminar Producto";
            break;
        }
        
        $create->add('title','Título','text');
        $create->add('description','Descripción','text');
        $create->add('type_id','Tipo','select')->options(Type::pluck('description', 'id')->all());
        $create->add('package_id','Empaque','select')->options(Package::pluck('description', 'id')->all());
        $create->add('grade','Grado','text');
        $create->add('components','Componentes','text');
        $create->add('suggestion','Sugerencia','text');
        $create->add('slug','Slug','text');

        $create->add('container','Imagen Contenedor', 'image')->move('images/products/containers/')->preview(180,180);
        $create->add('background','Imagen Fondo', 'image')->move('images/products/backgrounds/')->preview(180,180);
        $statusList = array("1"=>"Activo", "0"=>"Inactivo");
        $create->add('active','Estado', 'select')->options($statusList);

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
            $create->link("admin/products", "Productos", "TR");
          });  
        }
        

        $create->build();


        return view('admin.products.create', compact('create','title'));
    }
}
