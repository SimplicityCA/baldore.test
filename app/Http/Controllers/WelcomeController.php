<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePicture;
use App\Product;
use App\Post;
use App\Content;
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
        $promotions=Promotion::orderBy('valid_from', 'desc')->get();
        return view('welcome', compact('pictures','products','promotions'));
    }
    public function landing () {
        return view('landing');
    }
    public function contact(){
       return view('contacts'); 
    }
    public function about(){
       return view('about'); 
    }
    public function posts(){

        $posts=Post::all();
        return view('posts.posts', compact('posts'));
    }

    public function showposts($slug){

        $post=Post::where('slug',$slug)->first();
        return view('posts.show_post', compact('post'));
    }

    public function content($id){

        $content=Content::where('id',$id)->first();
        return view('content', compact('content'));
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
