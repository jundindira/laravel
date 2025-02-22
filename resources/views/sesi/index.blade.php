@extends('layout/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form action="/sesi/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="password">
                    <div class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                        <i id="toggleIcon" class="bi bi-eye"></i>
                    </div>
                </div>
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                <p>Belum punya akun? <a href="register">Mau daftar</a> </p>
            </div>
        </form>
    </div>
@endsection