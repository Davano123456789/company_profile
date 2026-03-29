@extends('layouts.masterDashboard')

@section('title', 'Kelola Klien')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="card-title mb-0">Daftar Klien</h4>
          <a href="{{ route('dashboard.clients.create') }}" class="btn btn-primary btn-sm">
            <i class="ti-plus mr-1"></i> Tambah Klien
          </a>
        </div>



        <div class="table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Nama Klien</th>
                <th>Lokasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($clients as $client)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @if($client->logo)
                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" height="40" class="rounded">
                  @else
                    <span class="text-muted">No Logo</span>
                  @endif
                </td>
                <td class="font-weight-bold">{{ $client->name }}</td>
                <td>{{ $client->location ?? '–' }}</td>
                <td>
                  <a href="{{ route('dashboard.clients.edit', $client->id) }}" class="btn btn-warning btn-xs mr-1">
                    <i class="ti-pencil"></i>
                  </a>
                  <form action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST" id="delete-form-{{ $client->id }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="button" class="btn btn-danger btn-xs" onclick="confirmDelete('delete-form-{{ $client->id }}', 'Klien {{ $client->name }} akan dihapus!')">
                      <i class="ti-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center text-muted py-4">Belum ada data klien.</td>
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
