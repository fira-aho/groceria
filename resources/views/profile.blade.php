<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <style>
        body{
            font-family: Arial;
            background: #f5f5f5;
        }

        .profile-box{
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
        }

        .profile-icon{
            font-size: 70px;
        }

        h2{
            margin-top: 10px;
        }

        p{
            color: gray;
        }

        .logout-btn{
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #016B61;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>

</head>
<body>

    <div class="profile-box">

        <div class="profile-icon">
            👤
        </div>

        {{-- Tampilkan nama user yang sedang login --}}
        <h2>{{ $user->name }}</h2>

        {{-- Tampilkan email user yang sedang login --}}
        <p>{{ $user->email }}</p>

        {{-- Tombol logout --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>

    </div>

</body>
</html>