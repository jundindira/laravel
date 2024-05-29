@extends('layout/aplikasi')

@section('content')
    <h1>{{ $judul }}</h1>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Tenetur dignissimos architecto molestias delectus animi pariatur at optio neque accusamus unde?
    </p>
    <p>
        <ul>
            <li>No Telp: {{ $kontak['no_telp'] }}</li>
            <li>Email: {{ $kontak['email'] }}</li>
        </ul>
    </p>
@endsection
