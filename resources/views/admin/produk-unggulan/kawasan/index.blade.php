@extends('layouts.admin')

@section('title', 'Produk Unggulan Kawasan')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Produk Unggulan Kawasan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Produk Unggulan Kawasan</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      @if (Auth::user()->type == 'admin')
        <a class="btn btn-primary" href="{{ url('/admin/produk-unggulan-kawasan/create') }}" title="Tambah Wisata">Tambah Produk</a>
      @endif
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-wisata-bandongan') }}" title="Lihat Data Wisata Desa Bandongan">Lihat Data Wisata Desa Bandongan</a> --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=170>Foto</th>
                <th>Nama Produk</th>
                <th width=500>Deskripsi</th>
                @can ('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $produk)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $produk->foto) }}" alt="" style="width: 8rem"></td>
                <td>{{ $produk->nama_produk }}</td>
                <td>{!! Str::limit($produk->deskripsi, 170) !!}</td>
                @can('admin')               
                <td class="gap-2 text-center">
                  <form id="delete-produk-{{$produk->id}}" action="{{ url("admin/produk-unggulan-kawasan/$produk->id") }}" method="POST">
                  @csrf @method('DELETE')
                  {{-- <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i> Lihat</button> --}}
                  @if (Auth::user()->type == 'admin')
                  <a href="{{ url("admin/produk-unggulan-kawasan/$produk->id/edit") }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
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
