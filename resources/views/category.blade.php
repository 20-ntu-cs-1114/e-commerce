@extends('master')
@section('section')
    <div class="container">
        @if (sizeof($products) == 0)
            <div class="alert alert-info mt-3 mb-3">
                <b>Sorry! </b> No Products available.
            </div>
        @else
            <h2 class="mt-3 mb-3">{{ $products[0]['category_name'] }}</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card custom-card">
                            <img class="card-img-top" src="storage/{{ $product['image'] }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <a href="/single-product?id={{ $product['id'] }}" class="btn btn-primary">Detail</a>
                                <a href="/add-to-cart/{{ $product['id'] }}" class="btn btn-secondary">Add to
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
