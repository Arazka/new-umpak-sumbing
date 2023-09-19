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
        @foreach ($data as $kawasan)
        <div class="col-md-4 mb-4">
            <div class="card text-bg-dark h-100">
                <a class="h-100" href="{{ url("/pariwisata-kawasan/$kawasan->nama_kawasan") }}"
                    style="text-shadow: 1px 1px 0 #000; color:white;">
                    <img src="{{ asset('storage/'.$kawasan->foto) }}" class="card-img h-100" alt="...">
                    <div class="card-img-overlay d-flex justify-content-center align-items-center">
                        <h5 class="card-title"><b>{{ $kawasan->nama_kawasan }}</b></h5>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
