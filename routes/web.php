<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use NunoMaduro\Collision\Provider;
use Symfony\Component\HttpFoundation\Session\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);
Route::view('/404', '404');
//Sign Up Get & Post
Route::get('signup', function () {
    return view('signup');
});
Route::post('signup', [UserController::class, 'signup']);

// Sign in Get & Post
Route::get('signin', function () {
    return view('signin');
});
Route::post('signin', [UserController::class, 'signin']);

// Logout
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/signin');
});

Route::get('single-product', [ProductsController::class,'singleProduct']);
Route::get('shop', [ProductsController::class, 'shop']);

    /////////////  Admin Panel   ////////

Route::group(['middleware' => ['admin']],function(){

    Route::get('admin', [ProductsController::class,'showProducts']);

    //Add Product Get & Post
    Route::post('add-product', [ProductsController::class, 'addProduct']);
    Route::get('add-product',[ProductsController::class,'addProductForm']);
    // Update Product
    Route::get('update-product/{id}', [ProductsController::class, 'updateProductForm']);
    Route::post('update-product', [ProductsController::class, 'updateProduct']);
    // Delete Product
    Route::get('delete-product/{id}', [ProductsController::class, 'deleteProduct']);

    // Categories Get & Post
    Route::get('admin-categories', [CategoryController::class, 'showCategoriesToAdmin']);
    Route::get('add-category', function () {
        return view('admin.add-category');
    });
    Route::post('add-category', [CategoryController::class, 'addCategory']);
    // Update Category
    Route::get('update-category/{id}', [CategoryController::class, 'updateCategoryForm']);
    Route::post('/update-category', [CategoryController::class, 'updateCategory']);
    // Delete Category
    Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory']);

    //Orders
    Route::get('/admin-orders', [OrderController::class, 'adminOrders']);
    Route::get('approve/{id}', [OrderController::class, 'approve']);
    Route::get('disapprove/{id}', [OrderController::class, 'disapprove']);

    // Carousel
    Route::get('carousels', [CarouselController::class, 'showCarousel']);
    Route::get('add-carousel', function () {
        return view('admin.add-carousel');
    });
    Route::post('add-carousel', [CarouselController::class, 'addCarousel']);
    Route::get('delete-carousel/{id}', [CarouselController::class, 'deleteCarousel']);

 });


// Search
Route::get('/search-products', [ProductsController::class, 'searchProducts']);

//Cart
Route::get('add-to-cart/{id}',[CartController::class,'addToCart']);
Route::get('/cart', [CartController::class, 'getCartProducts']);
Route::get('/remove-cart/{id}', [CartController::class, 'removeCart']);

// Order
Route::get('/order/{id}', [OrderController::class, 'order']);
Route::post('/order-now', [OrderController::class, 'orderNow']);

Route::get('/order-from-cart', [OrderController::class, 'orderFromCart']);
Route::post("/order-now-from-cart",[OrderController::class,'orderNowFromCart']);

Route::get('/order-success', function () {
    return view('order-success');
});
Route::get('/my-orders', [OrderController::class, 'myOrders']);
// Route::post('search-products', [ProductsController::class, 'searchProducts']);

Route::get('category', [CategoryController::class, 'getProductsFromCategory']);
