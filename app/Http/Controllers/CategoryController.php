<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //
    function showCategoriesToAdmin()
    {
        $categories = Category::all();
        return view('admin.admin-categories', ['categories' => $categories]);
    }
    function getProductsFromCategory(Request $request){
        $id = $request->id;
        $products = Product::join('categories','categories.id','category_id')->where('categories.id','=',$id)->get('products.*','categories.*','products.id AS pid');
        return view('category', ['products' => $products]);
    }
    function addCategory(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->input('cname');
        $categoryName = $request->input('cname');
        // If image is selected then validation will be check
        if ($request->file('cimage')) {
            $imageName = $request->file('cimage')->getClientOriginalName();
            $imageSize = $request->file('cimage')->getSize();
            $imageExtension = $request->file('cimage')->extension();
            $category->category_image = $imageName;
            $validExtensions = ['png', 'jpg'];

            if (in_array($imageExtension, $validExtensions, false)) {
                if ($imageSize < 7000000) {
                    $request->file('cimage')->storeAs('public', $imageName);
                    $category->save();
                } else
                    return "Image Size is greater";
            } else
                return "Extension not avaiable";
        }
        $data = array(
            'upload' => 'success',
            'cname' => $categoryName
        );

        $query_string = http_build_query($data);

        $category->save();
        return redirect('add-category?' . $query_string);

    }
    function updateCategoryForm($id)
    {
        $category = Category::find($id);
        return view('admin.update-category', ['category' => $category]);
    }
    function updateCategory(Request $request)
    {
        $categoryId = $request->input('cid');
        $category = Category::find($categoryId);
        $category->category_name = $request->input('cname');
        if ($request->file('cimage')) {
            $imageName = $request->file('cimage')->getClientOriginalName();
            $imageSize = $request->file('cimage')->getSize();
            $imageExtension = $request->file('cimage')->extension();
            $category->category_image = $imageName;
            $validExtensions = ['png', 'jpg'];

            if (in_array($imageExtension, $validExtensions, false)) {
                if ($imageSize < 7000000) {
                    $request->file('cimage')->storeAs('public', $imageName);
                    $category->save();
                } else
                    return "Image Size is greater";
            } else
                return "Extension not avaiable";
        }else{
            $oldImage = $category->category_image;
            $category->category_image = $oldImage;
        }
        $category->save();
        return redirect('/update-category/' . $categoryId . '?update=success');

    }
    function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin-categories');

    }
}
