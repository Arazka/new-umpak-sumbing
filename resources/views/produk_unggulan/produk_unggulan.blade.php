@extends('layouts.app')

@section('main')
<!-- Produk Unggulan -->
<div class="container container-header">
    <h1>Paket wisata terbaik hanya untukmu!</h1>
    <p>Penawaran terbaik untuk menjelajahi Umpak Sumbing. Pilih opsi yang cocok dan nikmati wisatamu sekarang!</p>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/sleker asri.jpg') }}" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Paket Wisata Sleker Asri</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/vila.jpg') }}" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Penginapan Vila</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/edukasi.jpg') }}" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Paket Wisata Edukasi</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <h2>Produk unggulan menantimu!</h2>
    <p>Produk unggulan khas Umpak Sumbing dan berkualitas siap menjadi milikmu!</p>
</div>
@endsection
