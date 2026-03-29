@extends('layouts.masterDashboard')

@section('title', 'Daftar Kategori')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title mb-0">Daftar Kategori</h4>
          <a href="{{ route('dashboard.project-categories.create') }}" class="btn btn-primary btn-sm">
            <i class="ti-plus mr-1"></i> Tambah Kategori
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $category)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="font-weight-bold">{{ $category->name }}</td>
                <td>
                  <a href="{{ route('dashboard.project-categories.edit', $category->id) }}" class="btn btn-warning btn-xs mr-1">
                    <i class="ti-pencil"></i>
                  </a>
                  <form action="{{ route('dashboard.project-categories.destroy', $category->id) }}" method="POST" id="delete-form-{{ $category->id }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="button" class="btn btn-danger btn-xs" onclick="confirmDelete('delete-form-{{ $category->id }}', 'Kategori {{ $category->name }} akan dihapus!')">
                      <i class="ti-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="4" class="text-center text-muted py-4">Belum ada data kategori.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
