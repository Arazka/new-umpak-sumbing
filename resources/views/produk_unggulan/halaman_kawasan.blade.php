@extends('layouts.app')

@section('main')
    <!-- Produk Unggulan -->
    <div class="container-fluid p-0">
        <!-- Full-width picture -->

        <div class="col-12 p-0">
            <img src="{{ asset('storage/test.jpg') }}" class="post-banner-image" alt="Full-width Picture">
        </div>


        <!-- Two-column section -->
        <div class="container py-4 mt-5">
            <!-- Section 1 deskripsi desa -->
            <h2 class="text-left">Produk Unggulan Kawasan</h2>
            <hr>
            <br>
            <!-- Section 2 destinasi wisata unggulan-->
            <section>
                @foreach ($kawasan as $kawasans)
                <h3 class="text-left">{{ $kawasans->nama_produk }}</h3>
                <section>
                    <img src="{{ asset('storage/'.$kawasans->foto) }}" class="img-fluid my-3 w-100" alt="Blog Image" style="height: 30rem; object-fit: cover;">
                    <p>{!! $kawasans->deskripsi !!}</p>
                    <br>
                </section>
            </section>
            @endforeach
        </div>
        <!-- END -->
    </div>
@endsection