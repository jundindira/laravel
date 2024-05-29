@extends('layout/aplikasi')

@section('konten')
<a href="{{ route('posts.index') }}" class="btn btn-secondary"><< Batal</a>
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" required>
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="mb-3">
      <text for="body" class="form-label">Isi Berita</label>
      <textarea name="body" id="body" placeholder="Body" required></textarea>
    </div>
  </div>

  <div class="md:flex md:items-center">
    <div class="mb-3">
      <button class="btn btn-primary" type="submit">Create</button>
    </div>
  </div>
</form>
@endsection