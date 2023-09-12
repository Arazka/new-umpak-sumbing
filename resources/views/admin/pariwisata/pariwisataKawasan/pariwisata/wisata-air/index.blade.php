@extends('layouts.admin')

@section('title', 'Data Wisata Kawasan Wisata Air')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Wisata Kawasan Wisata Air</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Wisata Kawasan Wisata Air</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      @if (Auth::user()->type == 'admin')  
        <a class="btn btn-primary" href="{{ url('/admin/wisata-kawasan-wisata-air/create') }}">Tambah Wisata</a>
      @endif
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-wisata-kawasan-wisata-air') }}">Lihat Data Wisata Kawasan Wisata Air</a> --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=170>Foto</th>
                <th>Nama Pariwisata</th>
                <th width=500>Deskripsi</th>
                @can ('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $wisataAir)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $wisataAir->foto) }}" alt="" style="width: 8rem"></td>
                <td>{{ $wisataAir->nama_wisata }}</td>
                <td>{!! Str::limit($wisataAir->deskripsi, 150) !!}</td>
                @can('admin')
                <td class="gap-2 text-center">
                  <form id="delete-wisataAir-{{$wisataAir->id}}" action="{{ url("admin/wisata-kawasan-wisata-air/$wisataAir->id") }}" method="POST">
                  @csrf @method('DELETE')
                  {{-- <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i> Lihat</button> --}}
                  @if (Auth::user()->type == 'admin')
                  <a href="{{ url("admin/wisata-kawasan-wisata-air/$wisataAir->id/edit") }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                  @endif
                  </form>
                </td>
                @endcan
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between align-items-cenet">
          <div class="showing">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
          </div>
          <div class="paginate">
            {{ $data->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection