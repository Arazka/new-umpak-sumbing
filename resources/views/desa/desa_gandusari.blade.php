@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
  
    <div class="col-12 p-0">
      <img src="{{ asset('img\foto desa\desa gandusari.jpg') }}" class="post-banner-image" alt="Full-width Picture">
    </div>
  

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi desa -->
        <section>
          <h2 class="text-left">Desa Gandusari</h2>
          <hr>
          <p>Gandusari merupakan kelurahan yang ada di Kec Bandongan, Kab.Magelang. yang memiliki luas 5,73Km persegi, dengan hampir 70% luas daerah nya lebih besar area persawahan dan juga hutan atau perkebunan milik warga, dari pada tempat pemukiman. maka tak heran jika rata-rata warga setempat bermata pencaharian dengan bertani dan berkebun.</p>
        </section>

        <!-- Section 2 destinasi wisata unggulan-->
        <section>
          <h2 class="text-left">Destinasi Wisata Unggulan</h2>
          @foreach ($data as $gandusari)
          <hr>
          <section>
            <img src="{{ asset('storage/'. $gandusari->foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">{{ $gandusari->judul }}</h3>
            <p>
              {!! $gandusari->deskripsi !!}
            </p>
          </section>
          @endforeach
        </section>
      </div>
      <div class="sticky-parent col-lg-4">
        <figure class="figure visi-misi  position-sticky" style="top: 7rem">
          <img src="{{ asset('img\desa_geo_map\desa_gandusari.png') }}" class="figure-img img-fluid rounded" alt="Responsive Image">
          <figcaption class="figure-caption">Kawasan Desa Gandusari</figcaption>
        </figure>
        </div>
    </div>
  </div>
  <!-- END -->
</div>

@endsection