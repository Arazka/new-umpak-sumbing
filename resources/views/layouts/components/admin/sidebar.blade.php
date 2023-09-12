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
      <div id="collapseUtilities" class="collapse {{ (request()->routeIs('kawasan')) ? 'show' : '' }} {{ (request()->routeIs('agrowisata')) ? 'show' : '' }} {{ (request()->routeIs('panorama')) ? 'show' : '' }} {{ (request()->routeIs('wisata-air')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>