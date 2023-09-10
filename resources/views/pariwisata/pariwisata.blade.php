@extends('layouts.app')

@section('main')
<div class="container container-header">
    <h1 class="fw-bolder mb-4">Peta Desa Umpak Sumbing</h1>
    <hr/>
    <div class="row">
            <div class="col-12 embed-responsive embed-responsive-16by9" style="height: 30rem;">
                <iframe class="h-100 w-100 embed-responsive-item" src="https://www.google.com/maps/d/embed?mid=1k0BgfgwGdesWIRhnf0FAD7Vq2RoHMIE&ehbc=2E312F"></iframe>
            </div>
        </div>
    
        <hr/>
</div>
<!-- Pariwisata Unggulan -->
<section id="desa" class="my-5">
    <div class="container">
        {{-- <h3 class="text-center mb-4">Pariwisata Desa</h3> --}}
        <div class="row justify-content-left">
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a class="h-100" href="{{ url('/pariwisata/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        @foreach ($bandongans as $bandongan)
                        <img src="{{ asset('storage/'. $bandongan->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $bandongan->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-gandusari') }}" style="text-shadow: 1px 1px 0 #000; color:white; height:100%">
                        @foreach ($gandusaris as $gandusari)
                        <img src="{{ asset('storage/'. $gandusari->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $gandusari->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-kalegen') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        @foreach ($kalegens as $kalegen)
                        <img src="{{ asset('storage/'. $kalegen->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $kalegen->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-rejosari') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        @foreach ($rejosaris as $rejosari)
                        <img src="{{ asset('storage/'. $rejosari->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $rejosari->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-sidorejo') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        @foreach ($sidorejos as $sidorejo)
                        <img src="{{ asset('storage/'. $sidorejo->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $sidorejo->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a href="{{ url('/pariwisata/desa-trasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        @foreach ($trasans as $trasan)
                        <img src="{{ asset('storage/'. $trasan->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $trasan->nama_desa }}</h5>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-dark h-25 d-inline-block w-100">
                <a href="{{ url('/pariwisata/desa-ngepanrejo') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    @foreach ($ngepanrejos as $ngepanrejo)
                        <img src="{{ asset('storage/'. $ngepanrejo->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $ngepanrejo->nama_desa }}</h5>
                        </div>
                    @endforeach
                </a>
            </div>
        </div>
    </div>
</section>
@endsection