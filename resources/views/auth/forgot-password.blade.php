<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}">
</head>
<body>

    {{-- Menampilkan pesan sukses setelah email dikirim --}}
    @if (session('status'))
        <script>
            alert("{{ session('status') }}");
        </script>
    @endif

    <main class="register-container">
        <section class="register-left">
            <img src="{{ asset('assets/img/login-banner.jpg') }}" alt="Forgot Password Banner">
        </section>

        <section class="register-right">
            <h1>Lupa Password Anda?</h1>
            <p>Tidak masalah. Cukup beritahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan untuk mengatur ulang kata sandi Anda.</p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email Anda" required value="{{ old('email') }}" autofocus>
                @error('email')
                    <span style="color: red; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror

                <button type="submit">Kirim Link Reset Password</button>
            </form>

            <div class="login-link">
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </section>
    </main>

</body>
</html>