@extends('layout/aplikasi')

@section('konten')
    <a href="/admin" class="btn btn-secondary"><< Batal</a>
    <form method="POST" action="/admin" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ Session::get('nama') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ Session::get('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" value="{{ Session::get('password') }}">
                <div class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                    <i id="toggleIcon" class="bi bi-eye"></i>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection