@extends('layouts.admin')

@section('title', 'Lihat Data Wisata Desa Rejosari')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Lihat Data Wisata Desa Rejosari</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/wisata-rejosari') }}">Data Wisata Desa Rejosari</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lihat Data Wisata Desa Rejosari</li>
            </ol>
          </nav>
    </div>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
            <div class="col-12 p-0">
              <img src="{{ asset('img\foto desa\desa rejosari.jpg') }}" class="post-banner-image" alt="Full-width Picture" style="width: 100%">
            </div>
        </div>
        <div class="container-fluid sejarah py-4 mt-5">
            <div class="row">
              <div class="umpak-sumbing col-lg-8 mb-4">
                <!-- Section 1 deskripsi desa -->
                <section>
                  <h2 class="text-left">Desa Rejosari</h2>
                  <hr>
                  <p>Gandusari merupakan kelurahan yang ada di Kec Bandongan, Kab.Magelang. yang memiliki luas 5,73Km persegi, dengan hampir 70% luas daerah nya lebih besar area persawahan dan juga hutan atau perkebunan milik warga, dari pada tempat pemukiman. maka tak heran jika rata-rata warga setempat bermata pencaharian dengan bertani dan berkebun.</p>
                </section>
        
                <!-- Section 2 destinasi wisata unggulan-->
                <section>
                  <h2 class="text-left">Destinasi Wisata Unggulan</h2>
                  @foreach ($data as $rejosari)
                  <hr>
                  <section>
                    <img src="{{ asset('storage/'.$rejosari->foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style=" object-fit: cover;">
                    <h3 class="text-left">{{ $rejosari->judul }}</h3>
                    <p>{!! $rejosari->deskripsi !!}</p>
                  </section>
                  @endforeach
                </section>
              </div>
              {{-- <div class="visi-misi col-lg-4">
                <img src="{{ asset('img\desa_geo_map\desa_ngepanrejo.png') }}" class="img-fluid full-width-image" alt="Responsive Image">
              </div> --}}
              <figure class="figure visi-misi col-lg-4">
                <img src="{{ asset('img\desa_geo_map\desa_rejosari.png') }}" class="figure-img img-fluid rounded" alt="Responsive Image">
                <figcaption class="figure-caption">Kawasan Desa Rejosari</figcaption>
              </figure>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection