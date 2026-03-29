<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar Akun – PT. Transtech Tamiang Diraja</title>
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { 
      background: #f0f6ff;
      font-family: 'Poppins', sans-serif;
    }
    .auth-wrapper {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .auth-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 40px rgba(2,132,199,0.12);
      padding: 40px 36px;
      width: 100%;
      max-width: 440px;
    }
    .auth-logo img { 
      height: 60px; 
      width: auto;
      display: block;
      margin: 0 auto;
      object-fit: contain;
    }
    .auth-title { font-size: 1.5rem; font-weight: 800; color: #0c2d48; margin-bottom: 4px; }
    .auth-sub { font-size: 0.85rem; color: #64748b; margin-bottom: 24px; }
    .form-group {
      margin-bottom: 1.2rem;
    }
    .form-group label { 
      font-size: 0.8rem; 
      font-weight: 700; 
      color: #334e68; 
      display: block;
      margin-bottom: 6px;
    }
    .form-control {
      border-radius: 10px;
      border: 1.5px solid #e0f2fe;
      background: #f8fbff;
      font-size: 0.88rem;
      padding: 11px 14px;
      padding-right: 40px;
      height: auto;
      width: 100% !important;
      display: block;
      transition: all 0.2s ease;
    }
    .form-control:focus {
      border-color: #0284c7;
      box-shadow: 0 0 0 3px rgba(2,132,199,0.1);
      background: #fff;
      outline: none;
    }
    .input-icon { 
      position: relative; 
      width: 100%;
    }
    .input-icon i { 
      position: absolute; 
      right: 14px; 
      top: 50%; 
      transform: translateY(-50%); 
      color: #94a3b8; 
      font-size: 1.1rem; 
      pointer-events: none;
      z-index: 10;
    }
    .btn-register {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: none;
      background: linear-gradient(135deg, #0284c7, #0ea5e9);
      color: #fff;
      font-weight: 700;
      font-size: 0.95rem;
      box-shadow: 0 4px 16px rgba(2,132,199,0.3);
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-register:hover { transform: translateY(-2px); box-shadow: 0 6px 22px rgba(2,132,199,0.4); }
    .divider { font-size: 0.75rem; color: #94a3b8; text-align: center; margin: 20px 0; position: relative; }
    .divider::before, .divider::after {
      content: ''; position: absolute; top: 50%; width: 40%; height: 1px; background: #e0f2fe;
    }
    .divider::before { left: 0; }
    .divider::after { right: 0; }
    .link-login { font-size: 0.83rem; text-align: center; color: #64748b; }
    .link-login a { color: #0284c7; font-weight: 700; text-decoration: none; }
    .link-login a:hover { text-decoration: underline; }
    .alert-danger { border-radius: 10px; font-size: 0.85rem; padding: 12px; margin-bottom: 20px; border: none; background: #fee2e2; color: #b91c1c; }
    .invalid-feedback { font-size: 0.76rem; color: #ef4444; margin-top: 4px; }
  </style>
</head>
<body>

<div class="auth-wrapper">
  <div class="auth-card">

    <div class="auth-logo text-center mb-4">
      <img src="{{ asset('images/logo-perusahaan.png') }}" alt="Logo">
    </div>

    <div class="auth-title text-center">Buat Akun Baru</div>
    <div class="auth-sub text-center">Daftarkan akun admin untuk mengakses panel admin</div>

    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0 pl-3">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
      @csrf

      <div class="form-group">
        <label>Nama Lengkap</label>
        <div class="input-icon">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name') }}" placeholder="Nama Anda" required autofocus>
          <i class="ti-user"></i>
        </div>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="form-group">
        <label>Email</label>
        <div class="input-icon">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email') }}" placeholder="admin@example.com" required>
          <i class="ti-email"></i>
        </div>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="form-group">
        <label>Password</label>
        <div class="input-icon">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                 placeholder="Min. 8 karakter" required>
          <i class="ti-lock"></i>
        </div>
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="form-group mb-4">
        <label>Konfirmasi Password</label>
        <div class="input-icon">
          <input type="password" name="password_confirmation" class="form-control"
                 placeholder="Ulangi password" required>
          <i class="ti-lock"></i>
        </div>
      </div>

      <button type="submit" class="btn-register">
        <i class="ti-user mr-2"></i> Daftar Sekarang
      </button>
    </form>

    <div class="divider">atau</div>

    <div class="link-login">
      Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
    </div>

  </div>
</div>

<script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
