@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')
@section('page_heading', 'Ringkasan Toko')

@section('content')
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm bg-primary text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-wallet2 display-4"></i>
                </div>
                <div>
                    <h6 class="mb-0">Total Pendapatan</h6>
                    <h3 class="mb-0 fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-cart-check display-4"></i>
                </div>
                <div>
                    <h6 class="mb-0">Total Pesanan</h6>
                    <h3 class="mb-0 fw-bold">{{ $totalPesanan }} Transaksi</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm bg-info text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-people display-4"></i>
                </div>
                <div>
                    <h6 class="mb-0">Total Pelanggan</h6>
                    <h3 class="mb-0 fw-bold">{{ $totalPelanggan }} Orang</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 pt-4 pb-0">
                <h6 class="fw-bold text-danger"><i class="bi bi-exclamation-triangle me-2"></i> Peringatan Stok Menipis</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Sisa Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stokMenipis as $produk)
                            <tr>
                                <td>{{ $produk->name }}</td>
                                <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-danger fs-6">{{ $produk->stock }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-outline-primary">
                                        Restock
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Semua stok produk dalam keadaan aman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection