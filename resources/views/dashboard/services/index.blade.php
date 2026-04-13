@extends('layouts.masterDashboard')

@section('title', 'Data Layanan')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="card-title mb-0">Data Layanan Jasa</p>
            <a href="{{ route('dashboard.services.create') }}" class="btn btn-primary btn-sm text-white">
                <i class="ti-plus"></i> Tambah Layanan
            </a>
        </div>
        <div class="table-responsive">
          <table id="example" class="display table">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Layanan</th>
                <th>Harga Dasar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($services as $index => $service)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Gambar" style="width:50px;height:50px;border-radius:10px;object-fit:cover">
                  @else
                    -
                  @endif
                </td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price ? 'Rp ' . number_format($service->price, 0, ',', '.') : '-' }}</td>
                <td>
                  <a href="{{ route('dashboard.services.edit', $service->id) }}" class="btn btn-warning btn-sm text-white"><i class="ti-pencil"></i> Edit</a>
                  <form id="delete-form-{{ $service->id }}" action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete('delete-form-{{ $service->id }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash"></i> Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
@endpush
