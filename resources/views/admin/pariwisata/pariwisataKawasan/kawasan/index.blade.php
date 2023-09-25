@extends('layouts.admin')

@section('title', 'Data Kawasan')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Kawasan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Kawasan</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      {{-- @if (Auth::user()->type == 'admin')
        <a class="btn btn-primary" href="{{ url('/admin/kawasan/create') }}" title="Tambah Data Kawasan">Tambah Data Kawasan</a>
      @endif --}}
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-kawasan') }}" title="Lihat Data Kawasan">Lihat Data Kawasan</a> --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=300>Foto</th>
                <th>Nama Kawasan</th>
                @can ('admin')
                <th width=200>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $kawasan)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td class="text-center"><img src="{{ asset('storage/' . $kawasan->foto) }}" alt="" style="width: 8rem;"></td>
                <td class="">{{ $kawasan->nama_kawasan }}</td>
                {{-- <td>{!! Str::limit($kawasan->deskripsi, 170) !!}</td> --}}
                @can('admin')               
                <td class="gap-2 text-center">
                  <form id="delete-kawasan-{{$kawasan->id}}" action="{{ url("admin/kawasan/$kawasan->id") }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ url("admin/kawasan/$kawasan->id/edit") }}" class="btn btn-success mb-3"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
                    {{-- <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i> Lihat</button> --}}
                  @if (Auth::user()->type == 'admin')
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