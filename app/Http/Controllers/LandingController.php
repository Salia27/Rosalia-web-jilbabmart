<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Fitur Pencarian Nama Produk
        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Fitur Filter Warna
        if ($request->filled('warna')) {
            $query->whereJsonContains('pilihan_warna', $request->warna);
        }

        $products = $query->latest()->get();

        return view('landing', compact('products'));
    }
}