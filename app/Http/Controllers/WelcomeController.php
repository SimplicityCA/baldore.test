<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePicture;
use App\Product;
use App\Post;
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
    public function contact(){
       return view('contacts'); 
    }
    public function posts(){

        $posts=Post::all();
        return view('posts.posts', compact('posts'));
    }

    public function showposts($slug){

        $post=Post::where('slug',$slug)->first();
        return view('posts.show_post', compact('post'));
    }

    public function promotions(){

        $promotions=Promotion::all();
        return view('promotions.promotions', compact('promotions'));
    }

    public function showpromotions($id){

        $promotion=Promotion::find($id);
        return view('promotions.show_promotions', compact('promotion'));
    }
}
