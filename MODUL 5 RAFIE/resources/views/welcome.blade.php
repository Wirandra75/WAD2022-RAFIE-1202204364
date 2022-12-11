@extends('template.layout')

@section('container')
  @include('components.navbar')
  <div class="container d-flex align-content-center">
    <div class="row align-items-center welcome">
      <div class="col-md-6">
        @guest    
          <h1 class="fw-bold">Selamat Datang di Showroom</h1>
        @else
          <h1 class="fw-bold">Selamat Datang di Showroom {{ auth()->user()->name }}</h1>
        @endguest
        <p>ShowRoom Rafie merupakan penyedia jasa transportasi rental dan sewa mobil murah. Kami menyediakan Armada dengan banyak pilihan dan semua mobil masih baru. Kami pun menyediakan paket sewa mobil harian, mingguan dan bulanan maupun paket liburan wisata. </p>
        <a class="btn btn-primary" href="/showroom" style="position: relative; top: 50px">MyCar</a>
        <div class="d-flex align-items-center" style="position: relative; top: 145px">
          <img src="/gambar/logo-ead.png" alt="Logo EAD" width="100">
          <span class="ms-3">RAFIE_1202204364</span>
        </div>
      </div>
      <div class="col-md-6">
        <img class="rounded-3" src="/gambar/mustang.jpg" alt="Mustang" width="100%" height=500px">
      </div>
    </div>
  </div>

  @if(session()->has('toast-kuning'))
    <div class="position-fixed" style="bottom: 10px; right: 10px;">
      @include('components.toast-kuning')
    </div>
  @endif
@endsection