<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}"> </head>
<body>

    @if ($errors->has('login_error'))
        <script>
            alert("{{ $errors->first('login_error') }}");
        </script>
    @endif

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <main class="register-container">
        <section class="register-left">
            <img src="{{ asset('assets/img/login-banner.jpg') }}" alt="Login Banner">
        </section>

        <section class="register-right">
            <h1>Selamat Datang Kembali</h1>
            <p>Silakan masuk menggunakan akun Groceria Anda.</p>

            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email Anda" required value="{{ old('email') }}">

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password Anda" required>

                <button type="submit">Login</button>
            </form>

            <div class="login-link">
                Belum punya akun?
                <a href="{{ url('/register') }}">Daftar sekarang</a>
            </div>
        </section>
    </main>

</body>
</html>