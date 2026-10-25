<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('checkout', compact('product'));
    }

    public function ringkasan(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warna_dipilih' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $jumlah = $request->jumlah;
        $warna = $request->warna_dipilih;
        $ongkir = 10000;
        $subtotal = $product->harga * $jumlah;
        $totalBayar = $subtotal + $ongkir;

        // 1. Simpan Utama ke Tabel Orders
        $order = Order::create([
            'user_id'           => Auth::id(),
            'kode_transaksi'    => 'ORD-' . strtoupper(Str::random(8)),
            'alamat_pengiriman' => 'Alamat Pembeli (COD)',
            'kota_tujuan'       => 'Klaten',
            'kurir'             => 'COD (Kurir Toko)',
            'total_berat_gram'  => 500,
            'subtotal'          => $subtotal,
            'ongkir'            => $ongkir,
            'total_bayar'       => $totalBayar,
            'status_order'      => 'diproses',
            'nomor_resi'        => '-',
        ]);

        // 2. Simpan Rincian Produk ke Tabel OrderItems
        OrderItem::create([
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'warna'      => $warna,
            'qty'        => $jumlah,
            'harga'      => $product->harga,
            'subtotal'   => $subtotal,
        ]);

        $totalHarga = $subtotal;

        return view('checkout_ringkasan', compact('product', 'jumlah', 'warna', 'totalHarga', 'order'));
    }

    public function riwayat()
    {
        // Hanya mengambil 1 transaksi PALING BARU (terakhir) yang dibuat pembeli
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->take(1)
            ->get();

        return view('riwayat', compact('orders'));
    }
}