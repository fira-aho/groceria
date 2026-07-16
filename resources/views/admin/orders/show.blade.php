@extends('admin.layouts.master')

@section('title', 'Detail Transaksi')
@section('page_heading', 'Detail Pesanan #ORD-' . str_pad($order->id, 5, '0', STR_PAD_LEFT))

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h6 class="fw-bold text-secondary mb-3">Informasi Pelanggan</h6>
                <p class="mb-1"><strong>Nama:</strong> {{ $order->nama_lengkap }}</p>
                <p class="mb-1"><strong>No. Telp:</strong> {{ $order->no_telepon }}</p>
                <p class="mb-1"><strong>Alamat:</strong> {{ $order->alamat }}</p>
                <p class="mb-0"><strong>Metode Pembayaran:</strong> <span class="badge bg-info">{{ strtoupper($order->metode_pembayaran) }}</span></p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold text-secondary mb-3">Update Status Pesanan</h6>
                <form action="{{ route('transaksi.update_status', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ $order->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold text-secondary mb-3">Item Pesanan</h6>
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Produk</th>
                                <th>Harga Satuan</th>
                                <th>Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Produk Dihapus' }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="text-end">Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total Belanja:</th>
                                <th class="text-end text-success fs-5">Rp {{ number_format($order->total_price, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection