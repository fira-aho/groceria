@extends('admin.layouts.master')

@section('title', 'Manajemen Transaksi')
@section('page_heading', 'Daftar Transaksi')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="m-0 text-secondary">Manajemen Transaksi</h5>
    <a href="{{ route('transaksi.print') }}" target="_blank" class="btn btn-success shadow-sm">
        <i class="bi bi-printer me-1"></i> Cetak Laporan Penjualan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Metode Pembayaran</th>
                        <th>Total Belanja</th>
                        <th>Aksi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td>#ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <strong>{{ $order->nama_lengkap }}</strong><br>
                            <small class="text-muted">{{ $order->no_telepon }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ strtoupper($order->metode_pembayaran) }}</span>
                        </td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $order->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'selesai' ? 'success' : ($order->status == 'pending' ? 'warning' : ($order->status == 'dibatalkan' ? 'danger' : 'primary')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada transaksi masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection