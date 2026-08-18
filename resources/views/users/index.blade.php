@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
    /* Styling Header Gold Gradient */
    .card-header-gold {
        background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%) !important;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 1.05rem;
        border-top-left-radius: 0.375rem !important;
        border-top-right-radius: 0.375rem !important;
        padding: 0.85rem 1.25rem;
    }

    /* Tombol Utama Gold */
    .btn-gold {
        background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%) !important;
        color: #ffffff !important;
        border: none !important;
        transition: all 0.3s ease;
    }

    .btn-gold:hover {
        background: linear-gradient(135deg, #b8860b 0%, #996515 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(184, 134, 11, 0.3) !important;
    }

    /* Teks Warna Gold */
    .text-gold {
        color: #b8860b !important;
    }

    /* Table Formatting */
    .table-custom thead th {
        background-color: #fdfbf2 !important;
        color: #4a3b00;
        font-weight: 700;
        font-size: 0.85rem;
        border-bottom: 2px solid #eedc9a;
        padding: 0.85rem 1rem;
    }

    .table-custom tbody tr:hover {
        background-color: #fffdf5 !important;
    }

    .table-custom td {
        padding: 0.85rem 1rem;
        vertical-align: middle;
    }

    /* Animation Entrance */
    @keyframes fadeInUpHD {
        from {
            opacity: 0;
            transform: translateY(14px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-hd {
        animation: fadeInUpHD 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .delay-1 {
        animation-delay: 0.08s;
        opacity: 0;
    }

    .delay-2 {
        animation-delay: 0.16s;
        opacity: 0;
    }
</style>

<div class="container py-4">

    <!-- Header Section Tema Keemasan -->
    <div class="d-flex justify-content-between align-items-center mb-4 animate-hd">

        <div>
            <h2 class="fw-bold text-gold mb-1 d-flex align-items-center gap-2">
                <span></span> User
            </h2>
            <p class="text-muted mb-0">
                Kelola data pengguna aplikasi POS.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}" class="btn btn-gold px-4 py-2 rounded-3 fw-semibold shadow-sm">
            + Tambah User
        </a>

    </div>

    <!-- Form Pencarian -->
    <div class="card shadow-sm border-0 rounded-3 mb-4 animate-hd delay-1">

        <div class="card-body p-3">

            <form action="{{ route('admin.users') }}" method="GET">

                <div class="input-group">

                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama atau email...">

                    <button class="btn btn-gold fw-semibold px-4" type="submit">
                        Cari
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Tabel Daftar User -->
    <div class="card shadow border-0 rounded-3 animate-hd delay-2">

        <div class="card-header card-header-gold">

            <h5 class="mb-0 fw-bold">
                Daftar User
            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-custom align-middle mb-0">

                    <thead>

                        <tr class="text-center">

                            <th style="width: 8%;">No</th>
                            <th class="text-start">Nama</th>
                            <th class="text-start">Email</th>
                            <th>Role</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td class="text-center text-muted">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="fw-semibold text-dark">
                                👤 {{ $user->name }}
                            </td>

                            <td class="text-muted">
                                {{ $user->email }}
                            </td>

                            <td class="text-center">

                                @if(is_object($user->role) ? strtolower($user->role->name) == 'admin' : strtolower($user->role) == 'admin')

                                <span class="badge bg-danger px-3 py-1 rounded-pill fw-bold">
                                    Admin
                                </span>

                                @else

                                <span class="badge bg-success px-3 py-1 rounded-pill fw-bold">
                                    Kasir
                                </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm text-white fw-bold px-3 rounded-2">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm fw-bold px-3 rounded-2" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        🗑 Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center py-4 text-muted">
                                Belum ada data user.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white border-0 py-3">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection