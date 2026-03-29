<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') – PT. Transtech Tamiang Diraja</title>

  <!-- Template CSS (dari folder public) -->
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/js/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

  <!-- Stack untuk CSS tambahan per halaman -->
  @stack('styles')

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">

    {{-- TOP NAVBAR --}}
    @include('layouts.partials.dashboard-navbar')

    <div class="container-fluid page-body-wrapper">

      {{-- SIDEBAR --}}
      @include('layouts.partials.dashboard-sidebar')

      {{-- KONTEN UTAMA --}}
      <div class="main-panel">
        <div class="content-wrapper">

          @yield('content')

        </div>
        {{-- FOOTER --}}
        @include('layouts.partials.dashboard-footer')
      </div>
      {{-- /main-panel --}}

    </div>
    {{-- /page-body-wrapper --}}
  </div>
  {{-- /container-scroller --}}

  <!-- Template JS (dari folder public) -->
  <script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('dashboard/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('dashboard/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('dashboard/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('dashboard/js/template.js') }}"></script>
  <script src="{{ asset('dashboard/js/settings.js') }}"></script>
  <script src="{{ asset('dashboard/js/todolist.js') }}"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Success Alert
      @if(session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Berhasil!',
          text: "{{ session('success') }}",
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true
        });
      @endif

      // Error Alert
      @if(session('error') || $errors->any())
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "{{ session('error') ?: $errors->first() }}",
        });
      @endif
    });

    // Global Delete Confirmation
    function confirmDelete(formId, text = "Data ini akan dihapus secara permanen!") {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById(formId).submit();
        }
      });
      return false;
    }
  </script>

  <!-- Stack untuk JS tambahan per halaman -->
  @stack('scripts')

</body>
</html>
