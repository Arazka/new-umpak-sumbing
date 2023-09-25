@extends('layouts.admin')

@section('title', 'Update Data Profil Lemabaga BKAD')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Update Data Profil Lemabaga BKAD</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/profil-lembaga-bkad') }}">Data Profil Lemabaga BKAD</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Data Profil Lemabaga BKAD</li>
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
      <form method="POST" action="{{ url("/admin/profil-lembaga-bkad/$profil->id") }}">
        @csrf @method('PATCH')
                <div class="card-body">
                  {{-- <div class="form-group">
                    <label for="exampleInputPassword1">Lembaga</label>
                    <select name="type" id="type" class="form-control" required>
                       <option value="">--Pilih Lembaga--</option>
                       <option value="bkad">BKAD</option>
                       <option value="bumdesma">BUMDESMA</option>
                    </select>
                </div> --}}
                    <div class="form-group">
                      <label for="sejarah">Sejarah</label>
                      <input id="sejarah" type="hidden" name="sejarah" value="{{ old('sejarah', $profil->sejarah) }}" required>
                      <trix-editor input="sejarah"></trix-editor>
                      @error('sejarah')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="visi_dan_misi">Visi dan Misi</label>
                      <input id="visi_dan_misi" type="hidden" name="visi_dan_misi" value="{{ old('visi_dan_misi', $profil->visi_dan_misi) }}" required>
                      <trix-editor input="visi_dan_misi"></trix-editor>
                      @error('visi_dan_misi')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tugas_dan_fungsi">Tugas dan Fungsi</label>
                      <input id="tugas_dan_fungsi" type="hidden" name="tugas_dan_fungsi" value="{{ old('tugas_dan_fungsi', $profil->tugas_dan_fungsi) }}" required>
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
