@extends('layouts.admin')

@section('main')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
                </ol>
            </nav>
        </div>

        @include ('includes.flash')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="btn btn-primary" href="{{ url('/admin/berita/create') }}">Tambah Berita</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width=10>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th width=500>Deskripsi</th>
                                <th width=300>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data != null)
                                @foreach ($data as $key => $berita)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset('storage/' . $berita->foto) }}" alt=""
                                                style="width: 8rem"></td>
                                        <td>{{ $berita->judul }}</td>
                                        <td>{{ $berita->deskripsi }}</td>
                                        <td class="gap-2 text-center">
                                            <form id="delete-berita-{{ $berita->id }}"
                                                action="{{ url("admin/berita/$berita->id") }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="button" class="btn btn-primary"><i
                                                        class="bi bi-folder-fill"></i> Lihat</button>
                                                @if (Auth::user()->type == 'admin')
                                                    <a href="{{ url("admin/berita/$berita->id/edit") }}"
                                                        class="btn btn-success"><i class="bi bi-pencil-fill" title="Edit">
                                                            Edit</i></a>
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                        data-placement="top" title="Hapus">
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
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
