<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome(){

        $categories = Category::has('products')->get();
        return view('welcome')->with(compact('categories'));
    }
}
