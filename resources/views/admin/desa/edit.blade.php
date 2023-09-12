@extends('layouts.admin')

@section('title', 'Update Data Desa')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Update Data Desa</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/desa') }}">Data Desa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Data Desa</li>
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
      <form method="POST" action="{{ url("/admin/desa/$desa->id") }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$desa->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block" id="img-preview-foto">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage('foto')">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_desa">Nama Desa</label>
                        <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="nama desa" value="{{ old('nama_desa', $desa->nama_desa) }}" required>
                        @error('nama_desa')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="sejarah">Sejarah</label>
                      <input id="sejarah" type="hidden" name="sejarah" value="{{ old('sejarah', $desa->sejarah) }}" required>
                      <trix-editor input="sejarah"></trix-editor>
                      @error('sejarah')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="foto_kawasan" class="form-label">Upload foto kawasan</label>
                      <img src="{{ url(asset('storage/'.$desa->foto_kawasan)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block" id="img-preview-foto_kawasan">
                      <input class="form-control" type="file" id="foto_kawasan" name="foto_kawasan" onchange="previewImage('foto_kawasan')">
                      @error('foto_kawasan')
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

<script>
function previewImage(inputId) {
    const image = document.querySelector(`#${inputId}`);
    const imgPreview = document.querySelector(`#img-preview-${inputId}`);

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

document.addEventListener('trix-file-accept', function(e) {
  e.preventDefault();
})
</script>
@endsection
