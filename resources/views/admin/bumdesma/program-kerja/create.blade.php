@extends('layouts.admin')

@section('title', 'Tambah Data Program kerja BUMDESMA')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Program kerja BUMDESMA</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/program-kerja-bumdesma') }}">Data Program kerja BUMDESMA</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Program kerja BUMDESMA</li>
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
      <form method="POST" action="{{ url('/admin/program-kerja-bumdesma') }}" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img class="img-preview img-fluid col-sm-3 mb-3">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()" required>
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>
                        @error('deskripsi')
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
function previewImage() {
    const image = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

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