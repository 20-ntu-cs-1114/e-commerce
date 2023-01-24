@extends('master')
@section('section')
<div class="container">
    <h2 class="mt-3 mb-3">Cart</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card custom-card">
                    <img class="card-img-top" src="storage/{{ $product['image'] }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <a href="/single-product?id={{ $product['id'] }}" class="btn btn-primary">Detail</a>
                        <a href="/remove-cart/{{ $product['cartId'] }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if (sizeof($products)==0)
        <div class="alert alert-warning">Cart is empty</div>
    @else
        <a href="/order-from-cart" class="btn btn-success mt-3">Order All</a>
    @endif
</div>
@endsection
