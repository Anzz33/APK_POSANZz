@extends('layouts.app')

@section('title', 'Penjualan')

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

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4 animate-hd" role="alert">
        <div class="d-flex align-items-center">
            <span class="me-2">✅</span>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4 animate-hd" role="alert">
        <div class="d-flex align-items-center">
            <span class="me-2">⚠️</span>
            <div>{{ session('errors') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 animate-hd">
        <div>
            <h2 class="fw-bold text-gold mb-1 d-flex align-items-center gap-2">
                <span></span> Penjualan
            </h2>
            <p class="text-muted mb-0">Kelola seluruh transaksi penjualan toko Anda.</p>
        </div>
        <div>
            <a href="{{ route('penjualan.create') }}" class="btn btn-gold px-4 py-2 rounded-3 fw-semibold shadow-sm">
                + Buat Transaksi
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <div class="card shadow-sm border-0 rounded-3 mb-4 animate-hd delay-1">
        <div class="card-body p-3">
            <form action="{{ route('penjualan.index') }}" method="GET">
                <div class="input-group">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Cari nama kasir...">
                    <button class="btn btn-gold fw-semibold px-4" type="submit">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Penjualan -->
    <div class="card shadow border-0 rounded-3 animate-hd delay-2">
        <div class="card-header card-header-gold">
            <h5 class="mb-0 fw-bold">Daftar Penjualan</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 5%;">No</th>
                            <th class="text-start">Tanggal</th>
                            <th class="text-start">Kasir</th>
                            <th class="text-end">Total</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th width="240">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($sales as $sale)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $sales->firstItem() + $loop->index }}
                            </td>

                            <td class="text-start text-muted">
                                {{ $sale->created_at->translatedFormat('d M Y H:i') }}
                            </td>

                            <td class="text-start fw-medium text-dark">
                                👤 {{ $sale->user->name ?? '-' }}
                            </td>

                            <td class="text-end fw-bold text-gold">
                                Rp {{ number_format($sale->total_pembayaran,0,',','.') }}
                            </td>

                            <td class="text-center">
                                @if($sale->metode_pembayaran == 'CASH')
                                <span class="badge bg-success rounded-pill px-3 py-1">
                                    💵 CASH
                                </span>
                                @else
                                <span class="badge bg-info text-white rounded-pill px-3 py-1">
                                    💳 {{ $sale->metode_pembayaran }}
                                </span>
                                @endif
                            </td>

                            <td class="text-center">
                                @if($sale->status == 'COMPLETED')
                                <span class="badge bg-success rounded-pill px-3 py-1">
                                    ✓ COMPLETED
                                </span>
                                @else
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1">
                                    ⏳ OPEN
                                </span>
                                @endif
                            </td>

                            <td class="text-center text-nowrap">
                                <a href="{{ route('penjualan.show', $sale) }}" class="btn btn-info btn-sm text-white fw-bold px-2 rounded-2">
                                    Detail
                                </a>

                                @can('view', $sale)
                                <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-warning btn-sm text-white fw-bold px-2 rounded-2">
                                    Edit
                                </a>
                                @endcan

                                @can('delete', $sale)
                                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm fw-bold px-2 rounded-2" onclick="return confirm('Apakah yakin ingin menghapus transaksi ini?')">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Belum ada data penjualan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            {{ $sales->links() }}
        </div>
    </div>

</div>

@endsection