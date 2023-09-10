@extends('layouts.app')

@section('main')
    <!-- CAROUSEL -->
    <!-- <div class="container header">
          <img src="umpaksumbing-1.png" class="img-fluid" alt="..." />
        </div> -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($desas as $key => $desa)
          <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/'.$desa->foto) }}" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fs-1">{{ $desa->nama_desa }}</h5>
            </div>
          </div>
          @endforeach
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
                <p>{!! $profils->first()->sejarah !!}</p>
            </div>
            <div class="visi-misi col-lg-4">
                <div class="accordion custom-shadow rounded-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button h1 fs-4 fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">Misi</button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                              <p>{!! $profils->first()->misi !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed h1 fs-4 fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">Visi</button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                              <p>{!! $profils->first()->visi !!}</p>
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
    </div>

    <!-- END -->
@endsection
