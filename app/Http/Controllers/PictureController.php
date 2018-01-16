<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use App\Picture;
use App\Product;
use Validator;

class PictureController extends Controller
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
        $filter = \DataFilter::source(Picture::with('product'));
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name','Nombre Imagen', true);
        
        $grid->add('{{ $picture->name }}','Producto', true);
        $grid->edit('/admin/pictures/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/pictures/create',"Nueva Imagen", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.pictures.index', compact('filter', 'grid','error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $create = DataEdit::source(new Picture());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required_if:create,1',
            'product_id' => 'required',
        ], [
            'name.required' => 'El nombre de la imagen es requerida',
            'description.required_if' => 'La imagen es requerida',
            'product_id.required' => 'El producto requerido',
        ]);
        if ($request->isMethod('post') || $request->isMethod('patch')) {
            $create->validator = $validator;
        }

        $create->set('updated_at', date_create('now UTC'));
        switch ($create->status) {
          case 'create':
            $create->set('created_at', date_create('now UTC'));
            $title= "Nueva Imagen";
            $create->add('create', '', 'hidden')->insertValue(1);
            if($create->action == 'delete'){
              $title= "Eliminar Imagen";   
            }
            break;
          case 'modify':
            $title= "Actualizar Imagen";
            $create->add('create', '', 'hidden')->insertValue(0);
            break;
          case 'show':
            $title= "Información de Imagen";
            break;
          case 'delete':
            $title= "Eliminar Imagen";
            break;
        }
        
        $create->add('name','Nombre','text');
        $create->add('product_id','Producto','select')->options(Product::pluck('title', 'id')->all());
        $create->add('description','Imagen', 'image')->move('img/products/')->preview(180,180);

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
            $create->link("admin/pictures", "Imágenes", "TR");
          });  
        }
        

        $create->build();


        return view('admin.pictures.create', compact('create','title'));
    }
}
