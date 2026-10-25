@extends('layouts.app')

@section('content')
<style>
    /* Smooth Scroll agar berpindah ke katalog secara mulus */
    html {
        scroll-behavior: smooth;
    }

    .hero-banner {
        background: linear-gradient(135deg, #082052 0%, #16387c 100%);
        box-shadow: 0 12px 30px rgba(8, 32, 82, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-cream {
        background-color: #F8F0E5;
        color: #082052;
        font-weight: 700;
        border: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-cream:hover {
        background-color: #ffffff;
        color: #082052;
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .product-card {
        border: 1px solid rgba(8, 32, 82, 0.08);
        border-radius: 18px;
        background: #ffffff;
        transition: all 0.35s ease;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(8, 32, 82, 0.15);
        border-color: #082052;
    }

    .product-img-wrapper {
        position: relative;
        overflow: hidden;
        aspect-ratio: 1 / 1;
        background-color: #f8f9fa;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-img-wrapper img {
        transform: scale(1.08);
    }

    .badge-category {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(8, 32, 82, 0.85);
        backdrop-filter: blur(4px);
        color: #F8F0E5;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 20px;
    }

    .btn-navy-solid {
        background-color: #082052;
        color: #F8F0E5;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-navy-solid:hover {
        background-color: #16387c;
        color: #ffffff;
    }

    .btn-check:checked + .btn-outline-navy {
        background-color: #082052 !important;
        color: #F8F0E5 !important;
        border-color: #082052 !important;
        box-shadow: 0 4px 10px rgba(8, 32, 82, 0.2);
    }

    .btn-outline-navy {
        color: #082052;
        border-color: #082052;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .feature-box {
        background: #ffffff;
        border-radius: 16px;
        padding: 16px 20px;
        border: 1px solid rgba(8, 32, 82, 0.06);
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
</style>

<!-- 1. TAMPILAN DASHBOARD / HERO BANNER UTAMA -->
<div class="p-4 p-md-5 mb-4 rounded-4 hero-banner text-white position-relative overflow-hidden">
    <div class="row align-items-center py-2">
        <div class="col-md-7 z-1">
            <span class="badge rounded-pill px-3 py-2 fw-semibold mb-3 shadow-sm" style="background-color: #F8F0E5; color: #082052;">
                ✨ Luxury & Aesthetic Collection
            </span>
            <h1 class="display-5 fw-bold mb-3" style="letter-spacing: -0.5px; color: #F8F0E5;">
                Tampil Anggun Bersama Jilbab Mart
            </h1>
            <p class="fs-6 mb-4 opacity-90" style="color: #F8F0E5; max-width: 520px; line-height: 1.6;">
                Koleksi pashmina, segi empat, dan bergo pilihan berbahan premium dengan tekstur lembut, adem, dan kenyamanan maksimal.
            </p>

            <!-- TOMBOL MENGARAHKAN LANGSUNG KE KATALOG PRODUK DI BAWAH -->
            <a href="#katalog" class="btn btn-cream px-4 py-2.5 rounded-pill shadow">
                Jelajahi Katalog <i class="fa-solid fa-arrow-down ms-1"></i>
            </a>
        </div>
        <div class="col-md-5 d-none d-md-block text-center z-1">
            <img src="{{ asset('storage/banner-hijab.jpg') }}" 
                 onerror="this.src='{{ asset('storage/bergo maryam.jpg') }}'" 
                 class="img-fluid rounded-4 shadow-lg border border-2 border-white" 
                 alt="Hijab Banner" 
                 style="height: 310px; width: 100%; object-fit: cover;">
        </div>
    </div>
</div>

<!-- Highlight Keunggulan Toko -->
<div class="row g-3 mb-4">
    <div class="col-4">
        <div class="feature-box d-flex align-items-center gap-3">
            <i class="fa-solid fa-gem fs-3" style="color: #082052;"></i>
            <div class="d-none d-md-block">
                <h6 class="fw-bold mb-0" style="color: #082052;">Bahan Premium</h6>
                <small class="text-muted">Lembut & Adem Seharian</small>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="feature-box d-flex align-items-center gap-3">
            <i class="fa-solid fa-truck-fast fs-3" style="color: #082052;"></i>
            <div class="d-none d-md-block">
                <h6 class="fw-bold mb-0" style="color: #082052;">Pengiriman Cepat</h6>
                <small class="text-muted">Bayar COD di Tempat</small>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="feature-box d-flex align-items-center gap-3">
            <i class="fa-solid fa-star fs-3" style="color: #082052;"></i>
            <div class="d-none d-md-block">
                <h6 class="fw-bold mb-0" style="color: #082052;">Kualitas Terjamin</h6>
                <small class="text-muted">Jahitan Rapi Standar Butik</small>
            </div>
        </div>
    </div>
</div>

<!-- Form Pencarian Simpel -->
<div class="card border-0 shadow-sm rounded-4 p-2 p-md-3 mb-5 bg-white">
    <form action="{{ route('home') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-md-9 col-8">
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0 ps-3">
                    <i class="fa-solid fa-magnifying-glass text-muted"></i>
                </span>
                <input type="text" name="search" class="form-control border-start-0 py-2.5 rounded-end" placeholder="Cari nama jilbab impianmu..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-md-3 col-4">
            <button type="submit" class="btn btn-navy-solid w-100 py-2.5 rounded-pill fw-bold shadow-sm">
                <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
            </button>
        </div>
    </form>
</div>

<!-- 2. AREA TARGET KATALOG PRODUK (id="katalog") -->
<div id="katalog" class="mb-5 pt-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #082052;">Katalog Produk Unggulan</h4>
            <p class="text-muted small mb-0">Klik tombol keranjang untuk melihat pilihan warna & detail produk</p>
        </div>
    </div>

    <div class="row g-3 g-md-4">
        @forelse($products as $product)
        @php
            $daftarWarna = is_array($product->pilihan_warna) 
                ? $product->pilihan_warna 
                : (json_decode($product->pilihan_warna, true) ?? []);

            $fotoVarian = is_array($product->foto_varian) 
                ? $product->foto_varian 
                : (json_decode($product->foto_varian, true) ?? []);

            $fotoUtama = asset('storage/' . $product->foto);
        @endphp

        <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card h-100 d-flex flex-column">
                <div class="product-img-wrapper" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                    <img src="{{ $fotoUtama }}" onerror="this.src='{{ asset('storage/bergo maryam.jpg') }}'" alt="{{ $product->nama_produk }}">
                    <span class="badge-category">{{ $product->kategori }}</span>
                </div>
                <div class="p-3 d-flex flex-column flex-grow-1">
                    <h6 class="fw-bold mb-1 text-truncate" style="color: #082052; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                        {{ $product->nama_produk }}
                    </h6>
                    <p class="text-muted small mb-3"><i class="fa-solid fa-palette me-1" style="color: #082052;"></i> {{ count($daftarWarna) }} Warna • {{ $product->berat_gram }}g</p>
                    
                    <div class="mt-auto pt-2 d-flex align-items-center justify-content-between border-top border-light">
                        <div>
                            <span class="text-xs text-muted d-block" style="font-size: 0.7rem;">Harga</span>
                            <span class="fw-bold fs-6" style="color: #082052;">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                        <button type="button" class="btn btn-navy-solid btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px;" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Produk -->
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
                    <div class="modal-header border-0 pb-0" style="background-color: #082052; color: #F8F0E5;">
                        <h5 class="modal-title fw-bold">Detail & Variasi Warna Jilbab</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4 bg-white">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-5 text-center">
                                <div class="p-2 rounded-4 bg-light border">
                                    <img id="modalFotoProduk{{ $product->id }}" 
                                         src="{{ $fotoUtama }}" 
                                         data-default="{{ $fotoUtama }}"
                                         onerror="this.src='{{ asset('storage/bergo maryam.jpg') }}'"
                                         class="img-fluid rounded-3 shadow-sm" 
                                         alt="{{ $product->nama_produk }}" 
                                         style="max-height: 280px; width: 100%; object-fit: cover; transition: opacity 0.2s ease;">
                                </div>
                            </div>
                            
                            <div class="col-md-7">
                                <span class="badge rounded-pill px-3 py-1.5 mb-2" style="background-color: #082052; color: #F8F0E5;">{{ $product->kategori }}</span>
                                <h4 class="fw-bold mb-1" style="color: #082052;">{{ $product->nama_produk }}</h4>
                                <h4 class="fw-extrabold mb-3" style="color: #082052;">Rp {{ number_format($product->harga, 0, ',', '.') }}</h4>
                                <p class="text-muted small mb-3">{{ $product->deskripsi }}</p>

                                <form action="{{ route('checkout.show', $product->id) }}" method="GET">
                                    <div class="mb-3">
                                        <label class="fw-bold small d-block mb-2" style="color: #082052;">🎨 PILIH VARIASI WARNA TERSEDIA:</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @forelse($daftarWarna as $index => $warna)
                                                @php
                                                    $namaFileCustom = $fotoVarian[$warna] ?? null;
                                                    
                                                    $mapBergo = [
                                                        'Dusty Pink' => 'Bergo-pink.jpg',
                                                        'Navy Blue'  => 'Bergo-navy.jpg',
                                                        'Hitam'      => 'Bergo_hitam.jpg',
                                                        'Mocca'      => 'Bergo_Mocca.jpg',
                                                        'Dark Grey'  => 'Bergo_Grey.jpg',
                                                        'Mustard'    => 'Bergo Mustard.jpg',
                                                        'Army'       => 'Bergo_army.jpg'
                                                    ];

                                                    $mapBella = [
                                                        'Grey'       => 'Bella-grey.jpg',
                                                        'Maroon'     => 'Bella-maroon.jpg',
                                                        'Mocca'      => 'Bella-mocca.jpg',
                                                        'Navy'       => 'Bella-navy.jpg',
                                                        'Olive'      => 'Bella-olive.jpg',
                                                        'Putih'      => 'Bella-putih.jpg'
                                                    ];

                                                    if ($namaFileCustom) {
                                                        $urlFoto = asset('storage/' . $namaFileCustom);
                                                    } elseif (isset($mapBergo[$warna])) {
                                                        $urlFoto = asset('storage/' . $mapBergo[$warna]);
                                                    } elseif (isset($mapBella[$warna])) {
                                                        $urlFoto = asset('storage/' . $mapBella[$warna]);
                                                    } else {
                                                        $urlFoto = $fotoUtama;
                                                    }
                                                @endphp

                                                <input type="radio" 
                                                       class="btn-check" 
                                                       name="warna_dipilih" 
                                                       id="modal_warna_{{ $product->id }}_{{ $index }}" 
                                                       value="{{ $warna }}" 
                                                       {{ $loop->first ? 'checked' : '' }} 
                                                       onchange="gantiFotoModal('modalFotoProduk{{ $product->id }}', '{{ $urlFoto }}')">
                                                
                                                <label class="btn btn-outline-navy btn-sm rounded-pill px-3 py-1.5" for="modal_warna_{{ $product->id }}_{{ $index }}">
                                                    🎨 {{ $warna }}
                                                </label>
                                            @empty
                                                <span class="badge bg-light text-dark border">Warna Standar</span>
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <button type="submit" class="btn btn-navy-solid w-100 py-2.5 rounded-pill fw-bold shadow-sm">
                                            Lanjut Pilih Jumlah & Pembelian <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 py-5 text-center">
            <div class="p-5 rounded-4 shadow-sm border text-muted bg-white">
                <i class="fa-solid fa-box-open fs-1 mb-3 d-block" style="color: #082052;"></i>
                <h5 style="color: #082052;">Belum Ada Produk</h5>
                <p class="small mb-0">Silakan tambahkan data produk sampel lewat seeder atau database.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>

<script>
function gantiFotoModal(elementId, urlFoto) {
    const fotoElem = document.getElementById(elementId);
    if (!fotoElem) return;

    fotoElem.style.opacity = '0.3';

    setTimeout(() => {
        if (urlFoto && urlFoto.trim() !== '') {
            fotoElem.src = urlFoto;
        }
        fotoElem.style.opacity = '1';
    }, 120);
}
</script>
@endsection