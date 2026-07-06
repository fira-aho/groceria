@extends('admin.layouts.master')

@section('title', 'Manajemen Produk')
@section('page_heading', 'Daftar Produk')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 fw-bold">Data Produk Groceria</h6>
        
        <div class="d-flex gap-2">
            <!-- Form Pencarian -->
            <form action="{{ route('produk.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari nama produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary btn-sm" title="Cari">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm text-nowrap">
                <i class="bi bi-plus-circle me-1"></i> Tambah Produk
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th width="15%">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('assets/img/' . $item->image) }}" alt="{{ $item->name }}" width="50" class="img-thumbnail">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stock }} Pcs</td>
                        <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection