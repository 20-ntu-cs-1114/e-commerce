<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CarouselController extends Controller
{
    //
    function showCarousel()
    {
        $carousels = Carousel::all();
        return view('admin.carousels', ['carousels' => $carousels]);
    }
    function addCarousel(Request $request)
    {
        $carousel = new Carousel();
        if ($request->file('carousel_image')) {
            $imageName = $request->file('carousel_image')->getClientOriginalName();
            $imageSize = $request->file('carousel_image')->getSize();
            $imageExtension = $request->file('carousel_image')->extension();
            $validExtensions = ['png', 'jpg'];
            if (in_array($imageExtension, $validExtensions, false)) {
                if ($imageSize < 7000000) {
                    $request->file('carousel_image')->storeAs('public', $imageName);
                    $carousel->image = $imageName;
                    $carousel->save();
                    return redirect('add-carousel?upload=success');
                } else
                    return redirect('add-carousel?error=size');
            } else{
                return redirect('add-carousel?error=extension');
            }
        }else{
            return redirect('add-carousel?error=empty');
        }



    }
    function deleteCarousel($id)
    {
        $carousel = Carousel::find($id)->delete();
        return redirect('/carousels');
    }
}
