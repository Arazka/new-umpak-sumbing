@extends('layouts.app')

@section('main')
<div class="container container-header">
    
        <div class="row">
            <div class="col-12 embed-responsive embed-responsive-16by9" style="height: 30rem;">
                <iframe class="h-100 w-100 embed-responsive-item" src="https://www.google.com/maps/d/embed?mid=1k0BgfgwGdesWIRhnf0FAD7Vq2RoHMIE&ehbc=2E312F"></iframe>
            </div>
        </div>
    
</div>

<!-- Pariwisata Unggulan -->
<section id="desa" class="my-5">
    <div class="container">
        <h3 class="text-center mb-4">Pariwisata Desa</h3>
        <div class="row justify-content-left">
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a class="h-100" href="{{ url('/pariwisata/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa bandongan.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Desa Bandongan</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-gandusari') }}" style="text-shadow: 1px 1px 0 #000; color:white; height:100%">
                        <img src="{{ asset('img/foto desa/desa gandusari.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Desa Gandusari</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-kalegen') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa kalegen.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Desa Kalegen</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-rejosari') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa rejosari.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Desa Rejosari</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-sidorejo') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa sidorejo.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">Desa Sidorejo</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-trasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('img/foto desa/desa trasan.jpg') }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
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
                    <div class="card-img-overlay d-flex justify-content-center align-items-center">
                        <h5 class="card-title">Desa ngepanrejo</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection