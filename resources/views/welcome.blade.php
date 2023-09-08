@extends('layouts.app')

@section('main')
    <!-- CAROUSEL -->
    <!-- <div class="container header">
          <img src="umpaksumbing-1.png" class="img-fluid" alt="..." />
        </div> -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img\foto desa\desa bandongan.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fs-1">Desa Bandongan</h5>
              <p>Some representative placeholder content for the first slide..</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img\foto desa\desa sidorejo.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fs-1">Desa Sidorejo</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
            <div class="carousel-item">
                <img src="{{ asset('img\foto desa\desa trasan.jpg') }}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fs-1">Desa Trasan</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <a href="desa/desaNgepanrejo.html" class="carousel-item">
                <img src="{{ asset('img\foto desa\desa ngepanrejo.jpg') }}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fs-1">Desa Ngepanrejo</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </a>
            <div class="carousel-item">
                <img src="{{ asset('img\foto desa\desa kalegen.jpg') }}" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="fs-1">Desa Kalegen</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img\foto desa\desa ngepanrejo.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fs-1">Desa Ngepanrejo</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('img\foto desa\desa kalegen.jpg') }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fs-1">Desa Kalegen</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- END CAROUSEL -->

    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Beranda</li> -->
            </ol>
        </nav>
    </div>

    <!-- SEJARAH DAN VISI MISI -->
    <div class="container sejarah py-2">
        <div class="row">
            <div class="umpak-sumbing col-lg-8 mb-4">
                <div class="title">
                    <h1 class="fw-bolder">Sejarah Umpak Sumbing</h1>
                    <hr />
                </div>
                <div class="deskripsi-1">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod asperiores modi, aperiam beatae porro quas
                  dicta! Cum voluptates omnis, perferendis deleniti asperiores pariatur distinctio id labore laudantium
                  dolor. Illo, incidunt
                  nemo. Laborum quam similique inventore amet tempora in libero enim? In excepturi vel, impedit ad maxime
                  maiores quod necessitatibus magnam quisquam, obcaecati totam amet ab reiciendis, nobis deleniti! Est
                  beatae modi provident
                  tempora reiciendis dolorum iste, maiores voluptatum id? Eaque nostrum illo hic enim non culpa quos
                  aliquam ullam voluptate ab, voluptatum sint consequatur doloremque nihil, natus reiciendis! Quae eos
                  itaque placeat voluptatibus
                  dolor cupiditate a, fuga consectetur. Tempore, iure?
                </div>
                <div class="break"><br /></div>
                <div class="deskripsi-2">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod asperiores modi, aperiam beatae porro quas
                  dicta! Cum voluptates omnis, perferendis deleniti asperiores pariatur distinctio id labore laudantium
                  dolor. Illo, incidunt
                  nemo. Laborum quam similique inventore amet tempora in libero enim? In excepturi vel, impedit ad maxime
                  maiores quod necessitatibus magnam quisquam, obcaecati totam amet ab reiciendis, nobis deleniti! Est
                  beatae modi provident
                  tempora reiciendis dolorum iste, maiores voluptatum id? Eaque nostrum illo hic enim non culpa quos
                  aliquam ullam voluptate ab, voluptatum sint consequatur doloremque nihil, natus reiciendis! Quae eos
                  itaque placeat voluptatibus
                  dolor cupiditate a, fuga consectetur. Tempore, iure?
                </div>
                <div class="break"><br /></div>
                <div class="deskripsi-3">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod asperiores modi, aperiam beatae porro quas
                  dicta! Cum voluptates omnis, perferendis deleniti asperiores pariatur distinctio id labore laudantium
                  dolor. Illo, incidunt
                  nemo. Laborum quam similique inventore amet tempora in libero enim? In excepturi vel, impedit ad maxime
                  maiores quod necessitatibus magnam quisquam, obcaecati totam amet ab reiciendis, nobis deleniti! Est
                  beatae modi provident
                  tempora reiciendis dolorum iste, maiores voluptatum id? Eaque nostrum illo hic enim non culpa quos
                  aliquam ullam voluptate ab, voluptatum sint consequatur doloremque nihil, natus reiciendis! Quae eos
                  itaque placeat voluptatibus
                  dolor cupiditate a, fuga consectetur. Tempore, iure?
                </div>
            </div>
            <div class="visi-misi col-lg-4">
                <div class="accordion custom-shadow rounded-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button h1 fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">Visi</button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="list-group-numbered py-2">
                                    <li class="list-group-item">Mempercepat dan meningkatkan penyelenggaraan pemerintahan
                                    </li>
                                    <br />
                                    <li class="list-group-item">Mempercepat dan meningkatkan pelaksanaan pembangunan</li>
                                    <br />
                                    <li class="list-group-item">Mempercepat dan meningkatkan pembinaan kemasyarakatan</li>
                                    <br />
                                    <li class="list-group-item">Mempercepat dan meningkatkan pemberdayaan masyarakat</li>
                                    <br />
                                    <li class="list-group-item">Mengembangkan potensi desa yang berdaya saing tinggi</li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed h1 fs-4 fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Misi</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p>Terwujudnya masyarakat religius dan sejahtera melalui percepatan pembangunan kawasan
                                    perdesaan dan potensi desa yang berdaya saing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END -->

    <!-- BERITA TERBARU -->
    <div class="container my-5">
        <h1 class="mb-3 fw-bolder">Berita Terbaru</h1>
        <hr />
        @if ($data != null)
          @foreach ($data as $berita)
            @php
                $last_update = Carbon\Carbon::parse($berita->created_at)->diffForHumans();
            @endphp
            <div class="card mb-3 p-3" style="max-width: 100%">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid rounded-start" alt="..." style="border-radius: 0.4rem" />
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <h5 class="card-title fs-2">{{ $berita->judul }}</h5>
                    <p class="card-text">
                      {!! $berita->deskripsi !!}
                    </p>
                    <p class="bottom-0 end-0 mx-3 position-absolute"><small class="text-body-secondary">Last updated {{ $last_update }}</small></p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
    </div>

    <!-- END -->
@endsection
