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
            @foreach ($data as $desa)
            <div class="col-md-4 mb-4">
                <div class="card text-bg-dark h-100">
                    <a class="h-100" href="{{ url("/pariwisata/$desa->nama_desa") }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                        <img src="{{ asset('storage/'. $desa->foto) }}" class="card-img h-100" alt="...">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title">{{ $desa->nama_desa }}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
</section>
@endsection