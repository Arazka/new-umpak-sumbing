<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
      <div class="sidebar-brand-icon">
        {{-- <i class="fas fa-laugh-wink"></i> --}}
        <img src="{{ asset('img/logo/logo.png') }}" alt="" style="width: 4rem;">
      </div>
      <div class="sidebar-brand-text mx-3">Admin Sumbing</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/admin/dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    @can('admin')
    <li class="nav-item {{ (request()->routeIs('account')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  url('/admin/account') }}">
        <i class="bi bi-person-fill"></i>
        <span>Account</span></a>
    </li>
    @endcan
    
    <li class="nav-item {{ (request()->routeIs('desa')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  url('/admin/desa') }}">
        <i class="bi bi-house-fill"></i>
        <span>Desa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Beranda</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ (request()->routeIs('profile-umpak-sumbing')) ? 'active' : '' }}">
      <a class="nav-link" href="{{  url('/admin/profile-umpak-sumbing') }}">
        <i class="bi bi-clock-history"></i>
        <span>Profil Umpak Sumbing</span></a>
    </li>
    <li class="nav-item {{ (request()->routeIs('berita')) ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('admin/berita') }}">
        <i class="bi bi-newspaper"></i>
        <span>Berita Terbaru</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Heading -->
    <div class="sidebar-heading">Pariwisata</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="bi bi-globe-asia-australia"></i>
          <span>Pariwisata Desa</span>
      </a>
      <div id="collapseTwo" class="collapse {{ (request()->routeIs('bandongan')) ? 'show' : '' }} {{ (request()->routeIs('rejosari')) ? 'show' : '' }} {{ (request()->routeIs('gandusari')) ? 'show' : '' }} {{ (request()->routeIs('kalegen')) ? 'show' : '' }} {{ (request()->routeIs('ngepanrejo')) ? 'show' : '' }} {{ (request()->routeIs('sidorejo')) ? 'show' : '' }} {{ (request()->routeIs('trasan')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Pariwisata:</h6>
              <a class="collapse-item {{ (request()->routeIs('bandongan')) ? 'active' : '' }}" href="{{ url('/admin/wisata-bandongan') }}">Desa Bandongan</a>
              <a class="collapse-item {{ (request()->routeIs('gandusari')) ? 'active' : '' }}" href="{{ url('/admin/wisata-gandusari') }}">Desa Gandusari</a>
              <a class="collapse-item {{ (request()->routeIs('kalegen')) ? 'active' : '' }}" href="{{ url('/admin/wisata-kalegen') }}">Desa Kalegen</a>
              <a class="collapse-item {{ (request()->routeIs('ngepanrejo')) ? 'active' : '' }}" href="{{ url('/admin/wisata-ngepanrejo') }}">Desa Ngepanrejo</a>
              <a class="collapse-item {{ (request()->routeIs('rejosari')) ? 'active' : '' }}" href="{{ url('/admin/wisata-rejosari') }}">Desa Rejosari</a>
              <a class="collapse-item {{ (request()->routeIs('sidorejo')) ? 'active' : '' }}" href="{{ url('/admin/wisata-sidorejo') }}">Desa Sidorejo</a>
              <a class="collapse-item {{ (request()->routeIs('trasan')) ? 'active' : '' }}" href="{{ url('/admin/wisata-trasan') }}">Desa Trasan</a>
          </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="bi bi-globe-asia-australia"></i>
          <span>Pariwisata Kawasan</span>
      </a>
      <div id="collapseUtilities" class="collapse {{ (request()->routeIs('kawasan')) ? 'show' : '' }} {{ (request()->routeIs('agrowisata')) ? 'show' : '' }} {{ (request()->routeIs('panorama')) ? 'show' : '' }} {{ (request()->routeIs('wisata-air')) ? 'show' : '' }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Kawasan:</h6>
              <a class="collapse-item {{ (request()->routeIs('kawasan')) ? 'active' : '' }}" href="{{ url('/admin/kawasan') }}">Data Kawasan</a>
              <h6 class="collapse-header">Pariwisata:</h6>
              <a class="collapse-item {{ (request()->routeIs('panorama')) ? 'active' : '' }}" href="{{ url('/admin/wisata-kawasan-panorama') }}">Panorama</a>
              <a class="collapse-item {{ (request()->routeIs('agrowisata')) ? 'active' : '' }}" href="{{ url('/admin/wisata-kawasan-agrowisata') }}">Agrowisata</a>
              <a class="collapse-item {{ (request()->routeIs('wisata-air')) ? 'active' : '' }}" href="{{ url('/admin/wisata-kawasan-wisata-air') }}">Wisata air</a>
          </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <div class="sidebar-heading">Produk Unggulan</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="bi bi-inboxes-fill"></i>
          <span>Produk Unggulan</span>
      </a>
      <div id="collapsePages" class="collapse {{ (request()->routeIs('produk-unggulan-desa')) ? 'show' : '' }} {{ (request()->routeIs('produk-unggulan-kawasan')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Produk Unggulan:</h6>
              <a class="collapse-item {{ (request()->routeIs('produk-unggulan-desa')) ? 'active' : '' }}" href="{{ url('admin/produk-unggulan-desa') }}">Produk Unggulan Desa</a>
              <a class="collapse-item {{ (request()->routeIs('produk-unggulan-kawasan')) ? 'active' : '' }}" href="{{ url('admin/produk-unggulan-kawasan') }}">Produk Unggulan Kawasan</a>
          </div>
      </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />

    <div class="sidebar-heading">BKAD</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bkad"
          aria-expanded="true" aria-controls="bkad">
          <i class="bi bi-bank"></i>
          <span>BKAD</span>
      </a>
      <div id="bkad" class="collapse {{ (request()->routeIs('profil-lembaga-bkad')) ? 'show' : '' }} {{ (request()->routeIs('struktur-organisasi-bkad')) ? 'show' : '' }} {{ (request()->routeIs('program-kerja-bkad')) ? 'show' : '' }} {{ (request()->routeIs('rpkp-bkad')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">BKAD:</h6>
              <a class="collapse-item {{ (request()->routeIs('profil-lembaga-bkad')) ? 'active' : '' }}" href="{{ url('admin/profil-lembaga-bkad') }}">Profil Lembaga</a>
              <a class="collapse-item {{ (request()->routeIs('struktur-organisasi-bkad')) ? 'active' : '' }}" href="{{ url('admin/struktur-organisasi-bkad') }}">Struktur Organisasi</a>
              <a class="collapse-item {{ (request()->routeIs('program-kerja-bkad')) ? 'active' : '' }}" href="{{ url('admin/program-kerja-bkad') }}">Program Kerja</a>
              <a class="collapse-item {{ (request()->routeIs('rpkp-bkad')) ? 'active' : '' }}" href="{{ url('admin/rpkp-bkad') }}">RPKP</a>
          </div>
      </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />

    <div class="sidebar-heading">BUMDESMA</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bumdesma"
          aria-expanded="true" aria-controls="bumdesma">
          <i class="bi bi-bank2"></i>
          <span>BUMDESMA</span>
      </a>
      <div id="bumdesma" class="collapse {{ (request()->routeIs('profil-lembaga-bumdesma')) ? 'show' : '' }} {{ (request()->routeIs('struktur-organisasi-bumdesma')) ? 'show' : '' }} {{ (request()->routeIs('program-kerja-bumdesma')) ? 'show' : '' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">BUMDESMA:</h6>
              <a class="collapse-item {{ (request()->routeIs('profil-lembaga-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/profil-lembaga-bumdesma') }}">Profil Lembaga</a>
              <a class="collapse-item {{ (request()->routeIs('struktur-organisasi-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/struktur-organisasi-bumdesma') }}">Struktur Organisasi</a>
              <a class="collapse-item {{ (request()->routeIs('program-kerja-bumdesma')) ? 'active' : '' }}" href="{{ url('admin/program-kerja-bumdesma') }}">Program Kerja</a>
          </div>
      </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>