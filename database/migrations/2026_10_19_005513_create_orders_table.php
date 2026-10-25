<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('kode_transaksi')->unique();
            $table->text('alamat_pengiriman');
            $table->string('kota_tujuan');
            $table->string('kurir');
            $table->integer('total_berat_gram');
            $table->integer('subtotal');
            $table->integer('ongkir');
            $table->integer('total_bayar');
            $table->enum('status_order', ['Pending', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'])->default('Pending');
            $table->string('nomor_resi')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('bukti_transfer');
            $table->enum('status_verifikasi', ['Menunggu', 'Valid', 'Tidak Valid'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};