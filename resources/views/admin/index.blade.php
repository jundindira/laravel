@extends('layout/aplikasi')

@section('konten')
    <a href="/admin/create" class="btn btn-primary">++ Tambah Admin</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @if ($item->foto)
                            <img style="max-width: 50px; max-height: 50px" src="{{ url('foto').'/'.$item->foto }}" alt="">
                        @endif
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->password }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ url('/admin/'.$item->id) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/admin/'.$item->id.'/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Hapus admin {{ $item->nama }}?')" class="d-inline" action="{{ '/admin/'.$item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection