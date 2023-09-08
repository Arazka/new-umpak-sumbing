@extends('layouts.app')

@section('main')
<div class="container container-header">
    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pariwisata</li>
        </ol>
      </nav>
    <nav>
        <div class="nav nav-tabs d-flex align-items-center justify-content-center mb-2" id="nav-tab" role="tablist">
            <button class="nav-link active" id="desa-bandongan-tab" data-bs-toggle="tab" data-bs-target="#desa-bandongan" type="button" role="tab" aria-controls="desa-bandongan" aria-selected="true">Desa Bandongan</button>
            <button class="nav-link" id="desa-gandusari-tab" data-bs-toggle="tab" data-bs-target="#desa-gandusari" type="button" role="tab" aria-controls="desa-gandusari" aria-selected="false">Desa Gandusari</button>
            <button class="nav-link" id="desa-kalegen-tab" data-bs-toggle="tab" data-bs-target="#desa-kalegen" type="button" role="tab" aria-controls="desa-kalegen" aria-selected="false">Desa Kalegen</button>
            <button class="nav-link" id="desa-ngepanrejo-tab" data-bs-toggle="tab" data-bs-target="#desa-ngepanrejo" type="button" role="tab" aria-controls="desa-ngepanrejo" aria-selected="false">Desa Ngepanrejo</button>
            <button class="nav-link" id="desa-rejosari-tab" data-bs-toggle="tab" data-bs-target="#desa-rejosari" type="button" role="tab" aria-controls="desa-rejosari" aria-selected="false">Desa Rejosari</button>
            <button class="nav-link" id="desa-sidorejo-tab" data-bs-toggle="tab" data-bs-target="#desa-sidorejo" type="button" role="tab" aria-controls="desa-sidorejo" aria-selected="false">Desa Sidorejo</button>
            <button class="nav-link" id="desa-trasan-tab" data-bs-toggle="tab" data-bs-target="#desa-trasan" type="button" role="tab" aria-controls="desa-trasan" aria-selected="false">Desa Trasan</button>
        </div>
    </nav>
    <div class="d-flex tab-content align-items-center justify-content-center" id="nav-tabContent">
        <div class="tab-pane fade show active " id="desa-bandongan" role="tabpanel" aria-labelledby="desa-bandongan-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-bandongan') }}">
                    <img src="img/desa_geo_map/desa_bandongan.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Bandongan</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade align-items-center justify-content-center" id="desa-gandusari" role="tabpanel" aria-labelledby="desa-gandusari-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-gandusari') }}">
                    <img src="img/desa_geo_map/desa_gandusari.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit: cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Gandusari</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="desa-kalegen" role="tabpanel" aria-labelledby="desa-kalegen-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-kalegen') }}">
                    <img src="img/desa_geo_map/desa_kalegen.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Kalegen</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="desa-ngepanrejo" role="tabpanel" aria-labelledby="desa-ngepanrejo-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-ngepanrejo') }}">
                    <img src="img/desa_geo_map/desa_kalegen.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Ngepanrejo</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="desa-rejosari" role="tabpanel" aria-labelledby="desa-rejosari-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-rejosari') }}">
                    <img src="img/desa_geo_map/desa_rejosari.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Rejosari</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="desa-sidorejo" role="tabpanel" aria-labelledby="desa-sidorejo-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-sidorejo') }}">
                    <img src="img/desa_geo_map/desa_sidorejo.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Sidorejo</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="desa-trasan" role="tabpanel" aria-labelledby="desa-trasan-tab" tabindex="0">
            <div class="card projects-img">
                <a href="{{ url('/desa/desa-trasan') }}">
                    <img src="img/desa_geo_map/desa_trasan.png" class="card-img-top" alt="projects1" style="height:25rem; object-fit:cover;" />
                </a>
                <div class="card-body align-items-center justify-content-center">
                    <h5 class="card-title text-center">Desa Trasan</h5>
                    <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div> -->
    
        <div class="row">
            <div class="col-12 embed-responsive embed-responsive-16by9" style="height: 30rem;">
                <iframe class="h-100 w-100 embed-responsive-item" src="https://www.google.com/maps/d/embed?mid=1k0BgfgwGdesWIRhnf0FAD7Vq2RoHMIE&ehbc=2E312F"></iframe>
            </div>
        </div>
    
</div>

<!-- Pariwisata Unggulan -->
<section id="desa" class="my-5">
    <div class="container">
        <h3 class="text-center mb-4">Pariwisata Unggulan</h3>
        <div class="row justify-content-left">
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a class="h-100" href="{{ url('/pariwisata/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa bandongan.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Bandongan</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-gandusari') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa gandusari.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Gandusari</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-kalegen') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa kalegen.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Kalegen</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-rejosari') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa rejosari.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Rejosari</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-sidorejo') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa sidorejo.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Sidorejo</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-trasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa trasan.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Desa Trasan</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-dark h-25 d-inline-block w-100">
                <a href="{{ url('/pariwisata/desa-ngepanrejo') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('img/foto desa/desa ngepanrejo.jpg') }}" class="card-img h-100" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Desa Ngepanrejo</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection