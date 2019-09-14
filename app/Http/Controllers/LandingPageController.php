<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {

        $promotions_week = Product::orderBy('id', 'DESC')->where('status','offer')->whereBetween('products.updated_at',[Carbon::now()->subDays(1), Carbon::now()->addDays(1)])->get();

        $products = Product::inRandomOrder()->where('status','is_new')->take(30)->get();

        $categories = Category::orderBy('id','ASC')->get();

        $banners = Product::orderBy('id','DESC')->where('status','banner')->get();

        $promotions = Product::inRandomOrder()->where('status','offer')->take(32)->get();

        //return response()->json($categories);
        //$products = Product::where('featured', true)->take(8)->inRandomOrder()->get();

        return view('landing-page')->with(['products'=>$products,'categories'=>$categories,'promotions_week'=>$promotions_week,'promotions'=>$promotions,'banners'=>$banners]);
    }

}
