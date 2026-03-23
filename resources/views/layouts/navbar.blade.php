<nav>
  <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#0284c7,#38bdf8)">
        <span style="font-family:'Bebas Neue',sans-serif;color:#fff;font-size:0.9rem;letter-spacing:0.05em">TT</span>
      </div>
      <div>
        <div class="font-bold text-sm" style="font-family:'Bebas Neue',sans-serif;letter-spacing:0.04em;color:#0c2d48">Transtech Tamiang</div>
        <div class="text-xs" style="color:#64748b">Diraja</div>
      </div>
    </a>
    <div class="hidden md:flex items-center gap-7">
      <a href="{{ route('home') }}#beranda" class="text-sm font-semibold transition-colors {{ request()->routeIs('home') ? 'text-[#0284c7]' : 'text-[#334e68]' }}" onmouseover="this.style.color='#0284c7'" onmouseout="this.style.color='{{ request()->routeIs('home') ? '#0284c7' : '#334e68' }}'">Beranda</a>
      <a href="{{ route('home') }}#layanan" class="text-sm font-semibold transition-colors text-[#334e68]" onmouseover="this.style.color='#0284c7'" onmouseout="this.style.color='#334e68'">Layanan</a>
      <a href="{{ route('portfolio') }}" class="text-sm font-semibold transition-colors {{ request()->routeIs('portfolio') ? 'text-[#0284c7]' : 'text-[#334e68]' }}" onmouseover="this.style.color='#0284c7'" onmouseout="this.style.color='{{ request()->routeIs('portfolio') ? '#0284c7' : '#334e68' }}'">Proyek</a>
      <a href="{{ route('clients') }}" class="text-sm font-semibold transition-colors {{ request()->routeIs('clients') ? 'text-[#0284c7]' : 'text-[#334e68]' }}" onmouseover="this.style.color='#0284c7'" onmouseout="this.style.color='{{ request()->routeIs('clients') ? '#0284c7' : '#334e68' }}'">Klien</a>
      <a href="{{ route('contact') }}" class="text-sm font-semibold transition-colors {{ request()->routeIs('contact') ? 'text-[#0284c7]' : 'text-[#334e68]' }}" onmouseover="this.style.color='#0284c7'" onmouseout="this.style.color='{{ request()->routeIs('contact') ? '#0284c7' : '#334e68' }}'">Kontak</a>
    </div>
    <a href="https://wa.me/6231847105" class="hidden md:inline-flex items-center gap-2 text-sm font-bold px-5 py-2.5 rounded-xl text-white" style="background:linear-gradient(135deg,#0284c7,#0ea5e9)">
      <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
      Hubungi Kami
    </a>
    <button onclick="toggleMenu()" class="md:hidden p-2 rounded-lg" style="color:#0284c7">
      <i class="fa-solid fa-bars text-xl"></i>
    </button>
  </div>
  <div id="mobile-menu" class="flex-col border-t" style="border-color:#e0f2fe">
    <a href="{{ route('home') }}#beranda" onclick="toggleMenu()" class="block px-6 py-3 text-sm font-semibold text-[#334e68]">Beranda</a>
    <a href="{{ route('home') }}#layanan" onclick="toggleMenu()" class="block px-6 py-3 text-sm font-semibold text-[#334e68]">Layanan</a>
    <a href="{{ route('portfolio') }}" onclick="toggleMenu()" class="block px-6 py-3 text-sm font-semibold {{ request()->routeIs('portfolio') ? 'text-[#0284c7]' : 'text-[#334e68]' }}">Proyek</a>
    <a href="{{ route('clients') }}" onclick="toggleMenu()" class="block px-6 py-3 text-sm font-semibold {{ request()->routeIs('clients') ? 'text-[#0284c7]' : 'text-[#334e68]' }}">Klien</a>
    <a href="{{ route('contact') }}" onclick="toggleMenu()" class="block px-6 py-3 text-sm font-semibold {{ request()->routeIs('contact') ? 'text-[#0284c7]' : 'text-[#334e68]' }}">Kontak</a>
  </div>
</nav>
