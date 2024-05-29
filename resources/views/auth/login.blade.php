@extends('layout/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Email/Username</label>
                <input type="text" name="login" class="form-control" placeholder="Email or Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                        <i id="toggleIcon" class="bi bi-eye"></i>
                    </div>
                </div>
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                <p>Belum punya akun? <a href="/register">Daftar</a></p>
            </div>
        </form>
        @error('login')
            <span>{{ $message }}</span>
        @enderror
    </div>
@endsection