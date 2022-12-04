@extends('login.layout')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">

  @if(session()->has('success')) 
  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session()->has('loginError')) 
  <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    {{session('loginError')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
  @endif

    <main class="form-signin">
      <h1 class="h3 mt-5 mb-3 fw-normal text-center">Please Login</h1>
      <form action="/" method="post">
        @csrf
        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required>
          <label for="username">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Not Registered ? <a href="/register">Register Now !</a></small>
    </main>
  </div>
</div>
@endsection