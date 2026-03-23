@extends('layouts.master')

@push('styles')
<style>
    /* HERO */
    .page-hero {
      background:linear-gradient(160deg,#f0f9ff 0%,#e0f2fe 50%,#bae6fd 100%);
      position:relative; overflow:hidden; padding-top:80px;
    }
    .page-hero::before {
      content:''; position:absolute; inset:0;
      background: radial-gradient(ellipse at 80% 40%, rgba(14,165,233,0.18) 0%,transparent 55%),
                  radial-gradient(ellipse at 5% 90%, rgba(2,132,199,0.12) 0%,transparent 50%);
    }
    .dots { position:absolute;inset:0;background-image:radial-gradient(circle,rgba(2,132,199,0.12) 1.5px,transparent 1.5px);background-size:32px 32px; }
    .blob { position:absolute;border-radius:50%;filter:blur(70px);opacity:0.28; }
    .blob-1 { width:420px;height:420px;background:radial-gradient(circle,#7dd3fc,#38bdf8);top:-80px;right:-80px;animation:floatBlob 8s ease-in-out infinite; }
    .blob-2 { width:260px;height:260px;background:radial-gradient(circle,#bae6fd,#0ea5e9);bottom:0;left:80px;animation:floatBlob 10s 2s ease-in-out infinite reverse; }
    @keyframes floatBlob { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-22px)} }

    .page-tag {
      display:inline-flex;align-items:center;gap:8px;
      background:rgba(2,132,199,0.1);border:1.5px solid rgba(2,132,199,0.25);
      border-radius:100px;padding:6px 16px;
      font-size:0.74rem;font-weight:700;letter-spacing:0.1em;color:#0369a1;text-transform:uppercase;
    }
    .page-title { font-family:'Bebas Neue',sans-serif;font-size:clamp(3rem,7vw,5.5rem);line-height:0.95;color:#0c2d48; }
    .grad { background:linear-gradient(135deg,#0284c7,#38bdf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }

    /* FILTER */
    .filter-wrap { display:flex;flex-wrap:wrap;gap:10px;justify-content:center; }
    .filter-btn {
      display:inline-flex;align-items:center;gap:8px;
      padding:9px 18px;border-radius:100px;font-size:0.8rem;font-weight:700;
      border:1.5px solid #bae6fd;background:#fff;color:#334e68;
      cursor:pointer;transition:all 0.22s;white-space:nowrap;
    }
    .filter-btn:hover { border-color:#0284c7;color:#0284c7;transform:translateY(-1px); }
    .filter-btn.active {
      background:linear-gradient(135deg,#0284c7,#0ea5e9);
      color:#fff;border-color:transparent;
      box-shadow:0 4px 14px rgba(2,132,199,0.3);
    }
    .fdot { width:9px;height:9px;border-radius:50%;flex-shrink:0; }

    /* PROJECT CARD */
    .proj-card {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:18px;
      overflow:hidden;transition:all 0.32s;display:flex;flex-direction:column;
      cursor:pointer;
    }
    .proj-card:hover {
      transform:translateY(-6px);
      box-shadow:0 24px 52px rgba(2,132,199,0.15);
      border-color:#7dd3fc;
    }
    .proj-card.hidden-proj { display:none; }

    /* IMAGE */
    .proj-img {
      position:relative;overflow:hidden;
      aspect-ratio:4/3;
      background:linear-gradient(135deg,#e0f2fe,#bae6fd);
    }
    .proj-img img {
      width:100%;height:100%;object-fit:cover;
      transition:transform 0.42s ease;
      display:block;
    }
    .proj-card:hover .proj-img img { transform:scale(1.07); }

    /* overlay on hover */
    .proj-img::after {
      content:'\f002';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position:absolute;inset:0;
      background:rgba(12,45,72,0);
      display:flex;align-items:center;justify-content:center;
      font-size:2rem;
      transition:all 0.32s;
      opacity:0;
      color: #fff;
    }
    .proj-card:hover .proj-img::after { background:rgba(12,45,72,0.35);opacity:1; }

    /* category badge on image */
    .cat-ribbon {
      position:absolute;top:12px;left:12px;z-index:3;
      display:inline-flex;align-items:center;gap:5px;
      padding:4px 12px;border-radius:100px;font-size:0.68rem;font-weight:700;
      backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.3);
    }
    .cat-ac     { background:rgba(2,132,199,0.85);color:#fff; }
    .cat-plafon { background:rgba(109,40,217,0.85);color:#fff; }
    .cat-kantor { background:rgba(5,150,105,0.85);color:#fff; }
    .cat-lampu  { background:rgba(217,119,6,0.85);color:#fff; }
    .cat-lantai { background:rgba(219,39,119,0.85);color:#fff; }

    /* body */
    .proj-body { padding:16px 18px;flex:1;display:flex;flex-direction:column;gap:4px; }
    .proj-cat-lbl { font-size:0.7rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase; }
    .proj-title { font-weight:800;font-size:0.9rem;color:#0c2d48;line-height:1.4; }

    /* section */
    .section-tag { display:inline-block;background:rgba(2,132,199,0.1);border:1.5px solid rgba(2,132,199,0.2);color:#0284c7;font-size:0.72rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;padding:5px 14px;border-radius:100px; }
    .section-title { font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,3rem);color:#0c2d48;line-height:1.05; }

    /* counter */
    .count-badge { display:inline-flex;align-items:center;gap:6px;background:rgba(2,132,199,0.08);border:1px solid rgba(2,132,199,0.2);border-radius:100px;padding:5px 16px;font-size:0.78rem;font-weight:700;color:#0284c7; }

    /* LIGHTBOX */
    .lightbox {
      position:fixed;inset:0;z-index:999;
      background:rgba(12,45,72,0.94);backdrop-filter:blur(10px);
      display:none;align-items:center;justify-content:center;padding:20px;
    }
    .lightbox.open { display:flex; }
    .lightbox-inner { position:relative;max-width:90vw;max-height:90vh;display:flex;flex-direction:column;align-items:center;gap:12px; }
    .lightbox-inner img { max-width:100%;max-height:80vh;object-fit:contain;border-radius:14px;box-shadow:0 32px 80px rgba(0,0,0,0.5); }
    .lb-caption { color:rgba(255,255,255,0.75);font-size:0.85rem;font-weight:600;text-align:center; }
    .lb-close {
      position:fixed;top:20px;right:24px;
      width:42px;height:42px;border-radius:50%;
      background:rgba(255,255,255,0.15);border:1.5px solid rgba(255,255,255,0.2);
      cursor:pointer;display:flex;align-items:center;justify-content:center;
      color:#fff;font-size:1.1rem;transition:background 0.2s;
    }
    .lb-close:hover { background:rgba(255,255,255,0.28); }
    .lb-nav {
      position:fixed;top:50%;transform:translateY(-50%);
      width:44px;height:44px;border-radius:50%;
      background:rgba(255,255,255,0.12);border:1.5px solid rgba(255,255,255,0.2);
      cursor:pointer;display:flex;align-items:center;justify-content:center;
      color:#fff;font-size:1.2rem;transition:background 0.2s;
    }
    .lb-nav:hover { background:rgba(255,255,255,0.25); }
    .lb-prev { left:16px; }
    .lb-next { right:16px; }

    /* CTA */
    .cta-wrap { background:linear-gradient(135deg,#e0f2fe,#bae6fd);border-radius:24px;border:1.5px solid #7dd3fc;position:relative;overflow:hidden; }
    .cta-dots { position:absolute;inset:0;background-image:radial-gradient(circle,rgba(2,132,199,0.1) 1.5px,transparent 1.5px);background-size:24px 24px; }
</style>
@endpush

@section('content')
<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <button class="lb-close" onclick="closeLb()"><i class="fa-solid fa-xmark"></i></button>
  <button class="lb-nav lb-prev" onclick="navLb(-1)"><i class="fa-solid fa-chevron-left"></i></button>
  <button class="lb-nav lb-next" onclick="navLb(1)"><i class="fa-solid fa-chevron-right"></i></button>
  <div class="lightbox-inner">
    <img id="lb-img" src="" alt=""/>
    <div class="lb-caption" id="lb-caption"></div>
  </div>
</div>

<!-- HERO -->
<section class="page-hero py-20 pb-16">
  <div class="dots"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <div class="page-tag mb-6" style="animation:fadeUp 0.5s ease both">
        <i class="fa-solid fa-camera mr-2"></i> Portofolio Pekerjaan
    </div>
    <h1 class="page-title mb-5" style="animation:fadeUp 0.5s 0.1s ease both">
      GALERI<br/><span class="grad">PROYEK KAMI</span>
    </h1>
    <p class="text-base leading-relaxed max-w-xl mx-auto" style="color:#334e68;animation:fadeUp 0.5s 0.2s ease both">
      Dokumentasi nyata hasil pekerjaan PT. Transtech Tamiang Diraja — dari servis AC & Chiller, renovasi bangunan, instalasi elektrikal, hingga perbaikan lantai.
    </p>
  </div>
</section>

<!-- PROJECTS SECTION -->
<section class="py-16" style="background:#fff">
  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-10 reveal">
      <div class="section-tag mb-4">Dokumentasi Pekerjaan</div>
      <h2 class="section-title mb-2">Semua <span class="grad">Proyek</span></h2>
      <p class="text-sm mb-5" style="color:#64748b">Klik foto untuk memperbesar. Gunakan filter untuk memilih kategori.</p>
      <div class="count-badge">
        Menampilkan <span id="count-num" class="mx-1">25</span> proyek
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-wrap mb-10 reveal">
      <button class="filter-btn active" data-cat="all" onclick="doFilter('all',this)">
        <span class="fdot" style="background:#0284c7"></span>Semua Pekerjaan
      </button>
      <button class="filter-btn" data-cat="ac" onclick="doFilter('ac',this)">
        <span class="fdot" style="background:#0284c7"></span>Cleaning / Service AC
      </button>
      <button class="filter-btn" data-cat="plafon" onclick="doFilter('plafon',this)">
        <span class="fdot" style="background:#7c3aed"></span>Renovasi Plafon & Dinding
      </button>
      <button class="filter-btn" data-cat="kantor" onclick="doFilter('kantor',this)">
        <span class="fdot" style="background:#059669"></span>Renovasi Kantor
      </button>
      <button class="filter-btn" data-cat="lampu" onclick="doFilter('lampu',this)">
        <span class="fdot" style="background:#d97706"></span>Lampu (ME) & Genset
      </button>
      <button class="filter-btn" data-cat="lantai" onclick="doFilter('lantai',this)">
        <span class="fdot" style="background:#db2777"></span>Perbaikan Lantai
      </button>
    </div>

    @php
      $projects = [
        ['cat' => 'ac', 'title' => 'Servis Unit Outdoor AC Kapasitas Besar', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Perawatan Chiller Rooftop', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Servis AC Spit Duck Lt. 1', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Perbaikan Komponen & Board AC', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Servis AC Tipe Cassette Ceiling', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Pengisian Refrigerant Musicool', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Cleaning Unit Indoor AC', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Pengecekan & Tune-up Sistem AC', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        ['cat' => 'ac', 'title' => 'Pemasangan Unit AC Baru', 'lbl' => 'Cleaning / Service AC', 'class' => 'ac', 'icon' => 'fa-snowflake', 'text_cat' => 'Service AC'],
        
        ['cat' => 'plafon', 'title' => 'Pemasangan Plafon Desain Lingkaran', 'lbl' => 'Renovasi Plafon & Dinding', 'class' => 'plafon', 'icon' => 'fa-border-all', 'text_cat' => 'Plafon & Dinding'],
        ['cat' => 'plafon', 'title' => 'Finishing & Pengecatan Plafon Gypsum', 'lbl' => 'Renovasi Plafon & Dinding', 'class' => 'plafon', 'icon' => 'fa-border-all', 'text_cat' => 'Plafon & Dinding'],
        ['cat' => 'plafon', 'title' => 'Pemasangan Wallpaper Dinding', 'lbl' => 'Renovasi Plafon & Dinding', 'class' => 'plafon', 'icon' => 'fa-border-all', 'text_cat' => 'Plafon & Dinding'],
        ['cat' => 'plafon', 'title' => 'Renovasi Dinding & Partisi Showroom', 'lbl' => 'Renovasi Plafon & Dinding', 'class' => 'plafon', 'icon' => 'fa-border-all', 'text_cat' => 'Plafon & Dinding'],
        ['cat' => 'plafon', 'title' => 'Plafon & Pencahayaan Showroom', 'lbl' => 'Renovasi Plafon & Dinding', 'class' => 'plafon', 'icon' => 'fa-border-all', 'text_cat' => 'Plafon & Dinding'],
        
        ['cat' => 'kantor', 'title' => 'Renovasi Interior Ruang Kerja', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        ['cat' => 'kantor', 'title' => 'Pemasangan Furnitur Built-in', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        ['cat' => 'kantor', 'title' => 'Pemasangan Kaca & Partisi Kantor', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        ['cat' => 'kantor', 'title' => 'Pemasangan Karpet & Vertical Blind', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        ['cat' => 'kantor', 'title' => 'Finishing Total Ruang Kantor', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        ['cat' => 'kantor', 'title' => 'Pengecatan Ulang Area Kantor', 'lbl' => 'Renovasi Kantor', 'class' => 'kantor', 'icon' => 'fa-building', 'text_cat' => 'Renovasi Kantor'],
        
        ['cat' => 'lampu', 'title' => 'Instalasi Lampu Gudang & Workshop', 'lbl' => 'Lampu (ME) & Genset', 'class' => 'lampu', 'icon' => 'fa-lightbulb', 'text_cat' => 'Lampu & Genset'],
        ['cat' => 'lampu', 'title' => 'Pemasangan Neon Box Showroom Daihatsu', 'lbl' => 'Lampu (ME) & Genset', 'class' => 'lampu', 'icon' => 'fa-lightbulb', 'text_cat' => 'Lampu & Genset'],
        ['cat' => 'lampu', 'title' => 'Instalasi Panel & Wiring Listrik', 'lbl' => 'Lampu (ME) & Genset', 'class' => 'lampu', 'icon' => 'fa-lightbulb', 'text_cat' => 'Lampu & Genset'],
        ['cat' => 'lampu', 'title' => 'Perawatan & Perbaikan Genset', 'lbl' => 'Lampu (ME) & Genset', 'class' => 'lampu', 'icon' => 'fa-lightbulb', 'text_cat' => 'Lampu & Genset'],
        ['cat' => 'lampu', 'title' => 'Instalasi Lampu Area FedEx & Industri', 'lbl' => 'Lampu (ME) & Genset', 'class' => 'lampu', 'icon' => 'fa-lightbulb', 'text_cat' => 'Lampu & Genset'],
        
        ['cat' => 'lantai', 'title' => 'Bongkar Pasang Keramik Lantai', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
        ['cat' => 'lantai', 'title' => 'Screed & Leveling Permukaan Lantai', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
        ['cat' => 'lantai', 'title' => 'Pengukuran & Pemasangan Keramik Baru', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
        ['cat' => 'lantai', 'title' => 'Perbaikan Lantai Area Showroom', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
        ['cat' => 'lantai', 'title' => 'Finishing Nat & Poles Lantai', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
        ['cat' => 'lantai', 'title' => 'Perbaikan Lantai & Pemasangan Partisi', 'lbl' => 'Perbaikan Lantai', 'class' => 'lantai', 'icon' => 'fa-layer-group', 'text_cat' => 'Perbaikan Lantai'],
      ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5" id="projGrid">
      @foreach($projects as $index => $p)
      <div class="proj-card reveal d{{ ($index % 6) + 1 }}" data-cat="{{ $p['cat'] }}" data-title="{{ $p['title'] }}">
        <div class="proj-img" onclick="openLb(this)">
          <img src="{{ asset('images/portofolio/portofolio_1.jpg') }}" alt="{{ $p['title'] }}"/>
          <div class="cat-ribbon cat-{{ $p['class'] }}"><i class="fa-solid {{ $p['icon'] }} mr-1"></i> {{ $p['text_cat'] }}</div>
        </div>
        <div class="proj-body">
          <div class="proj-cat-lbl" style="color: {{ 
            $p['cat'] == 'ac' ? '#0284c7' : (
            $p['cat'] == 'plafon' ? '#6d28d9' : (
            $p['cat'] == 'kantor' ? '#047857' : (
            $p['cat'] == 'lampu' ? '#92400e' : '#be185d'
          ))) }}">{{ $p['lbl'] }}</div>
          <div class="proj-title">{{ $p['title'] }}</div>
        </div>
      </div>
      @endforeach
    </div><!-- /grid -->

    <!-- EMPTY STATE -->
    <div id="empty-state" class="hidden text-center py-20">
      <i class="fa-solid fa-folder-open text-5xl text-[#bae6fd] mb-4 block"></i>
      <div class="font-bold text-lg mt-3" style="color:#0c2d48">Belum ada foto untuk kategori ini</div>
      <div class="text-sm mt-1" style="color:#64748b">Silakan pilih kategori lain</div>
    </div>

  </div>
</section>

@endsection

@push('scripts')
<script>
  // ── FILTER ──
  function doFilter(cat, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('.proj-card');
    let visible = 0;
    cards.forEach(c => {
      const match = cat === 'all' || c.dataset.cat === cat;
      c.classList.toggle('hidden-proj', !match);
      if (match) {
        visible++;
        c.classList.remove('visible');
        setTimeout(() => c.classList.add('visible'), 30);
      }
    });
    document.getElementById('count-num').textContent = visible;
    document.getElementById('empty-state').classList.toggle('hidden', visible > 0);
  }

  // ── LIGHTBOX ──
  let currentImgs = [];
  let currentIdx  = 0;

  function openLb(wrapper) {
    const img = wrapper.querySelector('img');
    if (!img || !img.src) {
      return;
    }
    currentImgs = [...document.querySelectorAll('.proj-card:not(.hidden-proj) .proj-img img')]
      .filter(i => i.src && !i.src.endsWith('/'));
    currentIdx = currentImgs.indexOf(img);
    if (currentIdx === -1) return;
    showLb();
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function showLb() {
    const img = currentImgs[currentIdx];
    document.getElementById('lb-img').src = img.src;
    document.getElementById('lb-caption').textContent =
      img.closest('.proj-card')?.dataset.title || img.alt || '';
  }

  function navLb(dir) {
    currentIdx = (currentIdx + dir + currentImgs.length) % currentImgs.length;
    showLb();
  }

  function closeLb() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
  }

  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLb();
  });

  document.addEventListener('keydown', e => {
    if (!document.getElementById('lightbox').classList.contains('open')) return;
    if (e.key === 'Escape') closeLb();
    if (e.key === 'ArrowRight') navLb(1);
    if (e.key === 'ArrowLeft')  navLb(-1);
  });
</script>
@endpush