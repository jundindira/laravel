@extends('layout/aplikasi')

@section('konten')
<a href="/posts" class="btn btn-secondary"><< Kembali</a>
<form method="POST" action="{{ '/post/'.$data->id }}" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="mb-3">
    <h1>Judul: {{ $data->title }}</h1>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="{{ $data->slug }}">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <label for="body" class="form-label">Isi Berita</label>
      <input type="text" class="form-control" name="body" id="body" value="{{ $data->body }}">
    </div>
  </div>

  <div class="md:flex md:items-center">
    <div class="mb-3">
      <button class="btn btn-primary" type="submit">Kirim</button>
    </div>
  </div>
</form>
@endsection