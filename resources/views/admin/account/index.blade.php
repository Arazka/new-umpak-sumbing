@extends('layouts.admin')

@section('title', 'Data Account')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Akun</li>
            </ol>
          </nav>
      </div>
      
    @include ('includes.flash')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">

        <a class="btn btn-primary" href="{{ url('admin/account/create') }}">Tambah Akun</a>
      
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width=10>No</th>
                <th>Username</th>
                <th>Role</th>
                <th width=200>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @if ($data != null)
              @foreach ($data as $key => $user)
              <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->type }}</td>
                <td class="gap-2 text-center">
                  {{-- <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button> --}}
                  <form id="delete-user-{{$user->id}}" action="{{ url("admin/account/$user->id") }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ url("/admin/account/$user->id/edit") }}" class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit"> Edit</i></a>
                    @if ($user->type == 'user')
                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                      <i class="fa fa-trash"></i> Hapus
                    </button>
                    @endif
                  </form>
                </td>
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