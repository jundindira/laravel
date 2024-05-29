@extends('layout/aplikasi')

@section('konten')
    <a href="/admin" class="btn btn-secondary"><< Kembali</a>
    <form method="POST" action="{{ '/admin/'.$data->id }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <h1>Nama: {{ $data->nama }}</h1>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ $data->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" value="{{ $data->password }}">
                <div class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                    <i id="toggleIcon" class="bi bi-eye"></i>
                </div>
            </div>
        </div>
        @if ($data->foto)
            <div class="mb-3">
                <img style="max-width: 50px; max-height: 50px" src="{{ url('foto').'/'.$data->foto }}" alt="">
            </div>
        @endif
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection