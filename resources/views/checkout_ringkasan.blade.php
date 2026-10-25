@extends('layouts.app')

@section('content')
@php
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

            <!-- Tombol Konfirmasi Pesanan COD -->
            <button type="button" class="btn btn-navy-solid w-100 py-2.5 rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#modalKonfirmasiCOD">
                <i class="fa-solid fa-box-archive me-2"></i> Konfirmasi Pesanan COD
            </button>
        </div>
    </div>
</div>

<!-- Modal Pop-Up Notifikasi Pesanan COD -->
<div class="modal fade" id="modalKonfirmasiCOD" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 text-center p-4">
            <div class="modal-body">
                <div class="mb-3">
                    <i class="fa-solid fa-truck-fast text-success display-1"></i>
                </div>
                <h4 class="fw-bold mb-2" style="color: #082052;">Pesanan Berhasil Dibuat!</h4>
                <p class="text-muted mb-3">
                    Terima kasih telah berbelanja di Jilbab Mart. Pesanan kamu sedang diproses oleh tim kami.
                </p>
                
                <div class="p-3 rounded-3 mb-4 text-start" style="background-color: #F8F0E5; color: #082052;">
                    <div class="d-flex align-items-center mb-1">
                        <i class="fa-solid fa-clock me-2"></i>
                        <strong>Estimasi Pengiriman:</strong>
                    </div>
                    <p class="mb-0 ms-4 text-muted small">Kurang lebih <strong>3 Hari Kerja</strong>. Mohon siapkan uang pas sebesar <strong>Rp {{ number_format($totalAkhir, 0, ',', '.') }}</strong> saat kurir tiba.</p>
                </div>

                <!-- Tombol Navigasi Pembeli -->
                <div class="d-grid gap-2">
                    <a href="{{ route('riwayat.index') }}" class="btn btn-navy-solid py-2 rounded-pill fw-bold">
                        <i class="fa-solid fa-clock-rotate-left me-1"></i> Lihat Riwayat Pesanan Saya
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary py-2 rounded-pill fw-bold small">
                        <i class="fa-solid fa-store me-1"></i> Kembali ke Katalog Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection