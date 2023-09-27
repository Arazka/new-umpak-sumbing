@extends('layouts.admin')

@section('title', 'Dashboard')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data akun</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlUser->count() }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                <i class="bi bi-person-fill fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data berita</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlBerita->count() }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                <i class="bi bi-newspaper fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Desa</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlDesa->count() }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                <i class="bi bi-house-fill fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Regulasi</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jmlRegulasi->count() }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                <i class="bi bi-file-earmark-text-fill fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Pariwisata Desa</h6>
          </div>
          <div class="row card-body">
            @foreach ($pariwisatadesa as $item)
            <div class="col-lg-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ $item->nama_desa }}</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->jml_wisata }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Color System -->
        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-warning">
            <h6 class="m-0 font-weight-bold text-white">Pariwisata Kawasan</h6>
          </div>
          <div class="row card-body">
            @foreach ($pariwisatakawasan as $item)
            <div class="col-lg-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $item->nama_kawasan }}</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->wisata_kawasan }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-dark">
            <h6 class="m-0 font-weight-bold text-white">Produk Unggulan</h6>
          </div>
          <div class="row card-body">
            @foreach ($produkUnggulan as $item)
            <div class="col-lg-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ $item->type }}</div>
                    </div>
                    <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->jml_produk }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <!-- Approach -->
        {{-- <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
          </div>
          <div class="card-body">
            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
            <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
          </div>
        </div> --}}
      </div>
    </div>

  </div>
@endsection