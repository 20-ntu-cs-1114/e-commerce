@extends('admin.admin-master')
 @section('admin-section')
 @if (isset($_GET['upload']) && $_GET['upload']=='success')
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation </strong>{{$_GET['pname']}} is added successfully.
      </div>
@endif
    <div class="container mt-5">

        <div class="row">
            <div class="add-product">
                <form action="add-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center">Add Product</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pname" placeholder="Product Name" name="pname" required>
                    </div>
                    <div class="form-group">
                        <textarea name="pdesc" id="pdesc" cols="30" rows="10" placeholder="Product Description"
                            class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pprice" placeholder="Product Price" name="pprice" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pquantity" placeholder="Product Quantity" name="pquantity" required>
                    </div><br>
                    <select name="cid" id="cid" class="form-control" required>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                        @endforeach
                    </select><br><br>
                    <div class="custom-file" >
                        <input type="file" class="custom-file-input" id="pimage" name="pimage">
                        <label class="custom-file-label" for="pimage">Choose file</label>
                    </div><br><br>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>

    </div>
@endsection
