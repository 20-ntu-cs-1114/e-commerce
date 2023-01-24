@extends('master')
@section('section')
<div class="custom-signup-container">
    <form action="/signup" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Username">
            {{-- <small id="usernmaeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
          </div>
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
