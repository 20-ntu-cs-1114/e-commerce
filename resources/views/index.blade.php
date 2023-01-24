@extends('master')
@section('section')
    <div class="container-fluid">
        {{-- Carousel --}}
        <div class="carousels-container">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($i = 0; $i < sizeof($carousels); $i++)
                        <li data-target="#carousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                        </li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach ($carousels as $index => $carousel)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class=" carousel-image" src="storage/{{ $carousel['image'] }}" alt="First slide">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{-- Carousel End --}}
        <div class="container">
            <div class="wrapper">
                <h2 class="text-center">Top Categories</h2>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="storage/{{ $category['category_image'] }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category['category_name'] }}</h5>
                                    <a href="/categories/{{ $category['id'] }}" class="btn btn-primary">Explore</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="wrapper">
                <h2 class="text-center">Top Shoes</h2>
                <div class="row">
                    @foreach ($shoes as $shoe)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="storage/{{ $shoe['image'] }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $shoe['name'] }}</h5>
                                    <a href="/single-product?id={{ $shoe['pid'] }}" class="btn btn-primary">Detail</a>
                                    <a href="/add-to-cart/{{ $shoe['pid'] }}" class="btn btn-secondary">Add to
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="wrapper">
                <h2 class="text-center">Top Clothes</h2>
                <div class="row">
                    @foreach ($clothes as $cloth)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card custom-card">
                                <img class="card-img-top" src="storage/{{ $cloth['image'] }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cloth['name'] }}</h5>
                                    <a href="/single-product?id={{ $cloth['pid'] }}" class="btn btn-primary">Detail</a>
                                    <a href="/add-to-cart/{{ $cloth['pid'] }}" class="btn btn-secondary">Add to
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endsection
