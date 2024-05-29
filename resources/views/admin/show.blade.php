@extends('layout/aplikasi')

@section('konten')
    <div>
        <a href="/admin" class="btn btn-secondary"><< Kembali</a>
        <h1>{{ $data->nama }}</h1>
        <p>
            <b>id</b> {{ $data->id }}
        </p>
        <p>
            <b>email</b> {{ $data->email }}
        </p>
    </div>
@endsection