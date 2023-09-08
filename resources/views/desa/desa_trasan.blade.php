@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
  <div class="row">
    <div class="col-12 p-0">
      <img src="{{ asset('img\foto desa\desa trasan.jpg') }}" class="post-banner-image" alt="Full-width Picture">
    </div>
  </div>

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi desa -->
        <section>
          <h2 class="text-left">Desa Trasan</h2>
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