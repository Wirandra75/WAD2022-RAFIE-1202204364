@extends('template.layout')

@section('container')
  @include('components.navbar')
  <div class="container mt-4">
    <h2 class="fw-bold">My Show Room</h2>
    <p>List Show Room RAFIE_1202204364</p>
    <div class="row mt-5">
      @foreach ($showroom as $mobil)  
        <div class="col-xl-4 mb-5">
          <div class="card rounded-3 shadow h-100">
            <img src="{{ asset('storage/gambar') }}/{{ $mobil->image }}" class="card-img-top p-2 rounded-4 h-100" alt="">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $mobil->name }}</h5>
              <p class="card-text" style="text-align: justify;">{{ Str::limit($mobil->description, 108) }}</p>
              <div class="d-flex">
                <a href="/showroom/{{ $mobil->id }}" class="btn btn-primary rounded-5 px-5 me-3 button">Detail</a>
                <form action="/showroom/{{ $mobil->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger rounded-5 px-5 me-3">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="pb-4">
      <p class="fw-bold">Jumlah Mobil: {{ $jmlMobil }}</p>
    </div>
  </div>

  @if(session()->has('toast-biru'))
    <div class="position-fixed" style="bottom: 10px; right: 10px">
      @include('components.toast-biru')
    </div>
  @elseif(session()->has('toast-merah'))
    <div class="position-fixed" style="bottom: 10px; right: 10px">
      @include('components.toast-merah')
    </div>
  @elseif(session()->has('toast-kuning'))
    <div class="position-fixed" style="bottom: 10px; right: 10px">
      @include('components.toast-kuning')
    </div>
  @endif
@endsection