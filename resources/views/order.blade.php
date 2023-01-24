@extends('master')
@section('section')
    <div class="container pt-5">
        <form action="/order-now" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
            <div class="form-group">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" disabled class="form-control"
                    value="{{ $product['name'] }}">
            </div>
            <div class="form-group">
                <label for="product_price" class="form-control-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" disabled class="form-control"
                    value="{{ $product['price'] }}">
            </div>
            <div class="form-group">
                <label for="product_quantity" class="form-control-label">Product Quantity</label>
                <input type="text" name="product_quantity" id="product_quantity" class="form-control" value="1">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="total_price">Total Price</label>
                <input type="number" name="tatal_price" class="form-control" disabled id="total_price"
                    value="{{ $product['price'] }}">
            </div>
            <button type="submit" class="btn btn-success ">Order</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#product_quantity').blur(function() {

                $currentValue = $('#total_price').val();
                $quantity = $("#product_quantity").val();
                $newValue = $currentValue * $quantity;
                $('#total_price').val($newValue);
            })
        });
    </script>
@endsection
