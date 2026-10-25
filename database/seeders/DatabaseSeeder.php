<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin (Gunakan updateOrCreate agar tidak error jika sudah ada)
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Jilbab Mart',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // 2. Akun Pembeli / Customer
        User::updateOrCreate(
            ['email' => 'pembeli@gmail.com'],
            [
                'name' => 'Pembeli Jilbab Mart',
                'password' => Hash::make('password'), // Password untuk login pembeli: password
                'role' => 'customer',
            ]
        );

        // 3. Data Produk dengan Pilihan Warna & Foto Varian
        $products = [
            [
                'nama_produk' => 'Pashmina Ceruty Baby Doll Premium',
                'kategori' => 'Pashmina',
                'pilihan_warna' => ['Navy Blue', 'Warm Cream', 'Dusty Pink', 'Soft Blue', 'Black', 'Sage Green', 'Mocca', 'Maroon', 'Terracotta'],
                'foto_varian' => [
                    'Navy Blue' => 'pashmina-navy.jpg',
                    'Warm Cream' => 'pashmina-cream.jpg',
                    'Dusty Pink' => 'pashmina-pink.jpg',
                    'Soft Blue' => 'pashmina-birumuda.jpg',
                    'Black' => 'pashmina-hitam.jpg',
                    'Sage Green' => 'pashmina-sage.jpg',
                    'Mocca' => 'pashmina-mocca.jpg',
                    'Maroon' => 'pashmina-maroon.jpg',
                    'Terracotta' => 'pashmina-terracota.jpg',
                ],
                'harga' => 45000,
                'stok' => 100,
                'berat_gram' => 150,
                'deskripsi' => 'Bahan lembut, jatuh, adem, dan sangat mudah dibentuk. Tersedia dalam 10 varian warna estetik.',
                'foto' => 'Pashmina Ceruty Babydoll Premium.jpg'
            ],
            [
                'nama_produk' => 'Jilbab Segi Empat Voal Premium',
                'kategori' => 'Segi Empat',
                'pilihan_warna' => ['Cream', 'Navy Blue', 'Denim Blue', 'Rose Gold', 'Olive', 'Beige', 'White', 'Charcoal'],
                'foto_varian' => [
                    'Cream' => 'voal-cream.jpg',
                    'Navy Blue' => 'voal-navy.jpg',
                    'Denim Blue' => 'voal-denim.jpg',
                    'Rose Gold' => 'voal-pink.jpg',
                    'Olive' => 'voal-olive.jpg',
                    'Beige' => 'voal-beige.jpg',
                    'White' => 'voal-putih.jpg',
                    'Charcoal' => 'voal-charcoal.jpg',
                ],
                'harga' => 38000,
                'stok' => 80,
                'berat_gram' => 120,
                'deskripsi' => 'Tegak di dahi, tidak mudah letoy, dan nyaman dipakai seharian tanpa bikin gerah.',
                'foto' => 'Segiempat Voal.jpg'
            ],
            [
                'nama_produk' => 'Bergo Maryam Diamond Instan',
                'kategori' => 'Bergo',
                'pilihan_warna' => ['Dusty Pink', 'Navy Blue', 'Hitam', 'Mocca', 'Dark Grey', 'Mustard', 'Army'],
                'foto_varian' => [
                    'Dusty Pink' => 'Bergo-pink.jpg',
                    'Navy Blue' => 'Bergo-navy.jpg',
                    'Hitam' => 'Bergo-hitam.jpg',
                    'Mocca' => 'Bergo-Mocca.jpg',
                    'Dark Grey' => 'Bergo-Grey.jpg',
                    'Mustard' => 'Bergo-Mustard.jpg',
                    'Army' => 'Bergo-army.jpg',
                ],
                'harga' => 35000,
                'stok' => 120,
                'berat_gram' => 160,
                'deskripsi' => 'Bergo instan non-pet tali praktis untuk penggunaan sehari-hari di rumah maupun keluar santai.',
                'foto' => 'bergo maryam.jpg'
            ],
            [
                'nama_produk' => 'Pashmina Silk Luxury',
                'kategori' => 'Pashmina',
                'pilihan_warna' => ['Pink', 'Ivory', 'Bronze', 'Biru', 'Black', 'Lilac'],
                'foto_varian' => [
                    'Pink' => 'Silk-Pink.jpg',
                    'Ivory' => 'Silk-Ivory.jpg',
                    'Bronze' => 'Silk-Bronze.jpg',
                    'Biru' => 'Silk-Biru.jpg',
                    'Black' => 'Silk-Hitam.jpg',
                    'Lilac' => 'Silk-Lilac.jpg',
                ],
                'harga' => 58000,
                'stok' => 50,
                'berat_gram' => 140,
                'deskripsi' => 'Kilau mewah elegan cocok untuk pesta, wisuda, dan acara formal.',
                'foto' => 'Pashmina silk.jpg'
            ],
            [
                'nama_produk' => 'Hijab Sport',
                'kategori' => 'Bergo',
                'pilihan_warna' => ['Hitam', 'Navy', 'Dusty Pink', 'Coksu', 'Grey', 'Olive'],
                'foto_varian' => [
                    'Hitam' => 'Sport-hitam.jpg',
                    'Navy' => 'Sport-navy.jpg',
                    'Dusty Pink' => 'Sport-pink.jpg',
                    'Coksu' => 'Sport-coksu.jpg',
                    'Grey' => 'Sport-grey.jpg',
                    'Olive' => 'Sport-olive.jpg',
                ],
                'harga' => 20000,
                'stok' => 70,
                'berat_gram' => 29,
                'deskripsi' => 'Menggunakan bahan jatuh dan pet tebal yang cocok dipakai untuk olahraga dan aktivitas sehari-hari.',
                'foto' => 'Hijab sport.jpg'
            ],
            [
                'nama_produk' => 'Bella Square Prem',
                'kategori' => 'Segi Empat',
                'pilihan_warna' => ['Coksu', 'Navy', 'Putih', 'Mocca', 'Maroon', 'Grey', 'Olive'],
                'foto_varian' => [
                    'Coksu' => 'Bella-coksu.jpg',
                    'Navy' => 'Bella-navy.jpg',
                    'Putih' => 'Bella-putih.jpg',
                    'Mocca' => 'Bella-mocca.jpg',
                    'Maroon' => 'Bella-maroon.jpg',
                    'Grey' => 'Bella-grey.jpg',
                    'Olive' => 'Bella-olive.jpg',
                ],
                'harga' => 25000,
                'stok' => 90,
                'berat_gram' => 110,
                'deskripsi' => 'Bahan premium anti mleyot, tegak paripurna, cocok digunakan untuk berbagai acara.',
                'foto' => 'bella square prem.jpg'
            ],
            [
                'nama_produk' => 'Pashmina Inner',
                'kategori' => 'Pashmina',
                'pilihan_warna' => ['Hitam', 'Maroon', 'Navy', 'Abu', 'Ivory', 'Coklat', 'Putih'],
                'foto_varian' => [
                    'Hitam' => 'Inner-hitam.jpg',
                    'Maroon' => 'Inner-maroon.jpg',
                    'Navy' => 'Inner-navy.jpg',
                    'Abu' => 'Inner-abu.jpg',
                    'Ivory' => 'Inner-ivory.jpg',
                    'Coklat' => 'Inner-coklat.jpg',
                    'Putih' => 'Inner-putih.jpg',
                ],
                'harga' => 35000,
                'stok' => 100,
                'berat_gram' => 140,
                'deskripsi' => 'Pashmina yang sudah menyatu dengan ciput/inner ninja anti ribet.',
                'foto' => 'pashmina inner.jpg'
            ],
            [
                'nama_produk' => 'Paris Jadul',
                'kategori' => 'Segi Empat',
                'pilihan_warna' => ['Coffe', 'Burgundy', 'Maroon', 'Sage', 'Ivory', 'Coklat', 'Biscuit'],
                'foto_varian' => [
                    'Coffe' => 'Jadul-coffe.jpg',
                    'Burgundy' => 'Jadul-burgundy.jpg',
                    'Maroon' => 'Jadul-maroon.jpg',
                    'Sage' => 'Jadul-sage.jpg',
                    'Ivory' => 'Jadul-ivory.jpg',
                    'Coklat' => 'Jadul-coklat.jpg',
                    'Biscuit' => 'Jadul-biscuit.jpg',
                ],
                'harga' => 25000,
                'stok' => 90,
                'berat_gram' => 40,
                'deskripsi' => 'Bahan paris original, ringan, mudah diatur dan tidak menerawang saat dilipat dua.',
                'foto' => 'paris jadul.jpg'
            ]
        ];

        foreach ($products as $product) {
            // Konversi array pilihan_warna ke JSON string
            if (isset($product['pilihan_warna']) && is_array($product['pilihan_warna'])) {
                $product['pilihan_warna'] = json_encode($product['pilihan_warna']);
            }

            // Konversi array foto_varian ke JSON string
            if (isset($product['foto_varian']) && is_array($product['foto_varian'])) {
                $product['foto_varian'] = json_encode($product['foto_varian']);
            }

            Product::create($product);
        }
    }
}