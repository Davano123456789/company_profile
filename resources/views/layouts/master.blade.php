<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ config('app.name', 'PT. Transtech Tamiang Diraja') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f0f9ff; color: #0c2d48; overflow-x: hidden; }

    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      background: rgba(255,255,255,0.92);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid #bae6fd;
      box-shadow: 0 1px 20px rgba(2,132,199,0.08);
    }

    .hero {
      min-height: 100vh;
      background: linear-gradient(160deg, #f0f9ff 0%, #e0f2fe 50%, #bae6fd 100%);
      position: relative; overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute; inset: 0;
      background:
        radial-gradient(ellipse at 80% 30%, rgba(14,165,233,0.2) 0%, transparent 55%),
        radial-gradient(ellipse at 10% 85%, rgba(2,132,199,0.14) 0%, transparent 50%);
    }
    .dots {
      position: absolute; inset: 0;
      background-image: radial-gradient(circle, rgba(2,132,199,0.13) 1.5px, transparent 1.5px);
      background-size: 32px 32px;
    }
    .blob {
      position: absolute; border-radius: 50%; filter: blur(70px); opacity: 0.3;
    }
    .blob-1 { width:500px;height:500px;background:radial-gradient(circle,#7dd3fc,#38bdf8);top:-100px;right:-80px;animation:floatBlob 8s ease-in-out infinite; }
    .blob-2 { width:320px;height:320px;background:radial-gradient(circle,#bae6fd,#0ea5e9);bottom:80px;right:180px;animation:floatBlob 10s 2s ease-in-out infinite reverse; }
    .blob-3 { width:220px;height:220px;background:radial-gradient(circle,#e0f2fe,#7dd3fc);top:220px;left:-60px;animation:floatBlob 7s 1s ease-in-out infinite; }
    @keyframes floatBlob { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-28px) scale(1.05)} }

    .hero-badge {
      display:inline-flex;align-items:center;gap:8px;
      background:rgba(2,132,199,0.1);border:1.5px solid rgba(2,132,199,0.25);
      border-radius:100px;padding:6px 16px;
      font-size:0.74rem;font-weight:700;letter-spacing:0.1em;color:#0369a1;text-transform:uppercase;
      animation:fadeUp 0.5s ease both;
    }
    .hero-title {
      font-family:'Bebas Neue',sans-serif;
      font-size:clamp(3.5rem,8vw,6.5rem);line-height:0.94;color:#0c2d48;
      animation:fadeUp 0.5s 0.12s ease both;
    }
    .hero-title .grad {
      background:linear-gradient(135deg,#0284c7,#38bdf8);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    }
    .hero-sub { font-size:1.05rem;color:#334e68;line-height:1.75;max-width:500px;animation:fadeUp 0.5s 0.24s ease both; }
    .hero-cta { animation:fadeUp 0.5s 0.36s ease both; }
    .hero-stats { animation:fadeUp 0.5s 0.5s ease both; }

    .btn-primary {
      display:inline-flex;align-items:center;gap:10px;
      background:linear-gradient(135deg,#0284c7,#0ea5e9);color:#fff;
      font-weight:700;font-size:0.95rem;padding:14px 28px;border-radius:10px;
      transition:all 0.25s;text-decoration:none;
      box-shadow:0 4px 20px rgba(2,132,199,0.35);
    }
    .btn-primary:hover { transform:translateY(-2px);box-shadow:0 8px 30px rgba(2,132,199,0.45); }
    .btn-outline {
      display:inline-flex;align-items:center;gap:10px;
      border:2px solid #0284c7;color:#0284c7;
      font-weight:700;font-size:0.95rem;padding:12px 28px;border-radius:10px;
      transition:all 0.25s;text-decoration:none;background:rgba(2,132,199,0.05);
    }
    .btn-outline:hover { background:#0284c7;color:#fff;transform:translateY(-2px); }

    .stat-card {
      background:rgba(255,255,255,0.8);border:1.5px solid rgba(186,230,253,0.9);
      border-radius:16px;padding:18px 20px;backdrop-filter:blur(8px);
      box-shadow:0 4px 16px rgba(2,132,199,0.08);transition:all 0.25s;
    }
    .stat-card:hover { transform:translateY(-3px);box-shadow:0 8px 24px rgba(2,132,199,0.15); }
    .stat-num {
      font-family:'Bebas Neue',sans-serif;font-size:2.2rem;line-height:1;
      background:linear-gradient(135deg,#0284c7,#0ea5e9);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    }
    .stat-label { font-size:0.74rem;color:#64748b;margin-top:4px;font-weight:500; }

    .section-tag {
      display:inline-block;background:rgba(2,132,199,0.1);border:1.5px solid rgba(2,132,199,0.2);
      color:#0284c7;font-size:0.72rem;font-weight:700;letter-spacing:0.12em;
      text-transform:uppercase;padding:5px 14px;border-radius:100px;
    }
    .section-title { font-family:'Bebas Neue',sans-serif;font-size:clamp(2.2rem,5vw,3.4rem);color:#0c2d48;line-height:1.05; }
    .grad-text {
      background:linear-gradient(135deg,#0284c7,#38bdf8);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    }

    .service-card {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:18px;padding:28px;
      transition:all 0.3s;position:relative;overflow:hidden;
    }
    .service-card::after {
      content:'';position:absolute;bottom:0;left:0;right:0;height:3px;
      background:linear-gradient(90deg,#0284c7,#38bdf8);
      transform:scaleX(0);transform-origin:left;transition:transform 0.3s;
    }
    .service-card:hover { transform:translateY(-5px);box-shadow:0 16px 40px rgba(2,132,199,0.12);border-color:#7dd3fc; }
    .service-card:hover::after { transform:scaleX(1); }
    .service-icon {
      width:52px;height:52px;background:linear-gradient(135deg,#e0f2fe,#bae6fd);
      border:1.5px solid #7dd3fc;border-radius:14px;
      display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin-bottom:16px;
    }
    .service-title { font-weight:800;font-size:0.95rem;color:#0c2d48;margin-bottom:8px; }
    .service-desc { font-size:0.845rem;color:#64748b;line-height:1.65; }

    .why-section {
      background:linear-gradient(160deg,#0c2d48 0%,#0369a1 55%,#0284c7 100%);
      position:relative;overflow:hidden;
    }
    .why-dots {
      position:absolute;inset:0;
      background-image:radial-gradient(circle,rgba(255,255,255,0.04) 1.5px,transparent 1.5px);
      background-size:28px 28px;
    }
    .why-card {
      background:rgba(255,255,255,0.07);border:1.5px solid rgba(255,255,255,0.12);
      border-radius:16px;padding:24px;transition:all 0.3s;backdrop-filter:blur(4px);
    }
    .why-card:hover { background:rgba(255,255,255,0.13);border-color:rgba(125,211,252,0.4);transform:translateY(-3px); }
    .why-num {
      font-family:'Bebas Neue',sans-serif;font-size:2.8rem;
      background:linear-gradient(135deg,#7dd3fc,#bae6fd);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
      line-height:1;opacity:0.5;
    }

    .check-row { display:flex;align-items:flex-start;gap:12px;padding:11px 0;border-bottom:1px solid rgba(255,255,255,0.08); }
    .check-row:last-child { border-bottom:none; }
    .check-dot {
      width:22px;height:22px;border-radius:50%;
      background:linear-gradient(135deg,#7dd3fc,#38bdf8);
      display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;
    }

    .client-item {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:10px;
      padding:10px 18px;font-size:0.82rem;font-weight:600;color:#334e68;
      transition:all 0.2s;
    }
    .client-item:hover {
      background:linear-gradient(135deg,#0284c7,#0ea5e9);color:#fff;border-color:transparent;
      transform:translateY(-2px);box-shadow:0 6px 18px rgba(2,132,199,0.25);
    }

    .cta-section {
      background:linear-gradient(135deg,#dbeafe 0%,#bae6fd 50%,#7dd3fc 100%);
      position:relative;overflow:hidden;
    }
    .cta-dots {
      position:absolute;inset:0;
      background-image:radial-gradient(circle,rgba(2,132,199,0.1) 1.5px,transparent 1.5px);
      background-size:24px 24px;
    }
    footer { background:#0c2d48; }

    @keyframes fadeUp { from{opacity:0;transform:translateY(28px)} to{opacity:1;transform:translateY(0)} }
    .reveal { opacity:0;transform:translateY(30px);transition:opacity 0.65s ease,transform 0.65s ease; }
    .reveal.visible { opacity:1;transform:translateY(0); }
    .d1{transition-delay:0.1s}.d2{transition-delay:0.2s}.d3{transition-delay:0.3s}.d4{transition-delay:0.4s}.d5{transition-delay:0.5s}

    #mobile-menu{display:none}
    #mobile-menu.open{display:flex}
  </style>
  @stack('styles')
</head>
<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

<script>
  function toggleMenu() { document.getElementById('mobile-menu').classList.toggle('open'); }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  setTimeout(() => {
    const el = document.getElementById('heroCard');
    if (el) { el.style.opacity = '1'; el.style.transition = 'opacity 0.8s ease'; }
  }, 500);
</script>
@stack('scripts')
</body>
</html>
