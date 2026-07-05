<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Groceria</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #212529; color: white; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 10px 15px; display: block; border-radius: 5px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #0d6efd; color: white; }
        .topbar { background-color: white; box-shadow: 0 2px 4px rgba(0,0,0,.08); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-3">
            <h4 class="text-center fw-bold mt-2 mb-4">Groceria Admin</h4>
            <a href="/admin/dashboard" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="#"><i class="bi bi-box-seam me-2"></i> Produk</a>
            <a href="#"><i class="bi bi-cart-check me-2"></i> Transaksi</a>
            
            <hr class="text-secondary">
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100"><i class="bi bi-box-arrow-left me-2"></i> Logout</button>
            </form>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="col-md-10 p-0">
            <!-- TOPBAR -->
            <div class="topbar p-3 d-flex justify-content-between align-items-center mb-4">
                <h5 class="m-0 text-secondary">@yield('page_heading', 'Dashboard')</h5>
                <div>
                    <span class="me-3">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                </div>
            </div>

            <!-- DYNAMIC CONTENT -->
            <div class="px-4">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>