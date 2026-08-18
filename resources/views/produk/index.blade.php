@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<style>
    /* Header Card Gold Gradient */
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

    /* Aksen Warna Teks Gold */
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

    /* Smooth Entrance Animation */
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
                <span></span> Produk
            </h2>
            <p class="text-muted mb-0">Kelola seluruh data produk toko Anda.</p>
        </div>
        <div>
            <a href="{{ route('produk.create') }}" class="btn btn-gold px-4 py-2 rounded-3 fw-semibold shadow-sm">
                + Tambah Produk
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <div class="card shadow-sm border-0 rounded-3 mb-4 animate-hd delay-1">
        <div class="card-body p-3">
            <form action="{{ route('produk.index') }}" method="GET">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama produk...">
                    <button class="btn btn-gold fw-semibold px-4" type="submit">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Produk -->
    <div class="card shadow border-0 rounded-3 animate-hd delay-2">
        <div class="card-header card-header-gold">
            <h5 class="mb-0 fw-bold">Daftar Produk</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 5%;">No</th>
                            <th>User</th>
                            <th>Foto</th>
                            <th class="text-start">Nama Produk</th>
                            <th class="text-end">Harga Beli</th>
                            <th class="text-end">Harga Jual</th>
                            <th>Stok</th>
                            <th width="220">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td class="fw-medium text-dark">
                                👤 {{ $product->user->name ?? '-' }}
                            </td>

                            <td class="text-center">
                                @if($product->foto)
                                <img
                                    src="{{ asset('storage/' . $product->foto) }}"
                                    width="60"
                                    height="60"
                                    class="rounded-3 shadow-sm border"
                                    style="object-fit:cover;"
                                    alt="{{ $product->nama }}">
                                @else
                                <span class="badge bg-light text-muted border px-2 py-1">
                                    Tidak ada foto
                                </span>
                                @endif
                            </td>

                            <td class="fw-semibold text-dark">
                                {{ $product->nama }}
                            </td>

                            <td class="text-end text-muted">
                                Rp {{ number_format($product->harga_beli,0,',','.') }}
                            </td>

                            <td class="text-end text-gold fw-bold">
                                Rp {{ number_format($product->harga_jual,0,',','.') }}
                            </td>

                            <td class="text-center">
                                @if($product->stok > 20)
                                <span class="badge bg-success rounded-pill px-3 py-1 fw-bold">
                                    {{ $product->stok }}
                                </span>
                                @elseif($product->stok > 5)
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1 fw-bold">
                                    {{ $product->stok }}
                                </span>
                                @else
                                <span class="badge bg-danger rounded-pill px-3 py-1 fw-bold">
                                    {{ $product->stok }}
                                </span>
                                @endif
                            </td>

                            <td class="text-center text-nowrap">
                                <a href="{{ route('produk.show', $product) }}" class="btn btn-info btn-sm text-white fw-bold px-2 rounded-2">
                                    Detail
                                </a>

                                <a href="{{ route('produk.edit', $product) }}" class="btn btn-warning btn-sm text-white fw-bold px-2 rounded-2">
                                    Edit
                                </a>

                                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm fw-bold px-2 rounded-2" onclick="return confirm('Apakah yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Belum ada data produk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            {{ $products->links() }}
        </div>
    </div>

</div>

@endsection