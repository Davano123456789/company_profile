@extends('layouts.masterDashboard')

@section('title', 'Tambah Klien')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Tambah Klien Baru</h4>

        <form class="forms-sample" action="{{ route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Nama Klien <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="PT. / CV. / Instansi..." required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                   value="{{ old('location') }}" placeholder="Kota / Alamat singkat">
            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Format: JPG, PNG. Maks 2MB.</small>
            @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="d-flex">
            <button type="submit" class="btn btn-primary mr-2"><i class="ti-check mr-1"></i> Simpan</button>
            <a href="{{ route('dashboard.clients.index') }}" class="btn btn-light">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
