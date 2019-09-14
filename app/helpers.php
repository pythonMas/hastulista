<?php

    function presentPrice($price)
    {

        return 'S/'.number_format($price / 100,2);

    }

    function setActiveCategory($category, $output = 'active')
    {
        return request()->category == $category ? $output : '';
    }


    /*function productImage($path)
    {
        return $path && file_exists('public/img/'.$path) ? asset('public/img/'.$path) : asset('img/not-found.jpg');
    }*/

    function productImage($path){

        return $path  && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
    }

    function getNumbers()
    {
        $tax = config('cart.tax');
        $newSubtotal = (Cart::subtotal());
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }

    function getStockLevel($quantity){

        if($quantity > setting('site.stock-threshold')){
            $stockLevel ='<div class="badge badge-success">En stock</div>';
        }elseif($quantity <=setting('site.stock-threshold') && $quantity > 0){

            $stockLevel='<div class="badge badge-warning">Stock bajo</div>';
        }else{
            $stockLevel='<div class="badge badge-danger">No disponible</div>';
        }

        return $stockLevel;
    }
