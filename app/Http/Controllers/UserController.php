<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Validator;
use App\Http\Requests\StoreAdmin;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
       $filter = \DataFilter::source(new User());
        $error = "";

        $filter->text('src','Buscar')->scope('search');

        $filter->submit('Buscar');
        $filter->reset('Limpiar');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->add('name','Nombre', true);
        $grid->add('email','Email', true);
        $grid->add('<a href="users/show/{{ $id }}"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="users/create/{{ $id }}"><span class="glyphicon glyphicon-edit"></span></a>','Acciones');
        $grid->link('admin/users/create',"Nuevo Administrador", "TR");

        $grid->orderBy('id','desc');
        $grid->paginate(10);

        return view('admin.users.index', compact('filter', 'grid','error')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new User;
        $title = "Nuevo Administrador";
        return view('admin.users.create', compact('admin', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        //
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if($admin->save()){
            return redirect('admin/users'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = User::find($id);
        if(!$admin){
            return redirect('admin/users/');
        }
        return view('admin.users.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = User::find($id);
        if(!$admin){
            return redirect('admin/users/');
        }
        $title = "Actualizar Administrador";

        return view('admin.users.create', compact('roles', 'admin', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdmin $request, $id)
    {
        //
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password)
        {
            $admin->password = Hash::make($request->password);
        }
        if($admin->save()){
            return redirect('admin/users'); 
        }
    }
}
