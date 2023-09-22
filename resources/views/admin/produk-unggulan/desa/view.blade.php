@extends('layouts.admin')

@section('title', 'Lihat Data Wisata Desa Bandongan')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Lihat Data Wisata Desa Bandongan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('admin/wisata-bandongan') }}">Data Wisata Desa Bandongan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Lihat Data Wisata Desa Bandongan</li>
            </ol>
          </nav>
    </div>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
            <div class="col-12 p-0">
              <img src="{{ asset('img\foto desa\desa bandongan.jpg') }}" class="post-banner-image" alt="Full-width Picture" style="width: 100%">
            </div>
        </div>
        <div class="container-fluid sejarah py-4 mt-5">
            <div class="row">
              <div class="umpak-sumbing col-lg-8 mb-4">
                <!-- Section 1 deskripsi desa -->
                <section>
                  <h2 class="text-left">Desa Bandongan</h2>
                  <hr>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa eros. Nullam fringilla tortor vel
                    mauris pulvinar, et iaculis elit rutrum. Donec eget varius sem. Phasellus sagittis felis at volutpat
                    tristique. Nulla consectetur metus in nisi scelerisque, sit amet ultricies dolor efficitur. In semper
                    metus id ligula elementum fringilla. Vivamus pellentesque enim non mauris feugiat pharetra. Nulla id
                    sodales orci, ut bibendum ex.</p>
                </section>
        
                <!-- Section 2 destinasi wisata unggulan-->
                <section>
                  <h2 class="text-left">Destinasi Wisata Unggulan</h2>
                  @foreach ($data as $bandongan)
                  <hr>
                  <section>
                    <img src="{{ asset('storage/'.$bandongan->foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style=" object-fit: cover;">
                    <h3 class="text-left">{{ $bandongan->judul }}</h3>
                    <p>{!! $bandongan->deskripsi !!}</p>
                  </section>
                  @endforeach
                  
                </section>
              </div>
              {{-- <div class="visi-misi col-lg-4">
                <img src="{{ asset('img\desa_geo_map\desa_bandongan.png') }}" class="img-fluid full-width-image" alt="Responsive Image">
              </div> --}}
              <figure class="figure visi-misi col-lg-4">
                <img src="{{ asset('img\desa_geo_map\desa_bandongan.png') }}" class="figure-img img-fluid rounded" alt="Responsive Image">
                <figcaption class="figure-caption">Kawasan Desa Bandongan</figcaption>
              </figure>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection