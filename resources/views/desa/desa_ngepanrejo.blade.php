@extends('layouts.app')

@section('main')

<div class="container-fluid p-0">
  <!-- Full-width picture -->
  <div class="row">
    <div class="col-12 p-0">
      <img src="{{ asset('img\foto desa\desa ngepanrejo.jpg') }}" class="post-banner-image" alt="Full-width Picture">
    </div>
  </div>

  <!-- Two-column section -->
  <!-- SEJARAH DAN VISI MISI -->
  <div class="container sejarah py-4 mt-5">
    <div class="row">
      <div class="umpak-sumbing col-lg-8 mb-4">
        <!-- Section 1 deskripsi desa -->
        <section>
          <h2 class="text-left">Desa Ngepanrejo</h2>
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
          <hr>
          <section>
            <img src="{{ asset('img\foto desa\desa ngepanrejo.jpg') }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">Kesenian Jathilan</h3>
            <p>
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
            </p>
            <p>
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
            </p>
          </section>
          <section>
            <img src="{{ asset('img\foto desa\desa sidorejo.jpg') }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 20rem; object-fit: cover;">
            <h3 class="text-left">Makanan Khas</h3>
            <p>
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
            </p>
            <p>
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
            </p>
            <p>
              Aliquam euismod quam vitae aliquet semper. Ut sed nibh aliquam, efficitur sapien ut, lacinia quam. In
              sagittis elementum justo, in facilisis arcu aliquet a. Vestibulum vestibulum purus nulla, sed mollis
              dui viverra eu. Proin et rhoncus est, in consequat lorem. Morbi sodales tellus eget lectus bibendum
              condimentum. Integer vitae turpis nec arcu finibus mattis in ac lacus. Phasellus nec bibendum eros.
            </p>
          </section>
        </section>
      </div>
      <div class="visi-misi col-lg-4">
        <!-- image is in here -->
        <img src="{{ asset('img\desa_geo_map\desa_bandongan.png') }}" class="img-fluid full-width-image" alt="Responsive Image">
      </div>
    </div>
  </div>
  <!-- END -->
</div>

@endsection