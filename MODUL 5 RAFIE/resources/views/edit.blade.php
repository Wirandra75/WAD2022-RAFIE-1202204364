@extends('template.layout')

@section('container')
  @include('components.navbar')
  <div class="container mt-4">
    <h2 class="fw-bold">{{ $showroom->name }}</h2>
    <p>Edit Mobil {{ $showroom->name }}</p>
    <div class="row mt-5 justify-content-between">
      <div class="col-md-5">
        <img class="rounded-3" src="{{ asset('storage/gambar/') }}/{{ $showroom->image }}" alt="{{ $showroom->image }}" style="width: 90%;"">
      </div>
      <div class="col-md-7">
        <form action="/showroom/{{ $showroom->id }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Mobil</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $showroom->name }}" required>
          </div>
          <div class="mb-3">
            <label for="owner" class="form-label fw-bold">Nama Pemilik</label>
            <input type="text" name="owner" class="form-control" id="owner" value="{{ $showroom->owner }}" required>
          </div>
          <div class="mb-3">
            <label for="brand" class="form-label fw-bold">Merk</label>
            <input type="text" name="brand" class="form-control" id="brand" value="{{ $showroom->brand }}" required>
          </div>
          <div class="mb-3">
            <label for="purchase_date" class="form-label fw-bold">Tanggal Beli</label>
            <input type="date" name="purchase_date" class="form-control" id="purchase_date" value="{{ $showroom->purchase_date }}" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $showroom->description }}</textarea>
          </div>
          <div class="mb-3 position-relative file">
            <label for="image" class="form-label fw-bold">Foto</label>
            <input class="form-control" name="image" type="file" id="image" accept="image/*">
          </div>
          <div class="mb-3">
            <span class="d-block mb-2 fw-bold">Status Pembayaran</span>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="lunas" value="Lunas" {{ $showroom->status === "Lunas" ? "checked" : "" }} required>
              <label class="form-check-label" for="lunas">Lunas</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="belumlunas" value="Belum Lunas" {{ $showroom->status === "Belum Lunas" ? "checked" : "" }} required>
              <label class="form-check-label" for="belumlunas">Belum Lunas</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        </form>
      </div>
    </div>
  </div>
@endsection