<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'kategori',
        'pilihan_warna',
        'harga',
        'stok',
        'berat_gram',
        'deskripsi',
        'foto',
    ];

    // MENGUBAH ARRAY KE JSON SAAT DISIMPAN KE DATABASE
    protected $casts = [
        'pilihan_warna' => 'array',
        'foto_varian' => 'array',
    ];
}