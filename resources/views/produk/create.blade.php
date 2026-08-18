@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1" style="color: #b8860b !important;">
            Tambah Produk
        </h2>

        <p class="text-muted mb-0">
            Tambahkan data produk baru ke dalam sistem POS.
        </p>

    </div>

    <!-- Form -->
    <form action="{{ route('produk.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @include('produk._form')

    </form>

</div>

@endsection