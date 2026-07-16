<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan - Groceria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background-color: white; }
        .print-header { border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container mt-5">
        
        <div class="mb-4 no-print">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">&larr; Kembali</a>
            <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak Ulang</button>
        </div>

        <div class="print-header text-center">
            <h2 class="fw-bold mb-0">GROCERIA</h2>
            <p class="mb-0">Laporan Penjualan Transaksi Sukses</p>
            <small>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y, H:i') }}</small>
        </div>

        <table class="table table-bordered align-middle mt-4">
            <thead class="table-light text-center">
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Belanja</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $index => $order)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">#ORD-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    <td>{{ $order->nama_lengkap }}</td>
                    <td class="text-center">{{ strtoupper($order->metode_pembayaran) }}</td>
                    <td class="text-end">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada transaksi dengan status selesai.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="text-end fs-5">Total Pendapatan Akhir:</th>
                    <th class="text-end fs-5 text-success">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>