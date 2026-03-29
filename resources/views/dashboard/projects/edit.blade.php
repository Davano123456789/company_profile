@extends('layouts.masterDashboard')

@section('title', 'Edit Proyek')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Edit Proyek</h4>

        <form class="forms-sample" action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
          @csrf @method('PUT')

          <div class="form-group">
            <label>Judul Proyek <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $project->title) }}" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Kategori <span class="text-danger">*</span></label>
            <select name="project_category_id" class="form-control @error('project_category_id') is-invalid @enderror" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}"
                  {{ old('project_category_id', $project->project_category_id) == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
            @error('project_category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group">
            <label>Foto Proyek</label>
            @if($project->image)
              <div class="mb-3">
                <img src="{{ asset('storage/' . $project->image) }}" height="70" class="rounded">
                <small class="text-muted ml-2">Gambar saat ini</small>
              </div>
            @endif
            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
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
