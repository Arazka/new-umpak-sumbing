@extends('layouts.admin')

@section('title', 'Program Kerja BUMDESMA')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Program Kerja BUMDESMA</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Program Kerja BUMDESMA</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      {{-- @if (Auth::user()->type == 'admin')
        <a class="btn btn-primary" href="{{ url('/admin/program-kerja-bumdesma/create') }}" title="Tambah Program Kerja BUMDESMA">Tambah Program Kerja BUMDESMA</a>
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
                <th>Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $item)
              <a href="{{ url("admin/program-kerja-bumdesma/$item->id/edit") }}" class="btn btn-success mb-3"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
              <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-center"><img src="{{ asset('storage/' . $item->foto) }}" alt="" style="width: 8rem;"></td>
                <td>{!! Str::limit($item->deskripsi, 270) !!}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        {{-- <div class="d-flex justify-content-between align-items-cenet">
          <div class="showing">
            Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries
          </div>
          <div class="paginate">
            {{ $data->links('pagination::bootstrap-4') }}
          </div>
        </div> --}}
      </div>
    </div>
  </div>
@endsection