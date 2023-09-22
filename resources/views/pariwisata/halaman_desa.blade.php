@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
    
    <div class="col-12 p-0">
      <img src="{{ asset('storage/'. $desa->foto) }}" class="post-banner-image" alt="Full-width Picture">
      {{-- <img src="{{ asset('placeholder_image.jpg') }}" class="post-banner-image placeholder bg-primary" alt="Full-width Picture"> --}}
    </div>
  

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi desa -->
        <section>
            <h2 class="text-left">{{ $desa->nama_desa }}</h2>
            <hr>
            <p>{!! $desa->sejarah !!}</p>
        </section>
  
        <!-- Section 2 destinasi wisata unggulan-->
        <section>
          <h2 class="text-left">Destinasi Wisata Unggulan</h2>
          @foreach ($pariwisatas as $pariwisata)
          <hr>
          <section>
            <img src="{{ asset('storage/'. $pariwisata->pariwisata_foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">{{ $pariwisata->nama_wisata }}</h3>
            <p>{!! $pariwisata->deskripsi !!}</p>
          </section>
          <br>
          @endforeach
        </section>
      </div>
      <div class="sticky-parent col-lg-4 ps-5">
        <figure class="figure visi-misi  position-sticky" style="top: 7rem">
            <img src="{{ asset('storage/'.$desa->foto_kawasan) }}" class="figure-img img-fluid rounded" alt="Responsive Image">
            <figcaption class="figure-caption">Kawasan {{ $desa->nama_desa }}</figcaption>
        </figure>
      </div>
    </div>
  </div>
  <!-- END -->
</div>

@endsection
