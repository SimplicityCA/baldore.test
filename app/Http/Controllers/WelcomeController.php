<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePicture;
use App\Product;
use App\Promotion;
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
        $products=Product::where('active',1)->get();
        $promotions=Promotion::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('pictures','products','promotions'));
    }
}
