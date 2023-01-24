<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    //
    function index(){
        $products =  Product::all();
        $carousels = Carousel::all();
        $categories = Category::limit(4)->get();



        $shoes = Product::join('categories', 'products.category_id', '=', 'categories.id')
               ->where('category_name','=','shoe')->get(['products.*','categories.*','products.id AS pid']);

        $clothes = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('category_name','=','cloth')->get(['products.*','categories.*','products.id AS pid']);
        $data = ['products' => $products, 'carousels' => $carousels, 'shoes' => $shoes, 'clothes' => $clothes, 'categories' => $categories];

         return view('index',$data);
    }
    function shop(){
        $products =  Product::all();
        return view('shop',['products'=>$products]);
    }
    function showProducts()
    {
        $products =  Product::all();
        return view('admin.index',['products'=>$products]);
    }
    function addProductForm(){
        $categories = Category::all();
        return view('admin.add-product', ['categories' => $categories]);
    }
    function addProduct(Request $request)
    {

        $product = new Product();
        $product->name = $request->input('pname');
        $product->description = $request->input('pdesc');
        $product->price = $request->input('pprice');
        $product->quantity = $request->input('pquantity');
        $product->category_id = $request->input('cid');
        // If user select image then all the validation of image will be check else record will be save without image and its validation
        if ($request->file('pimage')) {
            $imageName = $request->file('pimage')->getClientOriginalName();
            $imageSize = $request->file('pimage')->getSize();
            $imageExtension = $request->file('pimage')->extension();
            $product->image = $imageName;
            $validExtensions = ['png', 'jpg'];

            if (in_array($imageExtension, $validExtensions, false)) {
                if ($imageSize < 7000000){
                    $request->file('pimage')->storeAs('public',$imageName);
                }
                else
                    return "Image Size is greater";
            } else
                return "Extension not avaiable";
        }
        $productName = $request->input('pname');
        $data = array(
            'upload' => 'success',
            'pname' => $productName
          );

          $query_string = http_build_query($data);

        if($product->save());
            return redirect('add-product?' . $query_string);



    }
    function updateProductForm($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update-product', ['product' => $product,'categories'=>$categories]);
    }

    function updateProduct(Request $request){
        $productId = $request->input('pid');
        $product = Product::find($request->input('pid'));
        $product->name = $request->input('pname');
        $product->description = $request->input('pdesc');
        $product->price = $request->input('pprice');
        $product->quantity = $request->input('pquantity');
        $product->category_id = $request->input('cid');

        if ($request->file('pimage')) {
            $imageName = $request->file('pimage')->getClientOriginalName();
            $imageSize = $request->file('pimage')->getSize();
            $imageExtension = $request->file('pimage')->extension();
            $product->image = $imageName;
            $validExtensions = ['png', 'jpg'];

            if (in_array($imageExtension, $validExtensions, false)) {
                if ($imageSize < 7000000){
                    $request->file('pimage')->storeAs('public',$imageName);
                }
                else
                    return "Image Size is greater";
            } else
                return "Extension not avaiable";
        }else{
            $oldImage = $product['image'];
            $product->image = $oldImage;
        }
        $product->save();
        return redirect('/update-product/'.$productId.'?update=success');

    }
    function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin');
    }

    function singleProduct(){
        $id = $_GET['id'];
        $product = Product::find($id);
        return view('/single-product',['product'=>$product]);
    }
    function searchProducts(Request $request){
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('search-products',['products'=>$products,'search'=>$search]);
    }

    // // Order
    // function order($id){
    //     if(session()->has('user')){
    //         $product = Product::find($id);
    //         return view('order',['product'=>$product]);
    //     }else{
    //         return redirect('/signin');
    //     }
    // }
    // function orderFromCart(){
    //     if(session()->has('user')){
    //         $userId = session('user')['id'];
    //         $products = Product::join('carts','products.id','=','product_id')->where('user_id','=',$userId)->sum('price');
    //         // return view('cart', ['products' => $products]);
    //         return $products;

    //     }else{
    //         return redirect('/signin');
    //     }
    // }
    // function orderNow(Request $request){
    //     $order = new Order();
    //     $order->user_id = session('user')['id'];
    //     $order->product_id = $request->input('product_id');
    //     $order->quantity = $request->input('product_quantity');
    //     $order->address = $request->input('address');
    //     if($order->save()){
    //         return redirect('order-success');
    //     }

    // }
}
