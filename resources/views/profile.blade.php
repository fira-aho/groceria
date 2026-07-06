<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile - Groceria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
        }

        .profile-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .avatar-placeholder {
            font-size: 70px;
        }

        h2 {
            margin: 10px 0 5px;
        }

        h3 {
            color: #016B61;
            border-bottom: 2px solid #016B61;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: gray;
            font-size: 13px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #016B61;
            color: white;
            width: 100%;
            margin-top: 10px;
        }

        .btn-logout {
            background: #e74c3c;
            color: white;
            width: 100%;
            margin-top: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- Alert error --}}
    @if($errors->any())
        <div class="alert-error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- SECTION: Info Profile --}}
    <div class="profile-box">
        <div class="profile-header">
            {{-- Foto profil --}}
            @if($user->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="avatar">
            @else
                <div class="avatar-placeholder">👤</div>
            @endif

            <h2>{{ $user->name }}</h2>
            <p style="color:gray">{{ $user->email }}</p>
            <p style="color:#016B61; font-size:13px">
                Bergabung sejak {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
            </p>
        </div>

        {{-- FORM: Edit Profile --}}
        <h3>Edit Profile</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="address">{{ $user->address }}</textarea>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="birth_date" value="{{ $user->birth_date }}">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="gender">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Foto Profil</label>
                <input type="file" name="avatar" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    {{-- SECTION: Ganti Password --}}
    <div class="profile-box">
        <h3>Ganti Password</h3>
        <form action="{{ route('profile.update_password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="current_password">
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="new_password">
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Ganti Password</button>
        </form>
    </div>

    {{-- Tombol Logout --}}
    <div class="profile-box">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>

</div>

</body>
</html>