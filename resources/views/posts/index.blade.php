@extends('layout/aplikasi')

@section('konten')
    <a href="/posts/create" class="btn btn-primary">++ Tambah Berita</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Isi Berita</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ route('posts.show', $post->id) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/post/'.$post->id.'/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Hapus berita {{ $post->title }}?')" action="{{ '/post/'.$post->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $post->links() }} --}}
@endsection