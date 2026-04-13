@extends('layouts.masterDashboard')

@section('title', 'Client Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Welcome, {{ auth()->user()->name }}</h3>
        <h6 class="font-weight-normal mb-0">Lihat status pemesanan jasa Anda.</h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <p class="card-title mb-0">Pesanan Saya</p>
          <a href="{{ route('pesan-jasa') }}" class="btn btn-primary btn-sm rounded">Pesan Jasa Baru</a>
        </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Layanan</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($orders as $index => $order)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                  <td class="font-weight-bold">{{ $order->service->name }}</td>
                  <td>{{ $order->address ?? '-' }}</td>
                  <td>
                    @if($order->status == 'pending')
                      <div class="badge badge-warning text-white">Menunggu Konfirmasi</div>
                    @elseif($order->status == 'in_progress')
                      <div class="badge badge-info">Dikerjakan</div>
                    @elseif($order->status == 'completed')
                      <div class="badge badge-success">Selesai</div>
                    @else
                      <div class="badge badge-danger">Ditolak</div>
                    @endif
                  </td>
                  <td>
                    @if($order->status == 'in_progress')
                      <form id="complete-form-{{ $order->id }}" action="{{ route('client.order.complete', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="button" class="btn btn-success btn-sm text-white" 
                          onclick="completeOrder({{ $order->id }})">
                          <i class="ti-check"></i> Konfirmasi Selesai
                        </button>
                      </form>
                    @endif
                    @if($order->receipt_image)
                      <a href="{{ asset('storage/' . $order->receipt_image) }}" target="_blank" class="btn btn-info btn-sm text-white mt-1 mt-md-0">
                        <i class="ti-file"></i> Bukti Pembayaran
                      </a>
                    @endif
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center">Belum ada pesanan layanan.</td>
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

@push('scripts')
<script>
  function completeOrder(orderId) {
    Swal.fire({
      title: 'Konfirmasi Selesai?',
      text: "Apakah Anda yakin jasa ini sudah selesai dikerjakan dengan baik?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Selesai!',
      cancelButtonText: 'Belum'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('complete-form-' + orderId).submit();
      }
    });
  }
</script>
@endpush
