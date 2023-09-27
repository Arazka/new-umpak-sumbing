@extends('layouts.app')

@section('main')
    
    <div class="container container-header py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">BUMDESMA</li>
            <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
          </ol>
        </nav>
        <h2 class="fw-bolder">Program Kerja</h2>
        <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
          <div class="card-body">
            <h4 class="card-title text-danger fw-bolder mb-3">Uraian Program Kerja BUMDESMA</h4>
            <img src="{{ asset('storage/'.$proker->first()->foto) }}" class="img-fluid" alt="..." style="border-radius: 1rem" />
            <p class="card-text">
              {!! $proker->first()->deskripsi !!}
            </p>
          </div>
        </div>
      </div>
      
@endsection