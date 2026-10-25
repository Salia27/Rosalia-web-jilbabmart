@extends('layouts.app')

@section('content')
<div class="row g-4 justify-content-center">
    <!-- Kolom Kiri: Detail Produk & Foto Dinamis -->
    <div class="col-md-5">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            <!-- Foto Produk yang Bisa Berubah Otomatis -->
            <img id="fotoProduk" 
                 src="{{ asset('storage/' . $product->foto) }}" 
                 data-default="{{ asset('storage/' . $product->foto) }}"
                 onerror="this.src='https://images.unsplash.com/photo-1609357605129-26f69add5d6e?auto=format&fit=crop&w=600&q=80'" 
                 class="img-fluid" 
                 alt="{{ $product->nama_produk }}" 
                 style="height: 380px; width: 100%; object-fit: cover; transition: all 0.3s ease;">
            
            <div class="card-body p-4">
                <span class="badge rounded-pill mb-2 px-3 py-1.5" style="background-color: #082052; color: #F8F0E5;">{{ $product->kategori }}</span>
                <h4 class="fw-bold mb-2" style="color: #082052;">{{ $product->nama_produk }}</h4>
                <h3 class="fw-extrabold mb-3" style="color: #082052;">Rp {{ number_format($product->harga, 0, ',', '.') }}</h3>
                <p class="text-muted small mb-0">{{ $product->deskripsi }}</p>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Pilihan Warna & Jumlah -->
    <div class="col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <h5 class="fw-bold mb-3" style="color: #082052;">Pilih Varian & Jumlah</h5>
            
            <form action="{{ route('checkout.ringkasan') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Pilih Warna Hijab -->
                <div class="mb-4">
                    <label class="fw-bold mb-2 d-block small text-muted">1. PILIH VARIASI WARNA HIJAB:</label>
                    <div class="d-flex flex-wrap gap-2">
                        @php
                            // Decode pilihan warna
                            $daftarWarna = is_array($product->pilihan_warna) 
                                ? $product->pilihan_warna 
                                : (json_decode($product->pilihan_warna, true) ?? []);

                            // Decode foto varian warna
                            $fotoVarian = is_array($product->foto_varian) 
                                ? $product->foto_varian 
                                : (json_decode($product->foto_varian, true) ?? []);
                        @endphp

                        @forelse($daftarWarna as $key => $warna)
                            @php 
                                $namaFile = $fotoVarian[$warna] ?? null;
                                $urlFoto = $namaFile ? asset('storage/' . $namaFile) : ''; 
                            @endphp

                            <input type="radio" class="btn-check" name="warna_dipilih" id="warna_{{ $key }}" value="{{ $warna }}" 
                                   {{ $loop->first ? 'checked' : '' }} 
                                   onchange="gantiFotoWarna('{{ $urlFoto }}')" required>

                            <label class="btn btn-outline-dark rounded-pill px-3 py-2 small fw-semibold" for="warna_{{ $key }}">
                                🎨 {{ $warna }}
                            </label>
                        @empty
                            <span class="text-muted small">Warna standar</span>
                        @endforelse
                    </div>
                </div>

                <!-- Jumlah Beli -->
                <div class="mb-4">
                    <label class="fw-bold mb-1 small text-muted">2. JUMLAH (QTY):</label>
                    <input type="number" name="jumlah" class="form-control rounded-pill px-3" value="1" min="1" max="{{ $product->stok }}" required>
                </div>

                <button type="submit" class="btn btn-navy-solid w-100 py-2.5 fs-6 fw-bold">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Masukkan ke Keranjang & Lanjut
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript untuk Penggantian Foto Dinamis -->
<script>
function gantiFotoWarna(urlFotoVarian) {
    const fotoElem = document.getElementById('fotoProduk');
    const fotoDefault = fotoElem.getAttribute('data-default');
    
    fotoElem.style.opacity = '0.3';
    
    setTimeout(() => {
        if (urlFotoVarian && urlFotoVarian.trim() !== "") {
            fotoElem.src = urlFotoVarian;
        } else {
            fotoElem.src = fotoDefault;
        }
        fotoElem.style.opacity = '1';
    }, 150);
}

// Otomatis aktifkan varian warna pertama saat halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
    const checkedRadio = document.querySelector('input[name="warna_dipilih"]:checked');
    if (checkedRadio) {
        checkedRadio.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection