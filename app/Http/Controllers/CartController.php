<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(){
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->save(); //UPDATE

        $notification = 'Pedido realizado correctamente. Te contactaremos pronto por vía mail!';
        return back()->with(compact('notification'));
    }
}
