@extends('template.layout')

@section('container')
  @include('components.navbar')
  <div class="container mt-4">
    <h2 class="fw-bold">Tambah Mobil</h2>
    <p>Tambah Mobil Baru Anda ke List Show Room</p>
    <div class="row mt-4">
      <div class="col-10">
        <form action="/showroom" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nama Mobil</label>
            <input type="text" name="name" class="form-control" id="name" required">
          </div>
          <div class="mb-3">
            <label for="owner" class="form-label fw-bold">Nama Pemilik</label>
            <input type="text" name="owner" class="form-control" id="owner"required>
          </div>
          <div class="mb-3">
            <label for="brand" class="form-label fw-bold">Merk</label>
            <input type="text" name="brand" class="form-control" id="brand" required>
          </div>
          <div class="mb-3">
            <label for="purchase_date" class="form-label fw-bold">Tanggal Beli</label>
            <input type="date" name="purchase_date" class="form-control" id="purchase_date" required">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label fw-bold">Foto</label>
            <input class="form-control" name="image" type="file" id="image" accept="image/*" required>
          </div>
          <div class="mb-3">
            <span class="d-block mb-2 fw-bold">Status Pembayaran</span>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="lunas" value="Lunas" required>
              <label class="form-check-label" for="lunas">Lunas</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="belumlunas" value="Belum Lunas" required>
              <label class="form-check-label" for="belumlunas">Belum Lunas</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mb-5">Selesai</button>
        </form>
      </div>
    </div>
  </div>
@endsection