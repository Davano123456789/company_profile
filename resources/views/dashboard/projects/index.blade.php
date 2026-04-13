@extends('layouts.masterDashboard')

@section('title', 'Kelola Proyek')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="card-title mb-0">Daftar Proyek</h4>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary btn-sm">
              <i class="ti-plus mr-1"></i> Tambah Proyek
            </a>
          </div>



          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Judul Proyek</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($projects as $project)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" height="45"
                          class="rounded">
                      @else
                        <span class="text-muted">No Image</span>
                      @endif
                    </td>
                    <td class="font-weight-bold">{{ $project->title }}</td>
                    <td><span class="badge badge-info">{{ $project->category->name ?? '–' }}</span></td>
                    <td>
                      <!-- tombol edit dengan membawa id -->
                      <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-warning btn-xs mr-1">
                        <i class="ti-pencil"></i>
                      </a>
                      <!-- tombol hapus dengan membawa id -->
                      <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST"
                        id="delete-form-{{ $project->id }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="button" class="btn btn-danger btn-xs"
                          onclick="confirmDelete('delete-form-{{ $project->id }}', 'Proyek {{ $project->title }} akan dihapus!')">
                          <i class="ti-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada data proyek.</td>
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