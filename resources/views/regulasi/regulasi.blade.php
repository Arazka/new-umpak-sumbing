@extends('layouts.app')

@section('main')
<div class="container container-header">
  <h1 class="mb-4 fw-bolder">Peraturan Penyelenggaraan Umpak Sumbing</h1>
    <div class="row">
        @foreach ($data as $regulasi)
        @php
            $last_update = Carbon\Carbon::parse($regulasi->created_at)->diffForHumans();
        @endphp
        <div class="col-md-12 mb-3" data-bs-toggle="modal" data-bs-target="#{{ $regulasi->id }}">
          <div class="text-decoration-none" style="cursor: pointer;">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <div style="height: 17rem; overflow: hidden;">
                            <img src="{{ asset('storage/'.$regulasi->foto) }}" class="img-fluid rounded-start" alt="..." style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8 pb-5">
                        <div class="card-body pb-0 mx-3">
                            <h5 class="card-title text-uppercase">{{ $regulasi->judul }}</h5>
                            <p class="card-text">
                                {!! $regulasi->deskripsi !!}
                            </p>
                        </div>
                        <p class="bottom-0 end-0 mx-3 position-absolute"><small class="text-muted">Last updated {{ $last_update }}</small></p>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal fade" id="{{ $regulasi->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                  <h1 class="modal-title fs-5 text-uppercase" id="staticBackdropLabel">{{ $regulasi->judul }}</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <img src="{{ asset('storage/'.$regulasi->foto) }}" class="img-fluid rounded h-100 mb-3" alt="...">
                  </div>
                  <div class="modal-footer">
                    <p class=""><small class="text-muted">Last updated {{ $last_update }}</small></p>
                  </div>
              </div>
              </div>
          </div>
        </div>
        @endforeach
    </div>
</div>
@endsection