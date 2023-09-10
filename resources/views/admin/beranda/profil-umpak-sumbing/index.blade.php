@extends('layouts.admin')

@section('title', 'Data Profil Umpak Sumbing')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Profil Umpak Sumbing</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Profil Umpak Sumbing</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3 justify-content-between d-flex">
      @can ('admin')
        <a class="btn btn-primary" href="{{ url('/admin/profile-umpak-sumbing/create') }}">Tambah Data Profil Umpak Sumbing</a>
      @endcan  
      {{-- <a class="btn btn-warning" href="{{ url('/admin/view-berita') }}">Lihat Semua berita</a>   --}}
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th width=500>Sejarah</th>
                <th width=500>Misi</th>
                <th width=500>Visi</th>
                @can ('admin')
                <th width=300>Aksi</th>
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $profil)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{!! Str::limit($profil->sejarah, 170) !!}</td>
                <td>{!! Str::limit($profil->misi, 170) !!}</td>
                <td>{!! Str::limit($profil->visi, 170) !!}</td>
                @can ('admin')
                <td class="gap-2 text-center">
                  <form id="delete-profil-{{$profil->id}}" action="{{ url("admin/profile-umpak-sumbing/$profil->id") }}" method="POST">
                  @csrf @method('DELETE')
                  {{-- <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i> Lihat</button> --}}
                  @can ('admin')
                  <a href="{{ url("admin/profile-umpak-sumbing/$profil->id/edit") }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                  @endcan
                  </form>
                </td>
                @endcan
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
