<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request){
        $query = $request->input('query');
        $products = Product::where('name','like',"%$query%")->paginate(5);
        if ($products->count() == 1){
            $id = $products->first()->id;
            return redirect("products/$id");
        }
        return view('search.show')->with(compact('products','query'));
    }

    public function data(){
        $products = Product::pluck('name');
        return $products;
    }
}
