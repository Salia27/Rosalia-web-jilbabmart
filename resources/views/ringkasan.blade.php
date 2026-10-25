@extends('layouts.app')

@section('content')
@php
    // Ongkir flat COD
    $ongkir = 10000; 
    $totalAkhir = $totalHarga + $ongkir;
@endphp

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <h4 class="fw-bold mb-4" style="color: #082052;">
                <i class="fa-solid fa-receipt me-2"></i> Ringkasan Pesanan & Pembayaran
            </h4>

            <div class="table-responsive mb-4">
                <table class="table align-middle">
                    <tbody class="border-top-0">
                        <tr>
                            <td class="fw-semibold text-muted" style="width: 40%;">Nama Produk</td>
                            <td class="fw-bold" style="color: #082052;">{{ $product->nama_produk }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Variasi Warna</td>
                            <td><span class="badge bg-secondary px-3 py-1.5 rounded-pill">🎨 {{ $warna }}</span></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Harga Satuan</td>
                            <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Jumlah (Qty)</td>
                            <td>{{ $jumlah }} pcs</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Subtotal Produk</td>
                            <td>Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Ongkos Kirim (Flat COD)</td>
                            <td>Rp {{ number_format($ongkir, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold text-muted">Metode Pembayaran</td>
                            <td><span class="badge bg-success px-3 py-1.5 rounded-pill">💵 COD (Bayar di Tempat)</span></td>
                        </tr>
                        <tr class="table-light fs-5">
                            <td class="fw-bold" style="color: #082052;">Total Pembayaran</td>
                            <td class="fw-extrabold" style="color: #082052;">Rp {{ number_format($totalAkhir, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-success rounded-3 mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> Pesanan COD berhasil dibuat! Siapkan uang pas sebesar <strong>Rp {{ number_format($totalAkhir, 0, ',', '.') }}</strong> saat kurir mengantar paket.
            </div>

            <a href="{{ route('home') }}" class="btn btn-navy-solid w-100 py-2.5 rounded-pill fw-bold text-center text-decoration-none">
                Kembali ke Katalog Produk
            </a>
        </div>
    </div>
</div>
@endsection