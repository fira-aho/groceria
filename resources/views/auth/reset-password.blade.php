<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/register.css') }}">
</head>
<body>

    <main class="register-container">
        <section class="register-left">
            <img src="{{ asset('assets/img/login-banner.jpg') }}" alt="Reset Password Banner">
        </section>

        <section class="register-right">
            <h1>Atur Ulang Password</h1>
            <p>Silakan masukkan password baru Anda di bawah ini.</p>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                {{-- Input tersembunyi untuk token dan email --}}
                <input type="hidden" name="token" value="{{ $token }}">

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email Anda" required value="{{ $email ?? old('email') }}">
                @error('email')
                    <span style="color: red; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror

                <label>Password Baru</label>
                <input type="password" name="password" placeholder="Masukkan password baru" required>
                @error('password')
                    <span style="color: red; font-size: 12px; display: block; margin-top: 5px;">{{ $message }}</span>
                @enderror

                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" required>

                <button type="submit">Reset Password</button>
            </form>

            <div class="login-link">
                <a href="{{ route('login') }}">Kembali ke Login</a>
            </div>
        </section>
    </main>

</body>
</html>