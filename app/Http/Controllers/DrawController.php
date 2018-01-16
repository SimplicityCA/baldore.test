<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Draw;
use App\Recipe;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;
use Illuminate\Support\Facades\DB;

class DrawController extends Controller
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
       $filter = \DataFilter::source(Draw::with('recipe'));
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('id', 'Número',true);
        $grid->add('{{ $recipe->title }}','Receta', true);
       	$grid->add('created_at', 'Fecha de Sorteo',true);
        $grid->link('/admin/draws/create',"Nuevo Sorteo", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.draws.index', compact('filter', 'grid','error')); 
    }

    public function create()
    {

      $selectedRecipes = Draw::pluck('recipe_id')->all();
			$winner = Recipe::whereNotIn('id', $selectedRecipes)->inRandomOrder()->first();

			if($winner){
				$message = "Se ha sorteado exitosamente una reseta entre todas las disponibles.";
				$draw = new Draw();
				$draw->recipe_id = $winner->id;
				$draw->save();
			}
			else
			{
				$message = "No existen recetas disponibles para ser sorteadas.";
			}


			return view('admin.draws.create', compact('message','winner')); 

    }
}
