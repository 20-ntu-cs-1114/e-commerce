<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    // Order
    function order($id)
    {
        if (session()->has('user')) {
            $product = Product::find($id);
            return view('order', ['product' => $product]);
        } else {
            return redirect('/signin');
        }
    }
    function orderNow(Request $request)
    {
        $order = new Order();
        $order->user_id = session('user')['id'];
        $order->product_id = $request->input('product_id');
        $order->quantity = $request->input('product_quantity');
        $order->address = $request->input('address');
        if ($order->save()) {
            return redirect('order-success');
        }

    }
    function orderFromCart()
    {
        if (session()->has('user')) {
            $userId = session('user')['id'];
            $totalPrice = $products = Product::join('carts', 'products.id', '=', 'product_id')->where('user_id', '=', $userId)->sum('price');

            $products = Product::join('carts', 'products.id', '=', 'product_id')->where('user_id', '=', $userId)->get();

            return view('order-from-cart', ['products' => $products, 'totalPrice' => $totalPrice]);

        } else {
            return redirect('/signin');
        }
    }

    function orderNowFromCart(Request $request)
    {
        $userId = session('user')['id'];
        $carts = Cart::where('user_id', $userId)->get();
        foreach ($carts as $cart) {
            $order = new Order();
            $order->user_id = $userId;
            $order->product_id = $cart->product_id;
            $order->address = $request->input('address');
            $order->quantity = 1;
            $order->save();
            $cart->delete();
        }

        return view('order-success');
    }
    function myOrders()
    {
        if (session()->has('user')) {
            $userId = session('user')['id'];
            $orders = Order::join('products', 'products.id', 'product_id')->where('user_id', $userId)->get();
            return view("my-orders", ['orders' => $orders]);
        }else{
            return redirect('signin');
        }
    }
    function adminOrders()
    {
        $orders = Order::join('products', 'products.id', 'product_id')->join('users', 'users.id', 'user_id')->get(['orders.id', 'products.name', 'products.image', 'username', 'orders.address', 'orders.quantity', 'orders.status', 'orders.created_at']);
        return view('admin.admin-orders', ['orders' => $orders]);
    }
    function approve($id)
    {
        $order = Order::find($id);
        if ($order->status == "pending") {
            $productId = $order->product_id;
            $orderQuantity = $order->quantity;
            $product = Product::find($productId);
            $product->quantity -= $orderQuantity;
            $product->save();
        }
        $order->status = "approved";
        $order->save();
        return redirect('admin-orders');
    }
    function disapprove($id)
    {
        $order = Order::find($id)->delete();
        return redirect('admin-orders');
    }

}
