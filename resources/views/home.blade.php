@extends('layouts.master')

@section('content')
<!-- HERO -->
<section id="beranda" class="hero flex items-center pt-16">
  <div class="dots"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>
  <div class="max-w-7xl mx-auto px-6 py-24 relative z-10 w-full">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <div>
        <div class="hero-badge mb-6">
          <i class="fa-solid fa-bolt-lightning mr-2 text-[#0284c7]"></i>
          Berdiri Sejak 2003 · Surabaya, Jawa Timur
        </div>
        <h1 class="hero-title mb-6">PT. TRANSTECH<br/><span class="grad">TAMIANG</span><br/>DIRAJA</h1>
        <p class="hero-sub mb-10">Solusi terpercaya untuk perawatan AC & Chiller, konstruksi bangunan, mekanikal & elektrikal, hingga jasa tenaga kerja profesional di Jawa Timur.</p>
        <div class="hero-cta flex flex-wrap gap-4 mb-14">
          <a href="#layanan" class="btn-primary">
            Lihat Layanan 
            <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
          </a>
          <a href="{{ route('contact') }}" class="btn-outline">Hubungi Kami</a>
        </div>
        <div class="hero-stats grid grid-cols-2 sm:grid-cols-4 gap-3">
          <div class="stat-card"><div class="stat-num">20+</div><div class="stat-label">Tahun Pengalaman</div></div>
          <div class="stat-card"><div class="stat-num">46+</div><div class="stat-label">Klien Korporat</div></div>
          <div class="stat-card"><div class="stat-num">6</div><div class="stat-label">Bidang Layanan</div></div>
          <div class="stat-card"><div class="stat-num">BNSP</div><div class="stat-label">Teknisi Tersertifikasi</div></div>
        </div>
      </div>

      <!-- Right visual panel -->
      <div class="hidden lg:block" style="animation:fadeUp 0.7s 0.45s ease both;opacity:0" id="heroCard">
        <div class="space-y-4">
          <div class="rounded-2xl p-6" style="background:rgba(255,255,255,0.82);border:1.5px solid #bae6fd;backdrop-filter:blur(12px);box-shadow:0 20px 60px rgba(2,132,199,0.14)">
            <div class="flex items-center gap-3 mb-5">
              <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#0284c7,#38bdf8)">
                <i class="fa-solid fa-snowflake text-white text-xl"></i>
              </div>
              <div><div class="font-bold text-sm" style="color:#0c2d48">Servis AC & Chiller</div><div class="text-xs" style="color:#64748b">Teknisi Bersertifikat BNSP</div></div>
            </div>
            <div class="text-xs mb-2 font-semibold" style="color:#64748b">Tingkat Kepuasan Pelanggan</div>
            <div class="flex items-center gap-3">
              <div class="h-2.5 rounded-full flex-1" style="background:#e0f2fe"><div class="h-2.5 rounded-full" style="background:linear-gradient(90deg,#0284c7,#38bdf8);width:92%"></div></div>
              <span class="text-sm font-bold" style="color:#0284c7">92%</span>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-3">
            <div class="rounded-xl p-4 text-center" style="background:rgba(255,255,255,0.82);border:1.5px solid #bae6fd;backdrop-filter:blur(8px)">
                <i class="fa-solid fa-trowel-bricks text-2xl text-[#0284c7]"></i>
                <div class="text-xs font-bold mt-2" style="color:#0c2d48">Konstruksi</div>
            </div>
            <div class="rounded-xl p-4 text-center" style="background:rgba(255,255,255,0.82);border:1.5px solid #bae6fd;backdrop-filter:blur(8px)">
                <i class="fa-solid fa-bolt text-2xl text-[#0284c7]"></i>
                <div class="text-xs font-bold mt-2" style="color:#0c2d48">Elektrikal</div>
            </div>
            <div class="rounded-xl p-4 text-center" style="background:rgba(255,255,255,0.82);border:1.5px solid #bae6fd;backdrop-filter:blur(8px)">
                <i class="fa-solid fa-broom text-2xl text-[#0284c7]"></i>
                <div class="text-xs font-bold mt-2" style="color:#0c2d48">Cleaning</div>
            </div>
          </div>
          <div class="rounded-xl p-4 flex items-center gap-3" style="background:linear-gradient(135deg,#0284c7,#0ea5e9)">
            <i class="fa-solid fa-trophy text-white text-2xl"></i>
            <div><div class="text-xs font-bold text-white">Dipercaya 46+ Klien Korporat</div><div class="text-xs" style="color:rgba(255,255,255,0.7)">Astra · Bank Mandiri · FedEx · BPJS</div></div>
          </div>
          <div class="rounded-xl p-4" style="background:rgba(255,255,255,0.82);border:1.5px solid #bae6fd;backdrop-filter:blur(8px)">
            <div class="text-xs font-bold mb-3" style="color:#0c2d48">Legalitas Lengkap</div>
            <div class="flex flex-wrap gap-2">
              <span class="text-xs px-2 py-1 rounded-full font-semibold" style="background:#e0f2fe;color:#0369a1">NIB Terbit</span>
              <span class="text-xs px-2 py-1 rounded-full font-semibold" style="background:#e0f2fe;color:#0369a1">PKP Terdaftar</span>
              <span class="text-xs px-2 py-1 rounded-full font-semibold" style="background:#e0f2fe;color:#0369a1">SIUP Aktif</span>
              <span class="text-xs px-2 py-1 rounded-full font-semibold" style="background:#e0f2fe;color:#0369a1">NPWP</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section id="layanan" class="py-24" style="background:#fff">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16 reveal">
      <div class="section-tag mb-4">Layanan Kami</div>
      <h2 class="section-title mb-4">Bidang Usaha <span class="grad-text">Unggulan</span></h2>
      <p class="text-sm leading-relaxed max-w-xl mx-auto" style="color:#64748b">Layanan teknik terpadu dengan tenaga profesional berpengalaman dan peralatan modern untuk kepuasan pelanggan.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="service-card reveal d1">
        <div class="service-icon"><i class="fa-solid fa-snowflake"></i></div>
        <div class="service-title">AC, Chiller & Genset</div>
        <div class="service-desc">Pemasangan, perawatan, and perbaikan AC kapasitas ½–10 PK, Chiller, Cold Storage, dan Genset. Teknisi bersertifikat BNSP.</div>
      </div>
      <div class="service-card reveal d2">
        <div class="service-icon"><i class="fa-solid fa-trowel-bricks"></i></div>
        <div class="service-title">Konstruksi Bangunan Sipil</div>
        <div class="service-desc">Pembangunan, renovasi, dan perawatan bangunan sipil — plafon, dinding, lantai, dan struktur bangunan lainnya.</div>
      </div>
      <div class="service-card reveal d3">
        <div class="service-icon"><i class="fa-solid fa-palette"></i></div>
        <div class="service-title">Design Interior</div>
        <div class="service-desc">Perencanaan dan realisasi desain interior kantor, showroom, and ruang komersial yang estetis dan fungsional.</div>
      </div>
      <div class="service-card reveal d1">
        <div class="service-icon"><i class="fa-solid fa-bolt"></i></div>
        <div class="service-title">Electrical & Mechanical</div>
        <div class="service-desc">Instalasi, perbaikan, and pemeliharaan sistem elektrikal and mekanikal — panel listrik, lampu, hingga genset.</div>
      </div>
      <div class="service-card reveal d2">
        <div class="service-icon"><i class="fa-solid fa-broom"></i></div>
        <div class="service-title">Cleaning Service</div>
        <div class="service-desc">Pengerahan tenaga kerja profesional untuk kebersihan gedung, kantor, showroom, dan fasilitas komersial secara berkala.</div>
      </div>
      <div class="service-card reveal d3">
        <div class="service-icon"><i class="fa-solid fa-box-open"></i></div>
        <div class="service-title">General Supplier</div>
        <div class="service-desc">Penyedia material dan perlengkapan teknik, termasuk MUSICOOL Refrigerant — produk ramah lingkungan dari PT. Pertamina.</div>
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section id="tentang" class="why-section py-24">
  <div class="why-dots"></div>
  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div class="reveal">
        <div class="section-tag mb-5" style="background:rgba(125,211,252,0.15);border-color:rgba(125,211,252,0.3);color:#7dd3fc">Komitmen Kami</div>
        <h2 class="section-title mb-5" style="color:#fff">Mengapa Memilih<br/><span style="background:linear-gradient(135deg,#7dd3fc,#bae6fd);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">Transtech?</span></h2>
        <p class="text-sm leading-relaxed mb-8" style="color:rgba(255,255,255,0.55)">Sejak 2003, kami telah melayani puluhan perusahaan besar dengan standar mutu tinggi, pelayanan cepat, dan transparansi penuh.</p>
        <div>
          <div class="check-row">
            <div class="check-dot"><i class="fa-solid fa-check text-[10px] text-[#0c2d48]"></i></div>
            <span class="text-sm" style="color:rgba(255,255,255,0.8)">Teknisi bersertifikat BNSP & Pertamina Musicool</span>
          </div>
          <div class="check-row">
            <div class="check-dot"><i class="fa-solid fa-check text-[10px] text-[#0c2d48]"></i></div>
            <span class="text-sm" style="color:rgba(255,255,255,0.8)">Legalitas lengkap — NIB, SIUP, NPWP, PKP terdaftar</span>
          </div>
          <div class="check-row">
            <div class="check-dot"><i class="fa-solid fa-check text-[10px] text-[#0c2d48]"></i></div>
            <span class="text-sm" style="color:rgba(255,255,255,0.8)">Dipercaya Astra, Bank Mandiri, FedEx, BPJS & banyak lagi</span>
          </div>
          <div class="check-row">
            <div class="check-dot"><i class="fa-solid fa-check text-[10px] text-[#0c2d48]"></i></div>
            <span class="text-sm" style="color:rgba(255,255,255,0.8)">Ramah lingkungan — mendukung program hemat energi pemerintah</span>
          </div>
          <div class="check-row">
            <div class="check-dot"><i class="fa-solid fa-check text-[10px] text-[#0c2d48]"></i></div>
            <span class="text-sm" style="color:rgba(255,255,255,0.8)">Motto: Bersih · Rapih · Cepat · Tepat · Hemat</span>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4 reveal">
        <div class="why-card">
          <div class="why-num">01</div>
          <div class="font-bold text-sm mt-2 mb-2 text-white">Mutu Pekerjaan</div>
          <div class="text-xs leading-relaxed" style="color:rgba(255,255,255,0.5)">Hasil akhir mengutamakan kepuasan pelanggan sesuai standar kerja terukur</div>
        </div>
        <div class="why-card">
          <div class="why-num">02</div>
          <div class="font-bold text-sm mt-2 mb-2 text-white">Pelayanan Cepat</div>
          <div class="text-xs leading-relaxed" style="color:rgba(255,255,255,0.5)">Strategi khusus disesuaikan pola kerja pelanggan demi efisiensi waktu</div>
        </div>
        <div class="why-card">
          <div class="why-num">03</div>
          <div class="font-bold text-sm mt-2 mb-2 text-white">Transparansi</div>
          <div class="text-xs leading-relaxed" style="color:rgba(255,255,255,0.5)">Komunikasi dan koordinasi terbuka selama proses pekerjaan berlangsung</div>
        </div>
        <div class="why-card">
          <div class="why-num">04</div>
          <div class="font-bold text-sm mt-2 mb-2 text-white">Kemitraan</div>
          <div class="text-xs leading-relaxed" style="color:rgba(255,255,255,0.5)">Hubungan jangka panjang yang saling menguntungkan bersama pelanggan</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LATEST PROJECTS -->
<section id="proyek" class="py-24" style="background:#f8fafc">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
      <div>
        <div class="section-tag mb-4">Portofolio Pekerjaan</div>
        <h2 class="section-title mb-0">Proyek <span class="grad-text">Terbaru</span></h2>
      </div>
      <a href="{{ route('portfolio') }}" class="mt-6 md:mt-0 text-sm font-bold text-[#0284c7] hover:underline flex items-center gap-2">
        Lihat Semua Proyek <i class="fa-solid fa-arrow-right-long"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse($projects as $index => $project)
      <div class="group bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-sky-300 transition-all hover:-translate-y-2 reveal d{{ ($index % 3) + 1 }}">
        <div class="aspect-[4/3] overflow-hidden relative">
          @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          @else
            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
              <i class="fa-solid fa-image text-slate-300 text-4xl"></i>
            </div>
          @endif
          <div class="absolute top-4 left-4">
            <span class="px-3 py-1.5 rounded-lg text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm shadow-sm" style="color:#0284c7">
              {{ $project->category->name ?? 'Pekerjaan Umum' }}
            </span>
          </div>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-slate-800 line-clamp-2 leading-snug group-hover:text-sky-600 transition-colors">{{ $project->title }}</h3>
        </div>
      </div>
      @empty
      <div class="col-span-full text-center py-10">
        <p class="text-slate-400">Belum ada proyek yang ditampilkan.</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- CLIENTS -->
<section id="klien" class="py-24" style="background:#f0f9ff">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12 reveal">
      <div class="section-tag mb-4">Dipercaya Oleh</div>
      <h2 class="section-title mb-3">Klien & Mitra <span class="grad-text">Kerja</span></h2>
      <p class="text-sm max-w-lg mx-auto" style="color:#64748b">Kami bangga telah dipercaya oleh berbagai perusahaan nasional dan multinasional di Jawa Timur.</p>
    </div>
    <div class="flex flex-wrap gap-4 justify-center reveal">
      @forelse($clients as $client)
        <div class="group bg-white px-6 py-4 rounded-xl border border-sky-100 shadow-sm hover:shadow-md hover:border-sky-300 transition-all flex items-center gap-4">
          @if($client->logo)
            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-8 w-auto grayscale group-hover:grayscale-0 transition-all">
          @endif
          <span class="text-sm font-bold text-slate-600 group-hover:text-sky-700">{{ $client->name }}</span>
        </div>
      @empty
        <p class="text-slate-400">Belum ada data klien.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section py-20">
  <div class="cta-dots"></div>
  <div class="max-w-3xl mx-auto px-6 text-center relative z-10 reveal">
    <h2 class="font-black mb-4" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,5vw,3.5rem);color:#0c2d48">Siap Bekerja Sama<br/>dengan Kami?</h2>
    <p class="text-sm md:text-base mb-8 max-w-xl mx-auto" style="color:#334e68">Hubungi kami sekarang dan dapatkan konsultasi gratis untuk kebutuhan jasa teknik dan konstruksi Anda.</p>
    <div class="flex flex-wrap gap-4 justify-center">
      <a href="https://wa.me/6231847105" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-sm text-white transition-all hover:scale-105" style="background:linear-gradient(135deg,#0284c7,#0ea5e9);box-shadow:0 4px 20px rgba(2,132,199,0.3)">
        <i class="fa-brands fa-whatsapp text-lg"></i>
        WhatsApp Sekarang
      </a>
      <a href="mailto:transtechtamiangdiraja@gmail.com" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-sm transition-all hover:scale-105 border-2" style="border-color:#0284c7;color:#0284c7;background:#fff">
        <i class="fa-solid fa-envelope"></i>
        Kirim Email
      </a>
    </div>
  </div>
</section>
@endsection