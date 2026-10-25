@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #082052;">Dashboard Transaksi Admin</h3>
            <p class="text-muted small mb-0">Kelola dan pantau pesanan COD masuk dari pembeli</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #082052; color: #F8F0E5;">
                    <tr>
                        <th class="py-3 px-4">Kode Order</th>
                        <th class="py-3">Pelanggan</th>
                        <th class="py-3">Detail Pesanan</th>
                        <th class="py-3">Total Bayar</th>
                        <th class="py-3">Metode</th>
                        <th class="py-3">Status Order</th>
                        <th class="py-3 text-center">Aksi Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td class="px-4 fw-bold" style="color: #082052;">{{ $order->kode_transaksi ?? $order->kode_order ?? $order->order_code }}</td>
                            
                            <!-- PELANGGAN DINAMIS (Otomatis berubah sesuai pembeli) -->
                            <td>
                                <div class="fw-bold text-dark">
                                    {{ $order->nama_pembeli ?? $order->nama_pemesan ?? $order->nama ?? $order->user->name ?? 'Pembeli Jilbab Mart' }}
                                </div>
                                <small class="text-muted">
                                    {{ $order->email_pembeli ?? $order->email_pemesan ?? $order->email ?? $order->user->email ?? 'pembeli@gmail.com' }}
                                </small>
                            </td>

                            <!-- DETAIL PESANAN -->
                            <td>
                                @if(isset($order->items) && count($order->items) > 0)
                                    @foreach($order->items as $item)
                                        <div class="fw-semibold">{{ $item->product->nama_produk ?? $item->nama_produk ?? 'Jilbab' }}</div>
                                        <small class="text-muted">Varian: {{ $item->warna ?? $item->warna_dipilih ?? '-' }} ({{ $item->qty ?? $item->jumlah ?? 1 }} pcs)</small>
                                    @endforeach
                                @else
                                    <div class="fw-semibold">{{ $order->nama_produk ?? $order->product->nama_produk ?? 'Jilbab Mart' }}</div>
                                    <small class="text-muted">Varian: {{ $order->warna_dipilih ?? $order->warna ?? '-' }} ({{ $order->jumlah ?? 1 }} pcs)</small>
                                @endif
                            </td>

                            <td class="fw-bold" style="color: #082052;">Rp {{ number_format($order->total_bayar ?? $order->total_harga ?? $order->total, 0, ',', '.') }}</td>
                            <td><span class="badge bg-success rounded-pill px-3 py-1">💵 COD</span></td>
                            <td>
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1">{{ ucfirst($order->status_order ?? $order->status) }}</span>
                            </td>
                            <td class="text-center">
                                @php
                                    $st = strtolower($order->status_order ?? $order->status);
                                @endphp

                                @if($st == 'diproses' || $st == 'pending')
                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status_order" value="dikirim">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3 fw-bold">
                                            🚚 Kirim Paket
                                        </button>
                                    </form>
                                @elseif($st == 'dikirim')
                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status_order" value="selesai">
                                        <button type="submit" class="btn btn-success btn-sm rounded-pill px-3 fw-bold">
                                            ✅ Pesanan Selesai
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-1.5">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">Belum ada transaksi masuk dari pembeli.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection