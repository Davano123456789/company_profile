@extends('layouts.masterDashboard')

@section('title', 'Edit Klien')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Edit Klien</h4>

        <form class="forms-sample" action="{{ route('dashboard.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')

          <div class="form-group">
            <label>Nama Klien <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $client->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
                   value="{{ old('location', $client->location) }}" placeholder="Kota / Alamat singkat">
            @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Logo</label>
            @if($client->logo)
              <div class="mb-3">
                <img src="{{ asset('storage/' . $client->logo) }}" height="50" class="rounded">
                <small class="text-muted ml-2">Logo saat ini</small>
              </div>
            @endif
            <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
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
