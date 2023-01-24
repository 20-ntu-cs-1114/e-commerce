@extends('master')
@section('section')
<div class="container pt-5">
    <form action="/order-now-from-cart" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" name="tatal_price" class="form-control" disabled id="total_price" value="{{$totalPrice}}">
        </div>
        <button type="submit" class="btn btn-success ">Order</button>
    </form>
</div>

<script>


// $(document).ready(function(){
//   $('#product_quantity').blur(function(){

//     $currentValue = $('#total_price').val();
//     $quantity = $("#product_quantity").val();
//     $newValue = $currentValue * $quantity;
//     $('#total_price').val($newValue);
//   })
// });
</script>
@endsection
