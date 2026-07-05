@extends('admin.layouts.master')

@section('title', 'Tambah Produk Baru')
@section('page_heading', 'Tambah Produk Baru')

@section('content')
<div class="card border-0 shadow-sm mb-5">
    <div class="card-body p-4">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Apel Fuji Segar" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" placeholder="Contoh: 15000" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Stok (Pcs)</label>
                    <input type="number" name="stock" class="form-control" placeholder="Contoh: 50" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Unggah Gambar</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection