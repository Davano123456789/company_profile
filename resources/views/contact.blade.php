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

    /* CONTACT INFO CARD */
    .info-card {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:18px;padding:24px;
      display:flex;align-items:flex-start;gap:16px;
      transition:all 0.3s;
    }
    .info-card:hover {
      transform:translateY(-3px);
      box-shadow:0 12px 32px rgba(2,132,199,0.12);
      border-color:#7dd3fc;
    }
    .info-icon {
      width:48px;height:48px;border-radius:14px;flex-shrink:0;
      background:linear-gradient(135deg,#e0f2fe,#bae6fd);
      border:1.5px solid #7dd3fc;
      display:flex;align-items:center;justify-content:center;font-size:1.3rem;
      transition:all 0.3s;
      color: #0284c7;
    }
    .info-card:hover .info-icon {
      background:linear-gradient(135deg,#0284c7,#0ea5e9);
      border-color:transparent;
      color: #fff;
    }
    .info-label { font-size:0.7rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#94a3b8;margin-bottom:3px; }
    .info-value { font-weight:700;font-size:0.9rem;color:#0c2d48;line-height:1.45; }
    .info-sub { font-size:0.75rem;color:#64748b;margin-top:2px; }

    /* QUICK CONTACT BUTTONS */
    .quick-btn {
      display:flex;align-items:center;gap:12px;
      padding:14px 20px;border-radius:14px;border:1.5px solid;
      font-weight:700;font-size:0.88rem;text-decoration:none;
      transition:all 0.25s;
    }
    .quick-btn:hover { transform:translateY(-2px); }
    .quick-btn-wa {
      border-color:#22c55e;background:rgba(34,197,94,0.06);color:#15803d;
    }
    .quick-btn-wa:hover { background:#22c55e;color:#fff;box-shadow:0 8px 24px rgba(34,197,94,0.3); }
    .quick-btn-email {
      border-color:#0284c7;background:rgba(2,132,199,0.06);color:#0369a1;
    }
    .quick-btn-email:hover { background:#0284c7;color:#fff;box-shadow:0 8px 24px rgba(2,132,199,0.3); }
    .quick-btn-phone {
      border-color:#7c3aed;background:rgba(124,58,237,0.06);color:#6d28d9;
    }
    .quick-btn-phone:hover { background:#7c3aed;color:#fff;box-shadow:0 8px 24px rgba(124,58,237,0.3); }

    /* FORM */
    .form-wrap {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:22px;padding:32px;
      box-shadow:0 8px 32px rgba(2,132,199,0.07);
    }
    .form-group { display:flex;flex-direction:column;gap:6px;margin-bottom:18px; }
    .form-label { font-size:0.78rem;font-weight:700;color:#334e68;letter-spacing:0.03em; }
    .form-label span { color:#ef4444; }
    .form-input, .form-select, .form-textarea {
      width:100%;padding:11px 16px;border-radius:10px;
      border:1.5px solid #e0f2fe;background:#f8fbff;
      font-family:'Plus Jakarta Sans',sans-serif;font-size:0.875rem;color:#0c2d48;
      outline:none;transition:all 0.2s;
    }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
      border-color:#0284c7;background:#fff;
      box-shadow:0 0 0 3px rgba(2,132,199,0.1);
    }
    .form-textarea { resize:vertical;min-height:130px;line-height:1.6; }
    .form-select { appearance:none;cursor:pointer; }

    .btn-submit {
      width:100%;padding:14px;border-radius:12px;border:none;cursor:pointer;
      background:linear-gradient(135deg,#0284c7,#0ea5e9);color:#fff;
      font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:0.95rem;
      display:flex;align-items:center;justify-content:center;gap:10px;
      transition:all 0.25s;box-shadow:0 4px 18px rgba(2,132,199,0.3);
    }
    .btn-submit:hover { transform:translateY(-2px);box-shadow:0 8px 28px rgba(2,132,199,0.4); }

    /* Success message */
    #form-success {
      display:none;
      background:rgba(34,197,94,0.08);border:1.5px solid rgba(34,197,94,0.25);
      border-radius:12px;padding:16px 20px;
      color:#15803d;font-size:0.88rem;font-weight:600;
      align-items:center;gap:10px;margin-top:12px;
    }

    /* MAP */
    .map-wrap {
      border-radius:20px;overflow:hidden;
      border:1.5px solid #bae6fd;
      box-shadow:0 8px 32px rgba(2,132,199,0.1);
      position:relative;
    }
    .map-wrap iframe {
      width:100%;height:420px;border:none;display:block;
    }

    /* BANK INFO */
    .bank-card {
      background:linear-gradient(135deg,#0c2d48,#0369a1);
      border-radius:18px;padding:24px;color:#fff;
      position:relative;overflow:hidden;
    }
    .bank-card::before {
      content:'';position:absolute;inset:0;
      background-image:radial-gradient(circle,rgba(255,255,255,0.04) 1.5px,transparent 1.5px);
      background-size:24px 24px;
    }
    .bank-num {
      font-family:'Bebas Neue',sans-serif;font-size:1.8rem;letter-spacing:0.08em;
      background:linear-gradient(135deg,#7dd3fc,#bae6fd);
      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
    }

    /* LEGALITAS GRID */
    .legal-item {
      background:#fff;border:1.5px solid #e0f2fe;border-radius:14px;padding:16px 18px;
      transition:all 0.25s;
    }
    .legal-item:hover { border-color:#7dd3fc;transform:translateY(-2px);box-shadow:0 8px 20px rgba(2,132,199,0.1); }
    .legal-key { font-size:0.68rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#94a3b8;margin-bottom:4px; }
    .legal-val { font-weight:800;font-size:0.88rem;color:#0c2d48; }

    footer { background:#0c2d48; }
</style>
@endpush

@section('content')
<!-- HERO -->
<section class="page-hero py-20 pb-14">
  <div class="dots"></div>
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <div class="page-tag mb-6" style="animation:fadeUp 0.5s ease both">
        <i class="fa-solid fa-phone-volume mr-2"></i> Hubungi Kami
    </div>
    <h1 class="page-title mb-5" style="animation:fadeUp 0.5s 0.1s ease both">
      KONTAK &<br/><span class="grad">LOKASI</span>
    </h1>
    <p class="text-base leading-relaxed max-w-xl mx-auto" style="color:#334e68;animation:fadeUp 0.5s 0.2s ease both">
      Kami siap melayani konsultasi, penawaran, dan survei lapangan. Hubungi kami melalui salah satu saluran berikut atau kunjungi kantor kami langsung.
    </p>
  </div>
</section>

<!-- ═══ QUICK CONTACT + INFO ═══ -->
<section class="py-16" style="background:#fff">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid lg:grid-cols-2 gap-12">

      <!-- LEFT: info cards -->
      <div class="flex flex-col gap-4">
        <h2 class="font-black text-2xl mb-2 reveal" style="font-family:'Bebas Neue',sans-serif;color:#0c2d48;letter-spacing:0.03em">
          Informasi <span class="grad">Kontak</span>
        </h2>

        <div class="info-card reveal d1">
          <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
          <div>
            <div class="info-label">Alamat Kantor</div>
            <div class="info-value">Jl. Raya Kutisari Selatan No. 91</div>
            <div class="info-sub">Kutisari, Tenggilis Mejoyo, Surabaya 60291<br/>Jawa Timur, Indonesia</div>
          </div>
        </div>

        <div class="info-card reveal d2">
          <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
          <div>
            <div class="info-label">Telepon & Fax</div>
            <div class="info-value">(031) 8471056</div>
            <div class="info-sub">Fax: (031) 8471056 &nbsp;·&nbsp; Ext: 70805554</div>
          </div>
        </div>

        <div class="info-card reveal d3">
          <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
          <div>
            <div class="info-label">Email</div>
            <div class="info-value">transtechtamiangdiraja@gmail.com</div>
            <div class="info-sub">Respon dalam 1×24 jam kerja</div>
          </div>
        </div>

        <div class="info-card reveal d4">
          <div class="info-icon"><i class="fa-solid fa-clock"></i></div>
          <div>
            <div class="info-label">Jam Operasional</div>
            <div class="info-value">Senin – Jumat &nbsp; 08.00 – 17.00 WIB</div>
            <div class="info-sub">Sabtu 08.00 – 13.00 WIB &nbsp;·&nbsp; Minggu & Libur: Tutup</div>
          </div>
        </div>

        <!-- Quick contact buttons -->
        <div class="flex flex-col gap-3 mt-2 reveal d5">
          <a href="https://wa.me/6231847105?text=Halo%20PT.%20Transtech%20Tamiang%20Diraja%2C%20saya%20ingin%20konsultasi%20mengenai%20layanan%20Anda."
             class="quick-btn quick-btn-wa" target="_blank">
            <i class="fa-brands fa-whatsapp text-xl flex-shrink-0"></i>
            <div>
              <div>Chat via WhatsApp</div>
              <div style="font-size:0.72rem;font-weight:400;opacity:0.7">Klik untuk langsung chat</div>
            </div>
            <i class="fa-solid fa-up-right-from-square ml-auto opacity-50 text-xs"></i>
          </a>
          <a href="mailto:transtechtamiangdiraja@gmail.com" class="quick-btn quick-btn-email">
            <i class="fa-solid fa-envelope text-xl flex-shrink-0"></i>
            <div>
              <div>Kirim Email</div>
              <div style="font-size:0.72rem;font-weight:400;opacity:0.7">transtechtamiangdiraja@gmail.com</div>
            </div>
          </a>
          <a href="tel:+62318471056" class="quick-btn quick-btn-phone">
            <i class="fa-solid fa-phone text-xl flex-shrink-0"></i>
            <div>
              <div>Telepon Langsung</div>
              <div style="font-size:0.72rem;font-weight:400;opacity:0.7">(031) 8471056</div>
            </div>
          </a>
        </div>
      </div>

      <!-- RIGHT: FORM -->
      <div class="reveal d2">
        <h2 class="font-black text-2xl mb-6" style="font-family:'Bebas Neue',sans-serif;color:#0c2d48;letter-spacing:0.03em">
          Kirim <span class="grad">Pesan</span>
        </h2>
        <div class="form-wrap">
          <form id="contactForm" onsubmit="submitForm(event)">
            <div class="grid grid-cols-2 gap-4">
              <div class="form-group col-span-2 sm:col-span-1">
                <label class="form-label">Nama Lengkap <span>*</span></label>
                <input type="text" class="form-input" placeholder="Nama Anda" required/>
              </div>
              <div class="form-group col-span-2 sm:col-span-1">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-input" placeholder="PT. / CV. / Instansi"/>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div class="form-group col-span-2 sm:col-span-1">
                <label class="form-label">Nomor Telepon <span>*</span></label>
                <input type="tel" class="form-input" placeholder="08xx-xxxx-xxxx" required/>
              </div>
              <div class="form-group col-span-2 sm:col-span-1">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" placeholder="email@contoh.com"/>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Layanan yang Dibutuhkan <span>*</span></label>
              <select class="form-select form-input" required>
                <option value="" disabled selected>-- Pilih Layanan --</option>
                <option>Pemasangan / Perawatan / Perbaikan AC & Chiller</option>
                <option>Perbaikan & Perawatan Genset</option>
                <option>Konstruksi Bangunan Sipil & Renovasi</option>
                <option>Design Interior</option>
                <option>Electrical & Mechanical Repair</option>
                <option>Cleaning Service / Jasa Tenaga Kerja</option>
                <option>General Supplier / Musicool Refrigerant</option>
                <option>Lainnya</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Pesan / Keterangan <span>*</span></label>
              <textarea class="form-textarea" placeholder="Ceritakan kebutuhan Anda secara singkat — lokasi, jenis pekerjaan, atau pertanyaan yang ingin disampaikan..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">
              <i class="fa-solid fa-paper-plane"></i>
              Kirim Pesan Sekarang
            </button>
          </form>
          <div id="form-success" class="flex">
            <i class="fa-solid fa-circle-check text-xl flex-shrink-0"></i>
            Pesan Anda berhasil dikirim! Tim kami akan menghubungi Anda segera.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ GOOGLE MAPS ═══ -->
<section class="py-4 pb-16" style="background:#fff">
  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-8 reveal">
      <div class="inline-block section-tag mb-3">
          <i class="fa-solid fa-location-dot mr-1"></i> Lokasi Kantor
      </div>
      <h2 class="font-black" style="font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,2.8rem);color:#0c2d48">
        Temukan <span class="grad">Kami di Sini</span>
      </h2>
      <p class="text-sm mt-2" style="color:#64748b">Jl. Kutisari Selatan No. 91, Tenggilis Mejoyo, Surabaya 60291</p>
    </div>

    <div class="map-wrap reveal">
      <!-- Google Maps Embed — Jl. Kutisari Selatan No. 91, Surabaya -->
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8482!2d112.7534!3d-7.3185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6b3b3b3b3b%3A0x1a2b3c4d5e6f7a8b!2sJl.%20Kutisari%20Selatan%20No.91%2C%20Kutisari%2C%20Kec.%20Tenggilis%20Mejoyo%2C%20Surabaya%2C%20Jawa%20Timur%2060291!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        title="Lokasi PT. Transtech Tamiang Diraja">
      </iframe>
    </div>

    <!-- Map action buttons -->
    <div class="flex flex-wrap gap-3 justify-center mt-5 reveal">
      <a href="https://maps.google.com/?q=Jl.+Kutisari+Selatan+No.91,+Kutisari,+Tenggilis+Mejoyo,+Surabaya+60291"
         target="_blank"
         class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm text-white transition-all hover:scale-105"
         style="background:linear-gradient(135deg,#0284c7,#0ea5e9);box-shadow:0 4px 16px rgba(2,132,199,0.3)">
        <i class="fa-solid fa-location-dot"></i>
        Buka di Google Maps
      </a>
      <a href="https://www.google.com/maps/dir/?api=1&destination=Jl.+Kutisari+Selatan+No.91,+Surabaya"
         target="_blank"
         class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm transition-all hover:scale-105"
         style="border:2px solid #0284c7;color:#0284c7;background:#fff">
        <i class="fa-solid fa-route"></i>
        Petunjuk Arah
      </a>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  function toggleMenu() { document.getElementById('mobile-menu').classList.toggle('open'); }

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.08 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  function submitForm(e) {
    e.preventDefault();
    const btn = e.target.querySelector('.btn-submit');
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> Mengirim...';
    btn.disabled = true;
    setTimeout(() => {
      e.target.style.display = 'none';
      document.getElementById('form-success').style.display = 'flex';
    }, 1500);
  }
</script>
@endpush