@extends('admin.admin-master')
@section('admin-section')
<div class="container-fluid">
    <div class="table-responsive pt-2">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Username</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    {{-- <th scope="col">Price</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>

                    <th scope="row">{{$order['id']}}</th>
                    <td><img src="storage/{{$order['image']}}" alt="" style="width:75px"></td>
                    <td>{{$order['username']}}</td>
                    <td>{{$order['name']}}</td>
                    <td>{{$order['address']}}</td>
                    <td>{{$order['quantity']}}</td>
                    <td>{{$order['status']}}</td>
                    <td><a href="approve/{{$order['id']}}" class="btn btn-success">Approve</a></td>
                    <td><a href="disapprove/{{$order['id']}}" class="btn btn-danger">Disapprove</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
