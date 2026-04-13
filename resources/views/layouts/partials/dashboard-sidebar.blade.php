<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @if(auth()->user()->role === 'admin')
      <li class="nav-item {{ Route::is('dashboard.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{-- PESANAN --}}
      <li class="nav-item {{ Route::is('dashboard.orders.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.orders.index') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Pesanan Jasa</span>
        </a>
      </li>

      {{-- LAYANAN JASA --}}
      <li class="nav-item {{ Route::is('dashboard.services.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.services.index') }}">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Layanan Jasa</span>
        </a>
      </li>

      {{-- KLIEN --}}
      <li class="nav-item {{ Route::is('dashboard.clients.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.clients.index') }}">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Klien</span>
        </a>
      </li>

      {{-- PROYEK --}}
      <li class="nav-item {{ Route::is('dashboard.projects.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.projects.index') }}">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Proyek</span>
        </a>
      </li>

      {{-- KATEGORI --}}
      <li class="nav-item {{ Route::is('dashboard.project-categories.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.project-categories.index') }}">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Kategori</span>
        </a>
      </li>
    @else
      <li class="nav-item {{ Route::is('client.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('client.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Pesanan Saya</span>
        </a>
      </li>
    @endif

    <li class="nav-item border-top mt-3">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="ti-home menu-icon"></i>
        <span class="menu-title">Kembali ke Beranda</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-danger" href="{{ route('logout') }}" 
         onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
      <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>

  </ul>
</nav>
