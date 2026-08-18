<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

    /* Tombol Aksi Keemasan */
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

    /* Teks dan Aksen Gold */
    .text-gold {
        color: #b8860b !important;
    }

    .bg-gold-subtle {
        background-color: #fffdf0 !important;
    }

    /* Animasi Entrance */
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

    .delay-3 {
        animation-delay: 0.24s;
        opacity: 0;
    }

    .delay-4 {
        animation-delay: 0.32s;
        opacity: 0;
    }

    /* Card Hover Effect */
    .dashboard-stat-card {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border: 1px solid #f3e5ab !important;
    }

    .dashboard-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.15) !important;
    }

    /* Table Formatting */
    .table-penjualan-style thead th {
        background-color: #fdfbf2 !important;
        color: #4a3b00;
        font-weight: 700;
        font-size: 0.85rem;
        border-bottom: 2px solid #eedc9a;
        padding: 0.85rem 1rem;
    }

    .table-penjualan-style tbody tr:hover {
        background-color: #fffdf5 !important;
    }

    .table-penjualan-style td {
        padding: 0.85rem 1rem;
        vertical-align: middle;
    }
</style>

<div class="container py-4">

    <!-- Header Section Tema Keemasan -->
    <div class="d-flex justify-content-between align-items-center mb-3 animate-hd">
        <div>
            <h2 class="text-gold fw-bold mb-1 d-flex align-items-center gap-2">
                <span></span> Dashboard
            </h2>
            <p class="text-muted mb-0">Kelola dan pantau seluruh aktivitas ringkasan toko Anda.</p>
        </div>
        <div>
            <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-gold px-4 py-2 rounded-3 fw-semibold shadow-sm">
                + Buat Transaksi
            </a>
        </div>
    </div>

    <!-- Widget Informasi Tanggal, Bulan, Tahun & Waktu (Tepat Di Bawah Dashboard) -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 animate-hd delay-1 bg-gold-subtle" style="border: 1px solid #f3e5ab !important;">
        <div class="card-body p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle p-2 bg-white text-gold fs-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; border: 1px solid #f3e5ab;">
                    📅
                </div>
                <div>
                    <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">HARI, TANGGAL & TAHUN</span>
                    <h6 class="fw-bold text-dark mb-0 mt-1">
                        <?php echo e(\Carbon\Carbon::now()->translatedFormat('l, d F Y')); ?>

                    </h6>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle p-2 bg-white text-gold fs-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; border: 1px solid #f3e5ab;">
                    ⏰
                </div>
                <div>
                    <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">WAKTU SEKARANG</span>
                    <h6 class="fw-bold text-dark mb-0 mt-1" id="liveClock">
                        --:--:--
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Kartu Statistik -->
    <div class="row g-3 mb-4">

        <!-- Total Penjualan -->
        <div class="col-12 col-sm-6 col-xl-3 animate-hd delay-1">
            <div class="card dashboard-stat-card shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">TOTAL PENJUALAN</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp <?php echo e(number_format($ringkasan['total_penjualan'],0,',','.')); ?></h4>
                    </div>
                    <div class="rounded-3 p-2 bg-gold-subtle text-gold fs-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #f3e5ab;">
                        💰
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="col-12 col-sm-6 col-xl-3 animate-hd delay-2">
            <div class="card dashboard-stat-card shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">TOTAL TRANSAKSI</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1"><?php echo e($ringkasan['total_transaksi']); ?></h4>
                    </div>
                    <div class="rounded-3 p-2 bg-gold-subtle text-dark fs-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #f3e5ab;">
                        🛒
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran Cash -->
        <div class="col-12 col-sm-6 col-xl-3 animate-hd delay-3">
            <div class="card dashboard-stat-card shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">PEMBAYARAN CASH</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp <?php echo e(number_format($ringkasan['total_cash'],0,',','.')); ?></h4>
                    </div>
                    <div class="rounded-3 p-2 bg-gold-subtle text-gold fs-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #f3e5ab;">
                        💵
                    </div>
                </div>
            </div>
        </div>

        <!-- Non Tunai -->
        <div class="col-12 col-sm-6 col-xl-3 animate-hd delay-4">
            <div class="card dashboard-stat-card shadow-sm rounded-3 h-100">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted fw-bold small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">NON TUNAI</span>
                        <h4 class="fw-bold text-dark mb-0 mt-1">Rp <?php echo e(number_format($ringkasan['total_non_tunai'],0,',','.')); ?></h4>
                    </div>
                    <div class="rounded-3 p-2 bg-gold-subtle text-gold fs-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border: 1px solid #f3e5ab;">
                        💳
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Section Tabel Stok -->
    <div class="row g-4 mb-4">

        <!-- Produk Stok Rendah -->
        <div class="col-lg-6 animate-hd delay-3">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header card-header-gold">
                    Produk Stok Rendah
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-penjualan-style align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">NO</th>
                                    <th>PRODUK</th>
                                    <th class="text-end">STOK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted"><?php echo e($produkStokRendah->firstItem()+$index); ?></td>
                                    <td class="fw-medium text-dark"><?php echo e($produk->nama); ?></td>
                                    <td class="text-end fw-bold text-dark">
                                        <?php echo e($produk->stok); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Semua stok aman.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>
            </div>
        </div>

        <!-- Produk Habis -->
        <div class="col-lg-6 animate-hd delay-4">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header card-header-gold">
                    Produk Habis
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-penjualan-style align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">NO</th>
                                    <th>PRODUK</th>
                                    <th class="text-end">STOK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-muted"><?php echo e($produkStokHabis->firstItem()+$index); ?></td>
                                    <td class="fw-medium text-dark"><?php echo e($produk->nama); ?></td>
                                    <td class="text-end">
                                        <span class="badge bg-danger rounded-pill px-3 py-1 fw-bold">
                                            <?php echo e($produk->stok); ?>

                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        Tidak ada produk habis.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>
            </div>
        </div>

    </div>

    <!-- Best Seller Table -->
    <div class="card border-0 shadow-sm rounded-3 animate-hd delay-4">
        <div class="card-header card-header-gold">
            Best Seller Products
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-penjualan-style align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">NO</th>
                            <th>PRODUK</th>
                            <th>STOK</th>
                            <th class="text-end">TERJUAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-muted"><?php echo e($index+1); ?></td>
                            <td class="fw-medium text-dark"><?php echo e($produk->nama); ?></td>
                            <td class="text-muted"><?php echo e($produk->stok); ?></td>
                            <!-- Diubah menjadi teks biasa tanpa badge hijau -->
                            <td class="text-end fw-bold text-dark">
                                <?php echo e($produk->total_terjual); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data penjualan.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Script Jam Real-Time -->
<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('liveClock').innerText = `${hours}:${minutes}:${seconds} WIB`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS\resources\views/dashboard.blade.php ENDPATH**/ ?>