@extends('admin.layouts.master')

@section('title', 'Edit Produk')
@section('page_heading', 'Edit Produk')

@section('content')
<div class="card border-0 shadow-sm mb-5">
    <div class="card-body p-4">
        <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Stok (Pcs)</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Unggah Gambar Baru (Opsional)</label>
                    <!-- Perhatikan tidak ada atribut 'required' di sini -->
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted mt-1 d-block">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    
                    <div class="mt-3">
                        <p class="mb-1 text-muted" style="font-size: 14px;">Gambar saat ini:</p>
                        <img src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}" width="80" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Perbarui Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection