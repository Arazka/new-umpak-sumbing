@extends('layouts.admin')

@section('title', 'Data Desa')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Desa</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Desa</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      {{-- @can ('admin')
        <a class="btn btn-primary" href="{{ url('/admin/desa/create') }}">Tambah Data Desa</a>
      @endcan   --}}
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=170>Foto</th>
                <th>Nama Desa</th>
                <th width=500>Sejarah</th>
                @can ('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $desa)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td><img src="{{ asset('storage/' . $desa->foto) }}" alt="" style="width: 8rem;"></td>
                <td>{{ $desa->nama_desa }}</td>
                <td>{!! Str::limit($desa->sejarah, 170) !!}</td>
                @can ('admin')
                <td class="gap-2 text-center">
                  <a href="{{ url("admin/desa/$desa->id/edit") }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
                  {{-- <form id="delete-desa-{{$desa->id}}" action="{{ url("admin/desa/$desa->id") }}" method="POST">
                  @csrf @method('DELETE')
                  @can ('admin')
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                  @endcan
                  </form> --}}
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
