<?php echo csrf_field(); ?>

<div class="card shadow-lg border-0 rounded-4">

    <div class="card-header bg-primary text-white rounded-top-4 py-3">
        <h4 class="mb-0 fw-bold">
            📦 Form Produk
        </h4>
    </div>

    <div class="card-body p-4">

        <div class="row">

            <!-- Foto -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <h6 class="fw-bold mb-3">
                            Foto Produk
                        </h6>

                        <?php if(!empty($produk->foto)): ?>

                        <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
                            class="img-fluid rounded shadow mb-3"
                            style="max-height:220px;">

                        <?php endif; ?>

                        <img
                            id="preview"
                            class="img-fluid rounded shadow mb-3"
                            style="display:none;max-height:220px;">

                        <input
                            type="file"
                            name="foto"
                            onchange="previewImage(this)"
                            class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                </div>

            </div>

            <!-- Form -->
            <div class="col-lg-8">

                <div class="row">

                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('name', $produk->nama ?? '')); ?>"
                            placeholder="Masukkan nama produk">

                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Harga Beli
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="purchase_price"
                                class="form-control <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('purchase_price', $produk->harga_beli ?? '')); ?>">

                        </div>

                        <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Harga Jual
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="selling_price"
                                class="form-control <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('selling_price', $produk->harga_jual ?? '')); ?>">

                        </div>

                        <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
                            Jumlah Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control <?php $__errorArgs = ['stok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('stok', $produk->stok ?? '')); ?>"
                            placeholder="Masukkan jumlah stok">

                        <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer bg-light d-flex justify-content-end gap-2 py-3">

        <a href="<?php echo e(route('produk.index')); ?>"
            class="btn btn-outline-secondary">

            ← Kembali

        </a>

        <button type="submit"
            class="btn btn-success">

            💾 Simpan Produk

        </button>

    </div>

</div>

<script>
    function previewImage(input) {

        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';

        }

    }
</script><?php /**PATH C:\laragon\www\APK_POS\resources\views/Produk/_form.blade.php ENDPATH**/ ?>