@extends('layouts.admin')

@section('title', 'Tambah Data Profil Lembaga BUMDESMA')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Profil Lembaga BUMDESMA</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/profil-lembaga-bumdesma') }}"> Data Profil Lembaga BUMDESMA</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Profil Lembaga BUMDESMA</li>
      </ol>
    </nav>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" action="{{ url('/admin/profil-lembaga-bumdesma') }}">
        @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lembaga</label>
                        <select name="type" id="type" class="form-control" required>
                           <option value="">--Pilih Lembaga--</option>
                           <option value="bkad">BKAD</option>
                           <option value="bumdesma">BUMDESMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sejarah</label>
                        <input id="sejarah" type="hidden" name="sejarah">
                        <trix-editor input="sejarah"></trix-editor>
                        @error('sejarah')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Visi dan Misi</label>
                        <input id="visi_dan_misi" type="hidden" name="visi_dan_misi">
                        <trix-editor input="visi_dan_misi"></trix-editor>
                        @error('visi_dan_misi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tugas dan Fungsi</label>
                        <input id="tugas_dan_fungsi" type="hidden" name="tugas_dan_fungsi">
                        <trix-editor input="tugas_dan_fungsi"></trix-editor>
                        @error('tugas_dan_fungsi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
      </form>
    </div>
  </div>
</div>
@endsection