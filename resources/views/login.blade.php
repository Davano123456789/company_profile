<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login – PT. Transtech Tamiang Diraja</title>
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
      max-width: 420px;
    }
    .auth-logo img { 
      height: 60px; 
      width: auto;
      display: block;
      margin: 0 auto;
      object-fit: contain;
    }
    .auth-title {
      font-size: 1.6rem;
      font-weight: 800;
      color: #0c2d48;
      margin-bottom: 4px;
    }
    .auth-sub { font-size: 0.85rem; color: #64748b; margin-bottom: 28px; }
    .form-group {
      margin-bottom: 1.5rem;
    }
    .form-group label { 
      font-size: 0.8rem; 
      font-weight: 700; 
      color: #334e68; 
      display: block;
      margin-bottom: 8px;
    }
    .form-control {
      border-radius: 10px;
      border: 1.5px solid #e0f2fe;
      background: #f8fbff;
      font-size: 0.88rem;
      padding: 12px 14px;
      padding-right: 40px;
      height: auto;
      width: 100% !important;
      transition: all 0.2s ease;
      display: block;
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
    .btn-login {
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
    .btn-login:hover { transform: translateY(-2px); box-shadow: 0 6px 22px rgba(2,132,199,0.4); }
    .divider { font-size: 0.75rem; color: #94a3b8; text-align: center; margin: 24px 0; position: relative; }
    .divider::before, .divider::after {
      content: ''; position: absolute; top: 50%; width: 40%; height: 1px; background: #e0f2fe;
    }
    .divider::before { left: 0; }
    .divider::after { right: 0; }
    .link-register { font-size: 0.83rem; text-align: center; color: #64748b; }
    .link-register a { color: #0284c7; font-weight: 700; text-decoration: none; }
    .link-register a:hover { text-decoration: underline; }
    .alert-danger { border-radius: 10px; font-size: 0.85rem; padding: 12px; margin-bottom: 20px; border: none; background: #fee2e2; color: #b91c1c; }
  </style>
</head>
<body>

<div class="auth-wrapper">
  <div class="auth-card">

    <div class="auth-logo text-center mb-4">
      <img src="{{ asset('images/logo-perusahaan.png') }}" alt="Logo">
    </div>

    <div class="auth-title text-center">Selamat Datang</div>
    <div class="auth-sub text-center">Masuk ke panel admin PT. Transtech Tamiang Diraja</div>

    @if($errors->any())
      <div class="alert alert-danger">
        <i class="ti-alert mr-2"></i> {{ $errors->first() }}
      </div>
    @endif

    @if(session('success'))
      <div class="alert alert-success" style="border-radius:10px;font-size:0.85rem;margin-bottom:20px;">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
      @csrf

      <div class="form-group">
        <label>Email</label>
        <div class="input-icon">
          <input type="email" name="email" class="form-control"
                 value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
          <i class="ti-email"></i>
        </div>
      </div>

      <div class="form-group">
        <label>Password</label>
        <div class="input-icon">
          <input type="password" name="password" class="form-control" placeholder="••••••••" required>
          <i class="ti-lock"></i>
        </div>
      </div>

      <div class="form-group d-flex align-items-center justify-content-between mb-4">
        <div class="form-check mb-0">
          <label class="form-check-label" style="font-size:0.8rem;color:#64748b;cursor:pointer;">
            <input type="checkbox" name="remember" class="form-check-input"> Ingat saya
          </label>
        </div>
      </div>

      <button type="submit" class="btn-login">
        <i class="ti-unlock mr-2"></i> Masuk
      </button>
    </form>

    <div class="divider">atau</div>

    <div class="link-register">
      Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
    </div>

  </div>
</div>

<script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
</body>
</html>
