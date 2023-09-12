@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
    
    <div class="col-12 p-0">
      <img src="{{ asset('storage/'. $data->foto_desa) }}" class="post-banner-image" alt="Full-width Picture">
    </div>
  

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi data -->
        <section>
          <h2 class="text-left">{{ $data->first()->nama_desa }}</h2>
          <hr>
          <p>{!! $data->first()->sejarah !!}</p>
        </section>
  
        <!-- Section 2 destinasi wisata unggulan-->
        <section>
          <h2 class="text-left">Destinasi Wisata Unggulan</h2>
          @foreach ($data as $pariwisata)
          <hr>
          <section>
            <img src="{{ asset('storage/'. $pariwisata->pariwisata_foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">{{ $pariwisata->nama_wisata }}</h3>
            <p>
              {!! $pariwisata->deskripsi !!}
            </p><br>
          </section>
          @endforeach
        </section>
      </div>
      <div class="sticky-parent col-lg-4">
        <figure class="figure visi-misi  position-sticky" style="top: 7rem">
          <img src="{{ asset('storage/'.$data->first()->foto_kawasan) }}" class="figure-img img-fluid rounded" alt="Responsive Image">
          <figcaption class="figure-caption">Kawasan {{ $data->first()->nama_desa }}</figcaption>
        </figure>
        </div>
    </div>
  </div>
  <!-- END -->
</div>

@endsection