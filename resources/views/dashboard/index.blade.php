@extends('layouts.masterDashboard')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Welcome, Admin</h3>
        <h6 class="font-weight-normal mb-0">Kelola konten website PT. Transtech Tamiang Diraja.</h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card card-tale">
      <div class="card-body">
        <p class="mb-4">Total Klien</p>
        <p class="fs-30 mb-2">{{ $totalClients }}</p>
        <a href="{{ route('dashboard.clients.index') }}" class="text-white">Kelola Klien &rarr;</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card card-dark-blue">
      <div class="card-body">
        <p class="mb-4">Total Proyek</p>
        <p class="fs-30 mb-2">{{ $totalProjects }}</p>
        <a href="{{ route('dashboard.projects.index') }}" class="text-white">Kelola Proyek &rarr;</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card card-light-blue">
      <div class="card-body">
        <p class="mb-4">Kategori Proyek</p>
        <p class="fs-30 mb-2">{{ $totalCategories }}</p>
        <a href="{{ route('dashboard.project-categories.index') }}" class="text-white">Kelola Kategori &rarr;</a>
      </div>
    </div>
  </div>
</div>
@endsection
