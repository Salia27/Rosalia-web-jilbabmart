<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    // Menampilkan semua transaksi COD masuk
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->get();
        return view('admin.orders', compact('orders'));
    }

    // Mengubah status order (Diproses -> Dikirim -> Selesai)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $order->update([
            'status_order' => $request->status_order,
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}