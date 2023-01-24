@extends('master')
@section('section')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 ">
                <img class="single-product-image" src="storage/{{ $product['image'] }}" alt="dffd">
            </div>
            <div class="col-md-5 single-product-detail-container">
                <div class="single-product-detail">
                    <h1>{{ $product['name'] }}</h1>
                    <p>{{ $product['description'] }}</p>
                </div>
                <div class="row ">
                    <div class="single-product-buttons">
                        <a href="order/{{$product['id']}}" class="btn btn-success m-2">Buy</a>
                        <a href="/add-to-cart/{{$product['id']}}" class="btn btn-outline-secondary m-2">Add to Cart</a>
                        <h6 class="ml-2">In Stock: {{$product['quantity']}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Description</h2>
      <p>{{$product['description']}}</p>
    </div>
@endsection
