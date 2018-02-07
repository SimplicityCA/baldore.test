<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePicture;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;

class HomePictureController extends Controller
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
        $filter = \DataFilter::source(new HomePicture());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('message1','Texto 1', true);
        $grid->add('message2','Texto 2', true);
        
        $grid->edit('/admin/homepictures/create', 'Acciones','show|modify|delete');
        $grid->link('/admin/homepictures/create',"Nueva Imagen", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.homepictures.index', compact('filter', 'grid','error'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $create = DataEdit::source(new HomePicture());
        $validator = Validator::make($request->all(), [
            'path' => 'required_if:create,1',
            'message1' => 'required',
            'message2' => 'required',
        ], [
            'message1.required' => 'El mensaje es requerido',
            'path.required_if' => 'La imagen es requerida',
            'message2.required' => 'El mensaje es requerido',
        ]);
        if ($request->isMethod('post') || $request->isMethod('patch')) {
            $create->validator = $validator;
        }

        $create->set('updated_at', date_create('now UTC'));
        switch ($create->status) {
          case 'create':
            $create->set('created_at', date_create('now UTC'));
            $title= "Nueva Imagen del Home";
            $create->add('create', '', 'hidden')->insertValue(1);
            if($create->action == 'delete'){
              $title= "Eliminar Imagen del Home";   
            }
            break;
          case 'modify':
            $title= "Actualizar Imagen del Home";
            $create->add('create', '', 'hidden')->insertValue(0);
            break;
          case 'show':
            $title= "Información de Imagen del Home";
            break;
          case 'delete':
            $title= "Eliminar Imagen del Home";
            break;
        }
        
        $create->add('message1','Texto 1','text');
        $create->add('message2','Texto 2','text');
        $create->add('path','Imagen', 'image')->move('images/')->preview(180,180);
        $create->add('link','Link','text');
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
            $create->link("admin/homepictures", "Imágenes del Home", "TR");
          });  
        }
        

        $create->build();


        return view('admin.pictures.create', compact('create','title'));
    }
}
