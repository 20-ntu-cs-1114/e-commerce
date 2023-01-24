<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function addToCart($id)
    {
        if (session()->has('user')) {
            $cart = new Cart();
            $cart->user_id = session('user')['id'];
            $cart->product_id = $id;
            $cart->save();
            return redirect('/cart');
        } else {
            return redirect('/signin');
        }
    }
    function getCartProducts(){
        if(session()->has('user')){
            $userId = session('user')['id'];
            $products = Cart::join('products','products.id','=','product_id')->where('user_id','=',$userId)->get(['carts.id AS cartId','products.*']);
            return view('cart', ['products' => $products]);

        }else{
            return redirect('/signin');
        }
    }
    function removeCart($id){
        Cart::find($id)->delete();
        return redirect('/cart');
    }
}
