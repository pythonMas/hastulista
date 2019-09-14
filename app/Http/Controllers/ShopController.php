<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $pagination = 20;
        $categories = Category::orderBy('id','ASC')->get();

        if(\request()->category){
            $products= Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',\request()->category);
            })->paginate($pagination);

            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }else{
            $products = Product::inRandomOrder()->take(20)->paginate($pagination);
            $categoryName = 'Destacado';
        }


        //return response()->json($products);

        return view('shop')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryName
        ]);
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        $categories = Category::orderBy('id','ASC')->get();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(12)->get();

        $stockLevel = getStockLevel($product->quantity);




        return view('product')->with([
            'product'=>$product,
            'categories'=>$categories,
            'stockLevel' => $stockLevel,
            'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'min:3',
        ]);


        $query= $request->input('query');

        $categories = Category::orderBy('id','ASC')->get();

        $categoryName = optional($categories->where('slug', request()->category)->first())->name;

         $products = Product::where('name', 'like', "%$query%")
                            ->orWhere('details', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->paginate(10);



        return view('search-results')->with([
            'categories'=>$categories,
            'products'=>$products,
            'categoryName'=>$categoryName
        ]); //->with('products', $products);
    }
}
