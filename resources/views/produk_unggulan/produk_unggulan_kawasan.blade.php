@extends('layouts.app')

@section('main')
<!-- Produk Unggulan -->
<div class="container container-header">
    <br>
    <h1>Produk Unggulan Kawasan</h1>
    <hr>
    <br>

    <div class="row">
        @foreach ($data as $kawasan)
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100 position-relative">
                <a class="h-100" href="{{ url("/produk-unggulan-kawasan/$kawasan->nama_produk") }}" style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('storage/'.$kawasan->foto) }}" class="card-img h-100" alt="...">
                    <div class="card-img-overlay justify-content-center align-items-center d-flex" style="background: rgba(36, 36, 36, 0.5)">
                        <h5 class="card-title text-white">{{ $kawasan->nama_produk }}</></h5>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
