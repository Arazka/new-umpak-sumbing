@extends('layouts.app')

@section('main')
<!-- PROFIL -->
<div class="container container-header py-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">BKAD</li>
        <li class="breadcrumb-item active" aria-current="page">Profil Lembaga</li>
      </ol>
    </nav>

    <h2 class="fw-bolder">Profil Lembaga</h2>
    <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
      <div class="card-body">
        <h4 class="card-title text-danger fw-bolder mb-3">BKAD</h4>
        <p class="card-text">
          {!! $profil->first()->sejarah !!}
        </p>
      </div>
    </div>
    <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
      <div class="card-body">
        <h4 class="card-title text-danger fw-bolder mb-3">Visi dan Misi</h4>
        <p class="card-text">
          {!! $profil->first()->visi_dan_misi !!}
        </p>
      </div>
    </div>
    <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
      <div class="card-body">
        <h4 class="card-title text-danger fw-bolder mb-3">Tugas dan Fungsi</h4>
        <p class="card-text">
          {!! $profil->first()->tugas_dan_fungsi !!}
        </p>
      </div>
    </div>
  </div>
  <!-- END PROFIL -->
@endsection