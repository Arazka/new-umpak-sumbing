@extends('layouts.app')

@section('main')
<!-- Produk Unggulan -->
<div class="container container-header">
    <br>
    <h1>Produk Unggulan Kawasan</h1>
    <hr>
    <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam sint itaque, numquam doloremque fugit esse distinctio, iusto est a, in quae quos neque repellendus. Maiores sequi distinctio nisi provident aperiam?</h4>
    <br>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/sandal.jpg') }}" class="card-img h-100" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Sandal Mevah</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/apel.jpg') }}" class="card-img h-100" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Apel Super</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url('/desa/desa-bandongan') }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('/img/wisata desa/tas.jpeg') }}" class="card-img h-100" alt="...">
                    <div class="position-absolute bottom-0 start-0 w-100 p-2" style="background: rgba(0, 0, 0, 0.5);">
                        <h5 class="card-title text-white">Tas Sleker</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
