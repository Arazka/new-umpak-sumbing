@extends('layouts.app')

@section('main')
<!-- Produk Unggulan -->
<div class="container container-header">
    <br>
    <h1>Produk Unggulan Desa</h1>
    <hr>
    <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam sint itaque, numquam doloremque fugit esse distinctio, iusto est a, in quae quos neque repellendus. Maiores sequi distinctio nisi provident aperiam?</h4>
    <br>

    <div class="row">
        @foreach ($data as $desa)
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url("/produk-unggulan-desa/$desa->nama_produk") }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('storage/'.$desa->foto) }}" class="card-img h-100" alt="...">
                    <div class="card-img-overlay justify-content-center align-items-center d-flex" style="background: rgba(36, 36, 36, 0.5)">
                        <h5 class="card-title text-white">{{ $desa->nama_produk }}</></h5>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url('/produk-unggulan-desa/halaman-desa') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/durian.jpg') }}" class="card-img h-100" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Durian Super</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url('/produk-unggulan-desa/halaman-desa') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/cendol.jpg') }}" class="card-img h-100" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Cendol Seger</h5>
                    </div>
                </a>
            </div>
        </div> --}}
    </div>
</div>
@endsection
