@extends('layouts.masterDashboard')

@section('title', 'Tambah Proyek')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Tambah Proyek Baru</h4>

        <form class="forms-sample" action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Judul Proyek <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}" placeholder="Nama / deskripsi singkat proyek..." required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Kategori <span class="text-danger">*</span></label>
            <select name="project_category_id" class="form-control @error('project_category_id') is-invalid @enderror" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('project_category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('project_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Foto Proyek <span class="text-danger">*</span></label>
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"
                   accept="image/*" required>
            <small class="form-text text-muted">Format: JPG, PNG, WEBP. Maks 5MB.</small>
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="d-flex">
            <button type="submit" class="btn btn-primary mr-2"><i class="ti-check mr-1"></i> Simpan</button>
            <a href="{{ route('dashboard.projects.index') }}" class="btn btn-light">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
