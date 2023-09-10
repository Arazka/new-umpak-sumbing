@extends('layouts.admin')

@section('title', 'Update Data Profil Umpak Sumbing')
@section('main')
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Update Data Profil Umpak Sumbing</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/profile-umpak-sumbing') }}">Data Profil Umpak Sumbing</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Data Profil Umpak Sumbing</li>
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
      <form method="POST" action="{{ url("/admin/profile-umpak-sumbing/$profil->id") }}">
        @csrf @method('PATCH')
                <div class="card-body">
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
                      <label for="misi">Misi</label>
                      <input id="misi" type="hidden" name="misi" value="{{ old('misi', $profil->misi) }}" required>
                      <trix-editor input="misi"></trix-editor>
                      @error('misi')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="visi">Visi</label>
                      <input id="visi" type="hidden" name="visi" value="{{ old('visi', $profil->visi) }}" required>
                      <trix-editor input="visi"></trix-editor>
                      @error('visi')
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
