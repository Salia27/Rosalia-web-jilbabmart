@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #082052;">Status Pesanan Hari Ini</h3>
            <p class="text-muted small mb-0">Pantau transaksi belanja jilbab yang kamu lakukan hari ini</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill btn-sm fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Katalog
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9">
            @forelse($orders as $order)
                <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden bg-white">
                    <!-- Header Kartu Pesanan -->
                    <div class="card-header bg-light border-0 py-3 px-4 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">Kode Transaksi:</span>
                            <span class="fw-bold ms-1" style="color: #082052;">{{ $order->kode_transaksi }}</span>
                            <span class="badge bg-secondary ms-2 small">Hari Ini</span>
                        </div>
                        <div>
                            @php $st = strtolower($order->status_order); @endphp
                            @if($st == 'diproses' || $st == 'pending')
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5">⏳ Sedang Diproses</span>
                            @elseif($st == 'dikirim')
                                <span class="badge bg-primary rounded-pill px-3 py-1.5">🚚 Dalam Pengiriman</span>
                            @else
                                <span class="badge bg-success rounded-pill px-3 py-1.5">✅ Selesai</span>
                            @endif
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <!-- Informasi Estimasi Pengiriman -->
                        <div class="p-3 rounded-3 mb-3" style="background-color: #F8F0E5; color: #082052;">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-truck-fast me-3 fs-4 text-primary"></i>
                                <div>
                                    @if($st == 'diproses' || $st == 'pending')
                                        <strong>Estimasi Pengiriman:</strong>
                                        <div class="small text-muted">Pesananmu yang dibuat hari ini sedang dikemas. Paket diperkirakan sampai dalam <strong>3 Hari Kerja</strong> via COD.</div>
                                    @elseif($st == 'dikirim')
                                        <strong>Status Pengiriman:</strong>
                                        <div class="small text-muted">Paket sedang dalam perjalanan oleh kurir. Mohon siapkan uang pas COD saat kurir tiba.</div>
                                    @else
                                        <strong>Status Pengiriman:</strong>
                                        <div class="small text-muted">Pesanan telah selesai diproses. Terima kasih telah berbelanja di Jilbab Mart!</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Detail Produk -->
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                @foreach($order->items as $item)
                                    <div class="mb-1">
                                        <h6 class="fw-bold mb-0" style="color: #082052;">{{ $item->product->nama_produk ?? 'Jilbab Mart' }}</h6>
                                        <small class="text-muted">Varian Warna: <strong>{{ $item->warna }}</strong> | Jumlah: {{ $item->qty }} pcs</small>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-5 text-md-end mt-3 mt-md-0 border-top border-md-0 pt-2 pt-md-0">
                                <div class="text-muted small">Total Pembayaran (COD):</div>
                                <h5 class="fw-bold mb-0" style="color: #082052;">Rp {{ number_format($order->total_bayar, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                    <i class="fa-solid fa-receipt display-1 text-muted mb-3 d-block"></i>
                    <h5 class="fw-bold text-muted">Belum ada pesanan dibuat hari ini</h5>
                    <p class="text-muted small">Semua transaksi baru yang kamu checkout hari ini akan muncul di sini.</p>
                    <a href="{{ route('home') }}" class="btn btn-navy-solid rounded-pill px-4 fw-bold">Pesan Jilbab Sekarang</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection