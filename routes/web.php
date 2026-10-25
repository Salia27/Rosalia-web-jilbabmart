<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Public Routes (Dapat diakses tanpa login)
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/checkout/{id}', [CheckoutController::class, 'show'])->name('checkout.show');

// 2. Customer Routes (Wajib Login untuk transaksi COD)
Route::middleware(['auth'])->group(function () {
     Route::get('/riwayat-pesanan', [CheckoutController::class, 'riwayat'])->name('riwayat.index');
    Route::post('/checkout/ringkasan', [CheckoutController::class, 'ringkasan'])->name('checkout.ringkasan');
    Route::post('/checkout/proses', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/order/{id}', [CheckoutController::class, 'showOrderDetail'])->name('order.detail');
});

// 3. Admin Routes (Khusus Role Admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders');
    Route::patch('/orders/{id}', [OrderAdminController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});

// 4. Dashboard Redirect
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.orders');
    }
    return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';