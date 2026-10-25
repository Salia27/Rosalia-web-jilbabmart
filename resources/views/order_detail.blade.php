@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between">
        <span class="fw-bold">Detail Pesanan #{{ $order->kode_transaksi }}</span>
        <span class="badge bg-info text-dark">{{ $order->status_order }}</span>
    </div>
    <div class="card-body">
        <h5>Rincian Biaya</h5>
        <table class="table">
            <tr>
                <td>Subtotal Produk</td>
                <td class="text-end">Rp {{ number_format($order->subtotal) }}</td>
            </tr>
            <tr>
                <td>Ongkos Kirim ({{ $order->total_berat_gram }}g ke {{ $order->kota_tujuan }})</td>
                <td class="text-end">Rp {{ number_format($order->ongkir) }}</td>
            </tr>
            <tr class="fw-bold">
                <td>Total Tagihan</td>
                <td class="text-end text-danger">Rp {{ number_format($order->total_bayar) }}</td>
            </tr>
        </table>

        @if($order->nomor_resi)
            <div class="alert alert-success mt-3">
                <strong>Nomor Resi Kurir ({{ $order->kurir }}):</strong> {{ $order->nomor_resi }}
            </div>
        @endif

        <hr>

        <h5>Upload Bukti Transfer</h5>
        <p class="small text-muted">Silakan transfer ke rekening Bank BCA: <strong>1234-5678-90</strong> a/n Jilbab Mart.</p>
        
        @if($order->payment)
            <p>Status Verifikasi: <span class="badge bg-secondary">{{ $order->payment->status_verifikasi }}</span></p>
            <img src="{{ asset('storage/' . $order->payment->bukti_transfer) }}" class="img-thumbnail" style="max-width: 200px">
        @else
            <form action="{{ route('order.upload_payment', $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="bukti_transfer" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Upload Bukti</button>
            </form>
        @endif
    </div>
</div>
@endsection