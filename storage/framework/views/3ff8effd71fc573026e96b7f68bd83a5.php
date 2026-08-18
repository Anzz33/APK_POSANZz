<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-receipt"></i> Detail Penjualan
        </h2>

        <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Informasi Transaksi</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Tanggal Transaksi</label>
                    <h6><?php echo e($penjualan->created_at->translatedFormat('d F Y, H:i')); ?></h6>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Kasir</label>
                    <h6><?php echo e($penjualan->user->name); ?></h6>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Metode Pembayaran</label>
                    <h6>
                        <?php if($penjualan->metode_pembayaran == 'CASH'): ?>
                        <span class="badge bg-success">CASH</span>
                        <?php else: ?>
                        <span class="badge bg-info">
                            <?php echo e($penjualan->metode_pembayaran); ?>

                        </span>
                        <?php endif; ?>
                    </h6>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="text-muted">Status</label>

                    <?php if($penjualan->status == 'COMPLETED'): ?>
                    <h6><span class="badge bg-success">COMPLETED</span></h6>
                    <?php elseif($penjualan->status == 'OPEN'): ?>
                    <h6><span class="badge bg-warning text-dark">OPEN</span></h6>
                    <?php else: ?>
                    <h6><span class="badge bg-secondary"><?php echo e($penjualan->status); ?></span></h6>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h5 class="mb-0">Daftar Produk</h5>

            <h5 class="mb-0">
                Total :
                <span class="badge bg-success fs-6">
                    Rp <?php echo e(number_format($penjualan->total_pembayaran,0,',','.')); ?>

                </span>
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th class="text-start">Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td class="text-center">
                                <?php echo e($index + 1); ?>

                            </td>

                            <td class="fw-semibold">
                                <?php echo e($item->produk->nama); ?>

                            </td>

                            <td class="text-end">
                                Rp <?php echo e(number_format($item->produk->harga,0,',','.')); ?>

                            </td>

                            <td class="text-center">
                                <?php echo e($item->jumlah); ?>

                            </td>

                            <td class="text-end fw-bold">
                                Rp <?php echo e(number_format($item->subtotal,0,',','.')); ?>

                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada produk pada transaksi ini.
                            </td>
                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS\resources\views/penjualan/show.blade.php ENDPATH**/ ?>