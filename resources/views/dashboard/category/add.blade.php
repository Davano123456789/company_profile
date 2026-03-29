@extends('layouts.masterDashboard')

@section('title', 'Tambah Kategori')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Kategori Baru</h4>
        <p class="card-description">Kategori digunakan untuk mengelompokkan proyek.</p>
        
        <form class="forms-sample" action="{{ route('dashboard.project-categories.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama kategori" required>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="{{ route('dashboard.project-categories.index') }}" class="btn btn-light">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
