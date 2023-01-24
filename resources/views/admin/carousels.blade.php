@extends('admin.admin-master')
@section('admin-section')
<div class="row pt-3">
    <a href="/add-carousel" class="btn btn-success offset-10">Add Image</a>
</div>
<div class="table-responsive p-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carousels as $carousel)
            <tr>
                <th scope="row">{{$carousel['id']}}</th>
                <td><img src="storage/{{$carousel['image']}}" alt="" style="width:75px"></td>
                <td><a href="delete-carousel/{{$carousel['id']}}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@foreach ($carousels as $carousel)

@endforeach
@endsection
