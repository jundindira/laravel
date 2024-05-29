<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{ 'css/app.css' }}">
    <title>Halaman</title>
    
</head>
<body>
    <div>
        <div class="container py-5">
            @if (Auth::check())
                @include('komponen/menu')
            @endif
            @include('komponen/pesan')
            @yield('konten')
        </div>
    </div>
</body>
{{-- <script>
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('input', function() {
        const emailValue = emailInput.value;
        if (emailValue.includes('@') && !emailValue.includes('@gmail.com')) {
            emailInput.value = emailValue + 'gmail.com';
        }
    });
</script> --}}
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    }
</script>
</html>