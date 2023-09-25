@extends('layouts.admin')

@section('title', 'Profil Lembaga BUMDESMA')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Profil Lembaga BUMDESMA</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profil Lembaga BUMDESMA</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      {{-- @can ('admin')
        <a class="btn btn-primary" href="{{ url('/admin/profil-lembaga-bumdesma/create') }}">Tambah Profil Lembaga BUMDESMA</a>
      @endcan   --}}
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=500>Sejarah</th>
                <th width=500>Visi dan Misi</th>
                <th width=500>Tugas dan Fungsi</th>
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $profil)
              <a href="{{ url("admin/profil-lembaga-bumdesma/$profil->id/edit") }}" class="btn btn-success mb-3"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{!! Str::limit($profil->sejarah, 170) !!}</td>
                <td>{!! Str::limit($profil->visi_dan_misi, 170) !!}</td>
                <td>{!! Str::limit($profil->tugas_dan_fungsi, 170) !!}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
    </div>
    </div>
</div>
@endsection
