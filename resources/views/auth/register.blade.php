@extends('layout/aplikasi')

@section('konten')
    <div class="div w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password Confirmation</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                <p>Sudah punya akun? <a href="/login">Login</a></p>
            </div>
        </form>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        @error('username')
            <span>{{ $message }}</span>
        @enderror
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>
@endsection