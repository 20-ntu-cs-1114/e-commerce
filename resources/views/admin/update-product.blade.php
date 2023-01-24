@extends('admin.admin-master')
 @section('admin-section')
 @if (isset($_GET['update']) && $_GET['update']=='success')
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Congratulation: </strong>updated successfully.
      </div>
@endif
    <div class="container mt-5">

        <div class="row">
            <div class="add-product">
                <form action="/update-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-center">Update Product</h2>
                    <input type="text" name="pid" hidden value="{{$product['id']}}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pname" placeholder="Product Name" name="pname" value="{{$product['name']}}" required>
                    </div>
                    <div class="form-group">
                        <textarea name="pdesc" id="pdesc" cols="30" rows="10" placeholder="Product Description"
                            class="form-control"  required>{{$product['description']}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pprice" placeholder="Product Price" name="pprice" value="{{$product['price']}}" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="pquantity" placeholder="Product Quantity" name="pquantity" value="{{$product['quantity']}}" required>
                    </div><br>
                    <select name="cid" id="cid" class="form-control" required>
                        {{$selected = "selected"}}
                        @foreach($categories as $category)
                        <option {{$category['id']===$product['category_id']?"selected":""}} value="{{$category['id']}}">{{$category['category_name']}}</option>
                        @endforeach
                    </select><br><br>
                    <div class="custom-file" >
                        <input type="file" class="custom-file-input" id="pimage" name="pimage">
                        <label class="custom-file-label" for="pimage">Choose file</label>
                    </div><br><br>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>

    </div>
@endsection
