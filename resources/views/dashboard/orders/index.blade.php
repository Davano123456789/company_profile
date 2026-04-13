@extends('layouts.masterDashboard')

@section('title', 'Data Pesanan Jasa')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Data Pemesanan Jasa</p>
        <p class="font-weight-500">Daftar semua pesanan layanan dari klien Anda.</p>
        
        <div class="table-responsive mt-4">
          <table id="example" class="display table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Klien</th>
                <th>Layanan</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $index => $order)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y H:i') }}</td>
                <td>{{ $order->user->name }}</td>
                <td class="font-weight-bold">{{ $order->service->name }}</td>
                <td>{{ $order->address ?? '-' }}</td>
                <td>
                    @if($order->status == 'pending')
                      <div class="badge badge-warning text-white">Pending</div>
                    @elseif($order->status == 'in_progress')
                      <div class="badge badge-info">Dikerjakan</div>
                    @elseif($order->status == 'completed')
                      <div class="badge badge-success">Selesai</div>
                    @else
                      <div class="badge badge-danger">Ditolak</div>
                    @endif
                </td>
                <td>
                  <div class="d-flex" style="gap: 5px;">
                    @if($order->status == 'pending')
                        <form id="confirm-form-{{ $order->id }}" action="{{ route('dashboard.orders.confirm', $order->id) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-success btn-sm text-white" 
                                onclick="confirmOrder({{ $order->id }})">
                                Konfirmasi
                            </button>
                        </form>
                        <form id="reject-form-{{ $order->id }}" action="{{ route('dashboard.orders.reject', $order->id) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm text-white" 
                                onclick="rejectOrder({{ $order->id }})">
                                Tolak
                            </button>
                        </form>
                    @endif
                    @if($order->status == 'in_progress')
                        <form id="complete-form-{{ $order->id }}" action="{{ route('dashboard.orders.complete', $order->id) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-primary btn-sm text-white" 
                                onclick="completeOrderAdmin({{ $order->id }})">
                                Selesaikan
                            </button>
                        </form>
                    @endif
                    @if($order->receipt_image)
                        <a href="{{ asset('storage/' . $order->receipt_image) }}" target="_blank" class="btn btn-info btn-sm text-white"><i class="ti-file"></i> Bukti</a>
                    @else
                        <span class="text-muted text-sm">Tidak ada bukti</span>
                    @endif
                  </div>
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

  function confirmOrder(orderId) {
    Swal.fire({
      title: 'Konfirmasi Pesanan?',
      text: "Setelah dikonfirmasi, pesanan akan masuk ke tahap pengerjaan (In Progress).",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Konfirmasi!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('confirm-form-' + orderId).submit();
      }
    });
  }

  function completeOrderAdmin(orderId) {
    Swal.fire({
      title: 'Selesaikan Pesanan?',
      text: "Apakah Anda yakin ingin menandai pesanan ini sebagai Selesai?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Selesai!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('complete-form-' + orderId).submit();
      }
    });
  }

  function rejectOrder(orderId) {
    Swal.fire({
      title: 'Tolak Pesanan?',
      text: "Apakah Anda yakin ingin menolak pesanan ini?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Ya, Tolak!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('reject-form-' + orderId).submit();
      }
    });
  }
</script>
@endpush
