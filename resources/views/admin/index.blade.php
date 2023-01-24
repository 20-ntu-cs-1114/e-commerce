@extends('admin.admin-master')
@section('admin-section')
<div class="container-fluid">
    <div class="row pt-2">
        <a href="add-product" class="btn btn-success offset-10">Add Product</a>
    </div>
        <div class="table-responsive pt-2">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>

                        <th scope="row">{{$product['id']}}</th>
                        <td><img src="storage/{{$product['image']}}" alt="" style="width:75px"></td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['price']}}</td>
                        <td>{{$product['quantity']}}</td>
                        <td><a href="update-product/{{$product['id']}}" class="btn btn-primary">Update</a></td>
                        <td><a href="delete-product/{{$product['id']}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
<div>
    <i class="fa fa-edge" aria-hidden="true"></i>
</div>
@endsection
