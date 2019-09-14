<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    public function destroy($id){

        Cart::instance('saveForLater')->remove($id);

        return back()->with('success_message','El artículo ha sido eliminado!');
    }

    public function switchToCart($id){

        $item = Cart::instance('saveForLater')->get($id);

        //dd($item);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'El artículo ya está en tu carrito!');
        }

        Cart::instance('default')->add(['id' => $item->id, 'name' => $item->name, 'qty' =>$item->qty, 'price' => $item->price,'weight' => 550, 'options' => ['slug' => $item->options->slug,'image'=> $item->options->image]])
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'El artículo ha sido movido al carrito!');
    }
}
