@extends('layouts.admin')

@section('title', 'Update Data Regulasi')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Update Data Regulasi</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/regulasi') }}">Data Regulasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Data Regulasi</li>
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
      <form method="POST" action="{{ url("/admin/regulasi/$regulasi->id") }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload foto</label>
                        <img src="{{ url(asset('storage/'.$regulasi->foto)) }}" class="img-preview img-fluid col-sm-3 mb-3 d-block">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        @error('foto')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" value="{{ old('judul', $regulasi->judul) }}" required>
                        @error('judul')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" rows="7" required>{{ old('deskripsi', $regulasi->deskripsi) }}</textarea>
                      @error('deskripsi')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div> --}}
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $regulasi->deskripsi) }}" required>
                      <trix-editor input="deskripsi"></trix-editor>
                      <p id="deskripsiValidationMessage" class="text-danger"></p>
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

<script>
  const deskripsiInput = document.getElementById("deskripsi");
  const deskripsiEditor = document.querySelector("trix-editor");
  const deskripsiValidationMessage = document.getElementById("deskripsiValidationMessage");

  deskripsiEditor.addEventListener("trix-change", function () {
      const text = deskripsiInput.value;

      if (text.length > 478) {
          deskripsiValidationMessage.textContent = "Deskripsi tidak boleh lebih dari 478 karakter.";
          deskripsiEditor.style.borderColor = "red";
      } else {
          deskripsiValidationMessage.textContent = "";
          deskripsiEditor.style.borderColor = ""; // Menghapus warna border merah jika valid.
      }
  });
</script>
@endsection