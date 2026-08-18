@csrf

<div class="card shadow-lg border-0 rounded-4">

    <div class="card-header text-white rounded-top-4 py-3" style="background: linear-gradient(135deg, #d4af37 0%, #b8860b 100%) !important;">
        <h4 class="mb-0 fw-bold">
            Form Produk
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

                        @if (!empty($produk->foto))

                        <img src="{{ asset('storage/' . $produk->foto) }}"
                            class="img-fluid rounded shadow mb-3"
                            style="max-height:220px;">

                        @endif

                        <img
                            id="preview"
                            class="img-fluid rounded shadow mb-3"
                            style="display:none;max-height:220px;">

                        <input
                            type="file"
                            name="foto"
                            onchange="previewImage(this)"
                            class="form-control @error('foto') is-invalid @enderror">

                        @error('foto')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

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
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $produk->nama ?? '') }}"
                            placeholder="Masukkan nama produk">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

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
                                class="form-control @error('purchase_price') is-invalid @enderror"
                                value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">

                        </div>

                        @error('purchase_price')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

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
                                class="form-control @error('selling_price') is-invalid @enderror"
                                value="{{ old('selling_price', $produk->harga_jual ?? '') }}">

                        </div>

                        @error('selling_price')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
                            Jumlah Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control @error('stok') is-invalid @enderror"
                            value="{{ old('stok', $produk->stok ?? '') }}"
                            placeholder="Masukkan jumlah stok">

                        @error('stok')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card-footer bg-light d-flex justify-content-end gap-2 py-3">

        <a href="{{ route('produk.index') }}"
            class="btn btn-outline-secondary">

            ← Kembali

        </a>

        <button type="submit"
            class="btn btn-success">

            Simpan Produk

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
</script>