@extends('admin.admin-master')
@section('admin-section')
    @if (isset($_GET['upload']) && $_GET['upload'] == 'success')
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Congratulation </strong>Image is added successfully.
        </div>
    @elseif (isset($_GET['error']) && $_GET['error'] == 'size')
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error </strong>image size in greater.
        </div>
        @elseif (isset($_GET['error']) && $_GET['error'] == 'extension')
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Sorry </strong>image extension is not supported.
        </div>
        @elseif (isset($_GET['error']) && $_GET['error'] == 'empty')
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error </strong>please select any image.
        </div>
    @endif
    <div class="container pt-5">
        <form action="add-carousel" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input type="file" class="custom-file-input" required name="carousel_image" id="carousel_image">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>
    </div>
@endsection
