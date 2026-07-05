@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('page_heading', 'Overview')

@section('content')
<div class="row">
    <!-- Kartu Statistik 1 -->
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="bg-primary text-white p-3 rounded me-3">
                    <i class="bi bi-box-seam fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Total Produk</h6>
                    <h3 class="fw-bold mb-0">24</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Statistik 2 -->
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="bg-success text-white p-3 rounded me-3">
                    <i class="bi bi-cart-check fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Pesanan Baru</h6>
                    <h3 class="fw-bold mb-0">5</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Statistik 3 -->
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="bg-warning text-dark p-3 rounded me-3">
                    <i class="bi bi-people fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Total Pelanggan</h6>
                    <h3 class="fw-bold mb-0">12</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection