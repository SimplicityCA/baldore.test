<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePicture;
class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures=HomePicture::all();
        return view('welcome', compact('pictures'));
    }
}
