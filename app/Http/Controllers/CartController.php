<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{



    public function index(){
        $categories = Category::orderBy('id','ASC')->get();
        return view('cart')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message','El artículo ya está en tu carrito!');
        }
        if($request->qty > $product->quantity){
            return back()->with('success_message','Actualmente no tenemos suficientes artículos en stock.');
        }
        Cart::add(['id' => $request->id, 'name' => $request->name, 'qty' =>$request->qty, 'price' => $request->price,'weight' => 550, 'options' => ['slug' => $request->slug,'image'=> $request->image]])->associate('App\Product');

        //dd($compra->options->image);
        return redirect()->route('cart.index')->with('success_message','El artículo fue añadido a su carrito!');

    }

    public function rapid_add($id)
    {
        $product = Product::find($id);

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message','El artículo ya está en tu carrito!');
        }

        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' =>1, 'price' => $product->price,'weight' => 550, 'options' => ['slug' => $product->slug,'image'=> $product->image]])->associate('App\Product');

        //dd($compra->options->image);
        return redirect()->route('cart.index')->with('success_message','El artículo fue añadido a su carrito!');
    }

    public function destroy($id){
        Cart::remove($id);

        return back()->with('success_message','El artículo ha sido eliminado!');
    }

    public function switchToSaveForLater($id){
        $item = Cart::get($id);


        //dd($item);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'El artículo ya está guardado para más tarde!');
        }

        //Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price,['slug' => $item->slug])
         //   ->associate('App\Product');

        Cart::instance('saveForLater')->add(['id' => $item->id, 'name' => $item->name, 'qty' =>$item->qty, 'price' => $item->price,'weight' => 550, 'options' => ['slug' => $item->options->slug,'image'=> $item->options->image]])
            ->associate('App\Product');

        //dd($cart);
        return redirect()->route('cart.index')->with('success_message', 'El artículo ha sido guardado para más tarde!');
    }

    public function update(Request $request,$id){
        return $request->all();
    }

    public function add(Request $request,$id){

        dd($id);

        $cantidad = $request->qty;

        $cantidad = $cantidad+1;

        Cart::update($id,$cantidad);

        return redirect()->route('cart.index')->with('success_message', 'Quantity was updated successfully!');
    }
}
