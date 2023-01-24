@extends('master')
@section('section')
    <div class="container">
            <h2 class="mt-3 mb-3">My Orders</h2>
            <div class="row ">
                @foreach ($orders as $order)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                        <div class="card custom-card">
                            <img class="card-img-top" src="storage/{{ $order['image'] }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $order['name'] }}</h5>
                                <b>Status: </b> {{ $order['status'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

    </div>
@endsection
