@extends('master')
@section('section')
@if (isset($_GET['signin']) && $_GET['signin']=='fail')
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed to login</strong>
</div>
@endif
<div class="custom-signup-container">
    <form action="/signin" method="POST">
        <h2 class="text-center pb-5">Login</h2>
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username">
          {{-- <small id="usernmaeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
