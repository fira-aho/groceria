@extends('admin.layouts.master')

@section('title', 'Manajemen Pengguna')
@section('page_heading', 'Daftar Pengguna')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Bergabung</th>
                        <th>Hak Akses (Role)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>
                            <strong>{{ $user->name }}</strong>
                            @if(auth()->id() == $user->id)
                                <span class="badge bg-success ms-1">Anda</span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <form action="{{ route('pengguna.update_role', $user->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="role" class="form-select form-select-sm me-2" style="width: 120px;" onchange="this.form.submit()" {{ auth()->id() == $user->id ? 'disabled' : '' }}>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" {{ auth()->id() == $user->id ? 'disabled' : '' }}>
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">Belum ada pengguna terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection