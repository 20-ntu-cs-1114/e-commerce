@extends('master')
@section('section')
    <div class="container">
        @if (isset($_GET['search']))
        <h2 class="mt-3 mb-3">Search: {{$_GET['search']}}</h2>
        @endif
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                    <div class="card custom-card">
                        <img class="card-img-top" src="storage/{{ $product['image'] }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <a href="/single-product?id={{ $product['id'] }}" class="btn btn-primary">Buy</a>
                            <a href="/add-to-cart/{{ $product['id'] }}" class="btn btn-secondary">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
