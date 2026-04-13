@extends('layouts.masterDashboard')

@section('title', 'Tambah Layanan')

@section('content')
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Layanan Jasa</h4>
        <p class="card-description">Masukkan detail layanan baru.</p>
        
        <form class="forms-sample" action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Nama Layanan</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Layanan" value="{{ old('name') }}" required>
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Deskripsi layanan...">{{ old('description') }}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Harga Dasar (Rp) - Opsional</label>
            <input type="number" min="0" class="form-control" id="price" name="price" placeholder="Contoh: 500000" value="{{ old('price') }}">
          </div>
          <div class="form-group">
            <label>Gambar Layanan (Opsional)</label>
            <input type="file" name="image" class="file-upload-default" id="imageInput" accept="image/*" onchange="previewImage()">
            <div class="input-group col-xs-12">
              <input type="text" id="imageName" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button" onclick="document.getElementById('imageInput').click()">Upload</button>
              </span>
            </div>
            <div class="mt-3" id="previewContainer" style="display: none;">
              <p class="text-xs text-muted mb-2">Preview Gambar:</p>
              <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail" style="max-height: 200px; border-radius: 10px;">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="{{ route('dashboard.services.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function previewImage() {
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('previewContainer');
    const imageName = document.getElementById('imageName');

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      
      imageName.value = input.files[0].name;

      reader.onload = function(e) {
        preview.src = e.target.result;
        container.style.display = 'block';
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
