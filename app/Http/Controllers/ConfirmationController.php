<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ConfirmationController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','ASC')->get();
        return view('thankyou')->with('categories',$categories);
    }
}
