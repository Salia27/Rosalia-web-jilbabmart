<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kategori');
            $table->json('pilihan_warna');
            $table->json('foto_varian')->nullable();
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->default(50);
            $table->integer('berat_gram')->default(150);
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};