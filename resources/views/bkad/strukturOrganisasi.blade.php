@extends('layouts.app')

@section('main')
    
     
<div class="container container-header py-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">BKAD</li>
        <li class="breadcrumb-item active" aria-current="page">Struktur Organisasi</li>
      </ol>
    </nav>
    <h2 class="fw-bolder">Struktur Organisasi BKAD</h2>
    <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
      <div class="card-body">
        <h4 class="card-title text-danger fw-bolder mb-4">Bagan Struktur Organisasi</h4>
        <img src="{{ asset('img\struktur\struktur_organisasi.png') }}" class="img-fluid" alt="..." style="border-radius: 1rem" />
      </div>
    </div>
    <p>Struktur Organisasi Badan Kerjasama Antar Desa dapat diunduh pada :</p>
    <button type="button" class="btn btn-success">Unduh <i class="bi bi-download"></i></button>
  </div>
    
      
@endsection