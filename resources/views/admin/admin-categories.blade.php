@extends('admin.admin-master')
@section('admin-section')
<div class="row pt-3">
    <a href="add-category" class="btn btn-success offset-10">Add Category</a>
</div>
    <div class="table-responsive p-3">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">No of Products</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category['id']}}</th>
                    <td><img src="storage/{{$category['category_image']}}" alt="" style="width:75px"></td>
                    <td>{{$category['category_name']}}</td>
                    <td>{{$category['no_of_products']}}</td>
                    <td><a href="update-category/{{$category['id']}}" class="btn btn-primary">Update</a></td>
                    <td><a href="delete-category/{{$category['id']}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
