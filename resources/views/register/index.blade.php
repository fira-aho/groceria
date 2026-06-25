<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}">
</head>
<body>

    @if ($errors->any())
        <script>
            alert("{{ $errors->first() }}");
        </script>
    @endif

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
            window.location.href = "{{ url('/login') }}";
        </script>
    @endif

    <main class="register-container">
        <section class="register-left">
            <img src="{{ asset('assets/img/register-banner.jpg') }}" alt="Register">
        </section>

        <section class="register-right">
            <h1>Buat Akun Baru</h1>
            <p>Daftar sekarang dan mulai belanja sehat bersama Groceria.</p>

            <form action="{{ route('register.store') }}" method="POST">
                
                @csrf

                <label>Nama Lengkap</label>
                <input type="text" name="name" placeholder="Masukkan nama lengkap" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <label>Konfirmasi Password</label>
                <input type="password" name="confirm_password" placeholder="Konfirmasi password" required>

                <button type="submit">Register</button>
            </form>

            <div class="login-link">
                Sudah punya akun?
                <a href="{{ url('/login') }}">Login sekarang</a>
            </div>
        </section>
    </main>

</body>
</html>