@extends('template.layout')

@section('container')
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-6 min-vh-100 bg-image"></div>
      <div class="col-md-6">
        <div class="m-auto" style="width: 85%">
          <h2 class="fw-bold mb-4">Login</h2>
          <form action="/login" method="post">
            @csrf
            <div class="mb-3 position-relative">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required> 
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="remember" name="remember">
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <p class="mt-3">Belum punya akun? <a href="/register">Daftar</a></p>
        </div>
      </div>
    </div>
  </div>

  @if(session()->has('toast-biru'))
    <div class="position-fixed" style="top: 10px; right: 10px">
      @include('components.toast-biru')
    </div>
  @elseif(session()->has('toast-merah'))
    <div class="position-fixed" style="top: 10px; right: 10px">
      @include('components.toast-merah')
    </div>
  @endif
  
@endsection