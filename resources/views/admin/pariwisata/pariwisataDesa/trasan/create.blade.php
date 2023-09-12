@extends('layouts.admin')

@section('title', 'Tambah Data Wisata Desa Trasan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Tambah Wisata</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/wisata-trasan') }}">Data Wisata Desa Trasan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Wisata</li>
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
      <form method="POST" action="{{ url('/admin/wisata-trasan') }}" enctype="multipart/form-data">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputJK">Nama Desa</label>
                    <select class="form-control" name="desa_id" id="desa_id" required>
                      <option value="">--- Nama Desa ---</option>
                        @foreach ($desa as $key => $desas)
                            <option value="{{ $desas->id }}">{{ $desas->nama_desa }}</option>
                        @endforeach
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
                        <label for="nama_wisata">Nama Pariwisata</label>
                        <input type="text" class="form-control" name="nama_wisata" id="nama_wisata" placeholder="Nama Pariwisata" value="{{ old('nama_wisata') }}" required>
                        @error('nama_wisata')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" rows="7" value="{{ old('deskripsi') }}" required></textarea>
                        @error('deskripsi')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}" required>
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
