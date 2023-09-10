@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
  <div class="row">
    <div class="col-12 p-0">
      <img src="{{ asset('storage/'. $trasans->first()->foto) }}" class="post-banner-image" alt="Full-width Picture">
    </div>
  </div>

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi desa -->
        <section>
          <h2 class="text-left">{{  $trasans->first()->nama_desa }}</h2>
          <hr>
          <p>{!!  $trasans->first()->sejarah !!}</p>
        </section>

        <!-- Section 2 destinasi wisata unggulan-->
        <section>
          <h2 class="text-left">Destinasi Wisata Unggulan</h2>
          @foreach ($data as $trasan)
          <hr>
          <section>
            <img src="{{ asset('storage/'. $trasan->foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">{{ $trasan->judul }}</h3>
            <p>
              {!! $trasan->deskripsi !!}
            </p>
          </section>
          @endforeach
        </section>
      </div>
      <div class="sticky-parent col-lg-4">
        <figure class="figure visi-misi  position-sticky" style="top: 7rem">
          <img src="{{ asset('img\desa_geo_map\desa_trasan.png') }}" class="figure-img img-fluid rounded" alt="Responsive Image">
          <figcaption class="figure-caption">Kawasan Desa Trasan</figcaption>
        </figure>
      </div>
    </div>
  </div>
  <!-- END -->
</div>

@endsection