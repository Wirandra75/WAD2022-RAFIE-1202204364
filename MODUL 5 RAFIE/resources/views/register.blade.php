@extends('template.layout')

@section('container')
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-6 min-vh-100 bg-image"></div>
      <div class="col-md-6">
        <div class="m-auto" style="width: 85%">
          <h2 class="fw-bold mb-4">Register</h2>
          <form action="/register" method="post">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="no_hp" class="form-label">Nomor Handphone</label>
              <input type="tel" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="no_hp" name="no_hp" required>
              @error('no_hp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror 
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Kata Sandi</label>
              <input type="password" class="form-control" id="password" name="password" required> 
            </div>
            <div class="mb-4">
              <label for="konfirmasi_password" class="form-label">Konfirmasi Kata Sandi</label>
              <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" id="konfirmasi_password" name="konfirmasi_password" required>
              @error('konfirmasi_password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
          </form>
          <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection