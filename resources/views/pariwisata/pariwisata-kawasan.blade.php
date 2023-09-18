@extends('layouts.app')

@section('main')
<div class="container container-header">
    <h1 class="fw-bolder mb-4">Pariwisata Kawasan Umpak Sumbing</h1>
    <div class="row">
        <div class="col-12 embed-responsive embed-responsive-16by9" style="height: 30rem;">
            <iframe class="h-100 w-100 embed-responsive-item"
                src="https://www.google.com/maps/d/embed?mid=1k0BgfgwGdesWIRhnf0FAD7Vq2RoHMIE&ehbc=2E312F"></iframe>
        </div>
    </div>
    <br>
    <hr>
    <br>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/pariwisata-kawasan/halaman-kawasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="https://picsum.photos/id/27/1080/720" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Panorama</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/pariwisata-kawasan/halaman-kawasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="https://picsum.photos/id/28/1080/720" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Agrowisata</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a href="{{ url('/pariwisata-kawasan/halaman-kawasan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="https://picsum.photos/id/42/1080/720" class="card-img" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Wisata</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
