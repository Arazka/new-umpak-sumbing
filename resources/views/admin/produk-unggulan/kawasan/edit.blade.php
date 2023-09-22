@extends('layouts.admin')

@section('title', 'Update Data Produk Unggulan Kawasan')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Update Data Produk</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/produk-unggulan-kawasan') }}">Data Produk Unggulan Kawasan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Data Produk</li>
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
      <form method="POST" action="{{ url("/admin/produk-unggulan-kawasan/$produk->id") }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    {{-- <div class="form-group">
                      <label for="exampleInputJK">Nama Desa</label>
                      <select class="form-control" name="desa_id" id="desa_id" required>
                          @foreach ($desa as $desas)
                              <option value="{{ $desas->id }}" @if ($desas->id == $produk->desa_id)
                                  selected=""
                              @endif>{{ $desas->nama_desa }}</option>
                          @endforeach
                      </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$produk->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        @error('nama_produk')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $produk->deskripsi) }}" required>
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
</script>
@endsection