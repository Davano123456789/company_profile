@extends('layouts.master')

@push('styles')
<style>
    .page-hero {
      background:linear-gradient(160deg,#f0f9ff 0%,#e0f2fe 50%,#bae6fd 100%);
      position:relative; overflow:hidden; padding-top:80px;
    }
    .page-hero::before {
      content:''; position:absolute; inset:0;
      background:
        radial-gradient(ellipse at 80% 40%, rgba(14,165,233,0.18) 0%,transparent 55%),
        radial-gradient(ellipse at 5% 90%, rgba(2,132,199,0.12) 0%,transparent 50%);
    }
    .dots {
      position:absolute; inset:0;
      background-image:radial-gradient(circle,rgba(2,132,199,0.12) 1.5px,transparent 1.5px);
      background-size:32px 32px;
    }
    .blob { position:absolute; border-radius:50%; filter:blur(70px); opacity:0.28; }
    .blob-1 { width:420px;height:420px;background:radial-gradient(circle,#7dd3fc,#38bdf8);top:-80px;right:-80px;animation:floatBlob 8s ease-in-out infinite; }
    .blob-2 { width:260px;height:260px;background:radial-gradient(circle,#bae6fd,#0ea5e9);bottom:0;left:80px;animation:floatBlob 10s 2s ease-in-out infinite reverse; }
    @keyframes floatBlob { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-22px)} }

    .page-tag {
      display:inline-flex; align-items:center; gap:8px;
      background:rgba(2,132,199,0.1); border:1.5px solid rgba(2,132,199,0.25);
      border-radius:100px; padding:6px 16px;
      font-size:0.74rem; font-weight:700; letter-spacing:0.1em; color:#0369a1; text-transform:uppercase;
    }
    .page-title {
      font-family:'Bebas Neue',sans-serif;
      font-size:clamp(3rem,7vw,5.5rem); line-height:0.95; color:#0c2d48;
    }
    .grad { background:linear-gradient(135deg,#0284c7,#38bdf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }

    .stat-pill {
      background:#fff; border:1.5px solid #bae6fd; border-radius:14px; padding:18px 24px;
      text-align:center; box-shadow:0 4px 16px rgba(2,132,199,0.07); transition:all 0.25s;
    }
    .stat-pill:hover { transform:translateY(-3px); box-shadow:0 8px 24px rgba(2,132,199,0.14); }
    .stat-big {
      font-family:'Bebas Neue',sans-serif; font-size:2.6rem; line-height:1;
      background:linear-gradient(135deg,#0284c7,#38bdf8);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
    }
    .stat-lbl { font-size:0.74rem; color:#64748b; font-weight:600; margin-top:4px; }

    /* CLIENT CARD */
    .client-card {
      background:#fff; border:1.5px solid #e0f2fe; border-radius:16px;
      overflow:hidden; transition:all 0.3s; display:flex; flex-direction:column;
    }
    .client-card:hover {
      transform:translateY(-5px);
      box-shadow:0 16px 40px rgba(2,132,199,0.13);
      border-color:#7dd3fc;
    }
    .logo-wrap {
      aspect-ratio:3/2;
      background:linear-gradient(135deg,#f0f9ff,#e0f2fe);
      border-bottom:1px solid #e0f2fe;
      display:flex; align-items:center; justify-content:center;
      position:relative; overflow:hidden;
    }
    .logo-wrap img {
      width:100%; height:100%; object-fit:contain; padding:18px;
    }
    .card-body { padding:14px 16px; flex:1; }
    .card-num {
      font-family:'Bebas Neue',sans-serif; font-size:0.85rem; letter-spacing:0.08em;
      background:linear-gradient(135deg,#0284c7,#38bdf8);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
      margin-bottom:3px;
    }
    .card-name { font-weight:800; font-size:0.85rem; color:#0c2d48; line-height:1.35; margin-bottom:4px; }
    .card-loc { font-size:0.73rem; color:#94a3b8; }

    .cta-wrap {
      background:linear-gradient(135deg,#e0f2fe,#bae6fd);
      border-radius:24px; border:1.5px solid #7dd3fc; position:relative; overflow:hidden;
    }
    .cta-dots { position:absolute;inset:0;background-image:radial-gradient(circle,rgba(2,132,199,0.1) 1.5px,transparent 1.5px);background-size:24px 24px; }
</style>
@endpush

@section('content')
<!-- HERO -->
<section class="page-hero py-20 pb-16">
  <div class="dots"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <h1 class="page-title mb-5" style="animation:fadeUp 0.5s 0.1s ease both">
      KLIEN &<br/><span class="grad">MITRA KERJA</span>
    </h1>
    <p class="text-base leading-relaxed max-w-xl mx-auto mb-10" style="color:#334e68;animation:fadeUp 0.5s 0.2s ease both">
      Selama lebih dari 20 tahun, kami telah dipercaya oleh perusahaan-perusahaan terkemuka di Jawa Timur dan seluruh Indonesia dalam memberikan solusi teknik terbaik.
    </p>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-2xl mx-auto" style="animation:fadeUp 0.5s 0.3s ease both">
      <div class="stat-pill"><div class="stat-big">46+</div><div class="stat-lbl">Total Klien</div></div>
      <div class="stat-pill"><div class="stat-big">20+</div><div class="stat-lbl">Tahun Melayani</div></div>
      <div class="stat-pill"><div class="stat-big">6</div><div class="stat-lbl">Bidang Industri</div></div>
      <div class="stat-pill"><div class="stat-big">92%</div><div class="stat-lbl">Kepuasan Klien</div></div>
    </div>
  </div>
</section>

<!-- CLIENTS GRID -->
<section class="py-16" style="background:#fff">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-12 reveal">
      <div class="section-tag mb-4">Daftar Pelanggan</div>
      <h2 class="section-title mb-3">Semua <span class="grad">Klien Kami</span></h2>
      <p class="text-sm max-w-lg mx-auto" style="color:#64748b">
        Berikut adalah daftar lengkap klien dan mitra kerja PT. Transtech Tamiang Diraja.
      </p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">

      @php
        $clients = [
            ['name' => 'PT. Astra International (Astra World)', 'loc' => 'Jl. H.R. Muhammad, Surabaya'],
            ['name' => 'PT. Astra International (BMW) - Surabaya', 'loc' => 'Jl. H.R. Muhammad, Surabaya'],
            ['name' => 'PT. Astra International (BMW) - Malang', 'loc' => 'Malang'],
            ['name' => 'PT. Astra International (Daihatsu) - Aloha', 'loc' => 'Jl. Raya Aloha, Waru Sidoarjo'],
            ['name' => 'PT. Astra International (Daihatsu) - Jenggolo', 'loc' => 'Jl. Jenggolo, Sidoarjo'],
            ['name' => 'PT. Astra International (Daihatsu) - Trosobo', 'loc' => 'Jl. Trosobo, Sidoarjo'],
            ['name' => 'PT. Astra International (ISUZU)', 'loc' => 'Jl. Raya Aloha, Waru Sidoarjo'],
            ['name' => 'PT. Astra International (UD. Trucks) - Kenjeran', 'loc' => 'Surabaya'],
            ['name' => 'PT. Astra International (UD. Trucks) - Romokalisari', 'loc' => 'Surabaya'],
            ['name' => 'Bank Mandiri Prioritas', 'loc' => 'Surabaya'],
            ['name' => 'Bank Mandiri KCP Krian', 'loc' => 'Sidoarjo'],
            ['name' => 'Bank Mandiri KCP Jemursari', 'loc' => 'Surabaya'],
            ['name' => 'BPJS Kesehatan Div. Regional VII', 'loc' => 'Jawa Timur'],
            ['name' => 'PT. FedEx International / TNT', 'loc' => 'Surabaya'],
            ['name' => 'PT. Geodis Wilson Indonesia', 'loc' => 'Surabaya'],
            ['name' => 'PT. Sompo Insurance', 'loc' => 'Surabaya'],
            ['name' => 'PT. Daesang Ingredients Indonesia', 'loc' => 'Surabaya'],
            ['name' => 'PT. Sekawan Intiplast', 'loc' => 'Surabaya'],
            ['name' => 'PT. Wahana Wirawan (Nissan)', 'loc' => 'Surabaya'],
            ['name' => 'PT. United Indo Surabaya', 'loc' => 'Surabaya'],
        ];
      @endphp

      @foreach($clients as $index => $client)
      <div class="client-card reveal d{{ ($index % 6) + 1 }}">
        <div class="logo-wrap">
          <img src="{{ asset('images/client_' . (($index % 2) + 1) . '.jpg') }}" alt="{{ $client['name'] }}" />
        </div>
        <div class="card-body">
          <div class="card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
          <div class="card-name">{{ $client['name'] }}</div>
          <div class="card-loc">{{ $client['loc'] }}</div>
        </div>
      </div>
      @endforeach

    </div><!-- /grid -->
  </div>
</section>

<!-- CTA -->
<section class="py-16" style="background:#f0f9ff">
  <div class="max-w-4xl mx-auto px-6 reveal">
    <div class="cta-wrap p-10 md:p-14 text-center">
      <div class="cta-dots"></div>
      <div class="relative z-10">
        <div class="text-xs font-bold uppercase tracking-widest mb-4" style="color:#0369a1;letter-spacing:0.12em">Bergabung bersama kami</div>
        <h2 class="font-black mb-4" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,5vw,3.2rem);color:#0c2d48">
          Jadilah Bagian dari<br/><span class="grad">Mitra Kerja Kami</span>
        </h2>
        <p class="text-sm md:text-base mb-8 max-w-lg mx-auto" style="color:#334e68">
          Kami terbuka untuk kemitraan baru. Hubungi kami sekarang dan diskusikan kebutuhan teknik perusahaan Anda bersama tim profesional kami.
        </p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="https://wa.me/6231847105" class="btn-primary">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Hubungi via WhatsApp
          </a>
          <a href="mailto:transtechtamiangdiraja@gmail.com" class="btn-ghost">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Kirim Email
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  const obsClients = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.06 });
  document.querySelectorAll('.reveal').forEach(el => obsClients.observe(el));
</script>
@endpush