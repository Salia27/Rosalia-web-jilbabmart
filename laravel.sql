-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2026 at 07:02 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_19_005453_create_products_table', 1),
(5, '2026_10_19_005513_create_orders_table', 1),
(6, '2026_10_19_005646_add_role_to_users_table', 1),
(7, '2026_10_24_073429_add_warna_to_order_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pengiriman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_berat_gram` int NOT NULL,
  `subtotal` int NOT NULL,
  `ongkir` int NOT NULL,
  `total_bayar` int NOT NULL,
  `status_order` enum('Pending','Diproses','Dikirim','Selesai','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `nomor_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `kode_transaksi`, `alamat_pengiriman`, `kota_tujuan`, `kurir`, `total_berat_gram`, `subtotal`, `ongkir`, `total_bayar`, `status_order`, `nomor_resi`, `created_at`, `updated_at`) VALUES
(1, 2, 'ORD-THPQ8GLJ', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 348000, 10000, 358000, 'Dikirim', '-', '2026-10-24 00:32:44', '2026-10-24 02:41:42'),
(2, 2, 'ORD-KVSXGZ83', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 348000, 10000, 358000, 'Dikirim', '-', '2026-10-24 00:38:46', '2026-10-24 02:26:10'),
(3, 2, 'ORD-LVLNYI82', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 348000, 10000, 358000, 'Dikirim', '-', '2026-10-24 00:42:18', '2026-10-24 02:26:16'),
(4, 2, 'ORD-OQLVKE1R', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 250000, 10000, 260000, 'Diproses', '-', '2026-10-24 22:48:39', '2026-10-24 22:48:39'),
(5, 2, 'ORD-UPVZK6PG', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 405000, 10000, 415000, 'Diproses', '-', '2026-10-25 01:07:37', '2026-10-25 01:07:37'),
(6, 2, 'ORD-J63IXVZG', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 1102000, 10000, 1112000, 'Diproses', '-', '2026-10-25 01:21:11', '2026-10-25 01:21:11'),
(7, 2, 'ORD-RMF1VAPA', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 280000, 10000, 290000, 'Diproses', '-', '2026-10-25 01:38:09', '2026-10-25 01:38:09'),
(8, 2, 'ORD-Q6ZQQDHQ', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 25000, 10000, 35000, 'Diproses', '-', '2026-10-25 01:45:28', '2026-10-25 01:45:28'),
(9, 2, 'ORD-0HB9URSE', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 25000, 10000, 35000, 'Diproses', '-', '2026-10-25 03:59:22', '2026-10-25 03:59:22'),
(10, 2, 'ORD-MXST84VO', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 35000, 10000, 45000, 'Diproses', '-', '2026-10-25 04:27:48', '2026-10-25 04:27:48'),
(11, 2, 'ORD-1OQI2UQR', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 350000, 10000, 360000, 'Diproses', '-', '2026-10-25 04:35:06', '2026-10-25 04:35:06'),
(12, 2, 'ORD-E7BH1AQS', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 360000, 10000, 370000, 'Dikirim', '-', '2026-10-25 07:57:27', '2026-10-25 08:51:58'),
(13, 2, 'ORD-ITLOPC83', 'Alamat Pembeli (COD)', 'Klaten', 'COD (Kurir Toko)', 500, 405000, 10000, 415000, 'Dikirim', '-', '2026-10-25 08:08:45', '2026-10-25 08:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL,
  `harga` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `warna`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'Pink', 6, 58000, 348000, '2026-10-24 00:42:18', '2026-10-24 00:42:18'),
(2, 4, 8, 'Coffe', 10, 25000, 250000, '2026-10-24 22:48:39', '2026-10-24 22:48:39'),
(3, 5, 1, 'Maroon', 9, 45000, 405000, '2026-10-25 01:07:37', '2026-10-25 01:07:37'),
(4, 6, 4, 'Pink', 19, 58000, 1102000, '2026-10-25 01:21:11', '2026-10-25 01:21:11'),
(5, 7, 7, 'Coklat', 8, 35000, 280000, '2026-10-25 01:38:09', '2026-10-25 01:38:09'),
(6, 8, 6, 'Navy', 1, 25000, 25000, '2026-10-25 01:45:28', '2026-10-25 01:45:28'),
(7, 9, 6, 'Grey', 1, 25000, 25000, '2026-10-25 03:59:23', '2026-10-25 03:59:23'),
(8, 10, 7, 'Coklat', 1, 35000, 35000, '2026-10-25 04:27:48', '2026-10-25 04:27:48'),
(9, 11, 3, 'Army', 10, 35000, 350000, '2026-10-25 04:35:06', '2026-10-25 04:35:06'),
(10, 12, 1, 'Mocca', 8, 45000, 360000, '2026-10-25 07:57:27', '2026-10-25 07:57:27'),
(11, 13, 1, 'Maroon', 9, 45000, 405000, '2026-10-25 08:08:45', '2026-10-25 08:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` enum('Menunggu','Valid','Tidak Valid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_warna` json NOT NULL,
  `foto_varian` json DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '50',
  `berat_gram` int NOT NULL DEFAULT '150',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `kategori`, `pilihan_warna`, `foto_varian`, `harga`, `stok`, `berat_gram`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Pashmina Ceruty Baby Doll Premium', 'Pashmina', '\"[\\\"Navy Blue\\\",\\\"Warm Cream\\\",\\\"Dusty Pink\\\",\\\"Soft Blue\\\",\\\"Black\\\",\\\"Sage Green\\\",\\\"Mocca\\\",\\\"Maroon\\\",\\\"Terracotta\\\"]\"', '\"{\\\"Navy Blue\\\":\\\"pashmina-navy.jpg\\\",\\\"Warm Cream\\\":\\\"pashmina-cream.jpg\\\",\\\"Dusty Pink\\\":\\\"pashmina-pink.jpg\\\",\\\"Soft Blue\\\":\\\"pashmina-birumuda.jpg\\\",\\\"Black\\\":\\\"pashmina-hitam.jpg\\\",\\\"Sage Green\\\":\\\"pashmina-sage.jpg\\\",\\\"Mocca\\\":\\\"pashmina-mocca.jpg\\\",\\\"Maroon\\\":\\\"pashmina-maroon.jpg\\\",\\\"Terracotta\\\":\\\"pashmina-terracota.jpg\\\"}\"', 45000.00, 100, 150, 'Bahan lembut, jatuh, adem, dan sangat mudah dibentuk. Tersedia dalam 10 varian warna estetik.', 'Pashmina Ceruty Babydoll Premium.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(2, 'Jilbab Segi Empat Voal Miracle', 'Segi Empat', '\"[\\\"Cream\\\",\\\"Navy Blue\\\",\\\"Denim Blue\\\",\\\"Rose Gold\\\",\\\"Olive\\\",\\\"Beige\\\",\\\"White\\\",\\\"Charcoal\\\"]\"', '\"{\\\"Cream\\\":\\\"voal-cream.jpg\\\",\\\"Navy Blue\\\":\\\"voal-navy.jpg\\\",\\\"Denim Blue\\\":\\\"voal-denim.jpg\\\",\\\"Rose Gold\\\":\\\"voal-pink.jpg\\\",\\\"Olive\\\":\\\"voal-olive.jpg\\\",\\\"Beige\\\":\\\"voal-beige.jpg\\\",\\\"White\\\":\\\"voal-putih.jpg\\\",\\\"Charcoal\\\":\\\"voal-charcoal.jpg\\\"}\"', 38000.00, 80, 120, 'Tegak di dahi, tidak mudah letoy, dan nyaman dipakai seharian tanpa bikin gerah.', 'Segiempat Voal.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(3, 'Bergo Maryam Diamond Instan', 'Bergo', '\"[\\\"Dusty Pink\\\",\\\"Navy Blue\\\",\\\"Hitam\\\",\\\"Mocca\\\",\\\"Dark Grey\\\",\\\"Mustard\\\",\\\"Army\\\"]\"', '\"{\\\"Dusty Pink\\\":\\\"Bergo-pink.jpg\\\",\\\"Navy Blue\\\":\\\"Bergo-navy.jpg\\\",\\\"Hitam\\\":\\\"Bergo-hitam.jpg\\\",\\\"Mocca\\\":\\\"Bergo-Mocca.jpg\\\",\\\"Dark Grey\\\":\\\"Bergo-Grey.jpg\\\",\\\"Mustard\\\":\\\"Bergo-Mustard.jpg\\\",\\\"Army\\\":\\\"Bergo-army.jpg\\\"}\"', 35000.00, 120, 160, 'Bergo instan non-pet tali praktis untuk penggunaan sehari-hari di rumah maupun keluar santai.', 'bergo maryam.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(4, 'Pashmina Silk Luxury', 'Pashmina', '\"[\\\"Pink\\\",\\\"Ivory\\\",\\\"Bronze\\\",\\\"Biru\\\",\\\"Black\\\",\\\"Lilac\\\"]\"', '\"{\\\"Pink\\\":\\\"Silk-Pink.jpg\\\",\\\"Ivory\\\":\\\"Silk-Ivory.jpg\\\",\\\"Bronze\\\":\\\"Silk-Bronze.jpg\\\",\\\"Biru\\\":\\\"Silk-Biru.jpg\\\",\\\"Black\\\":\\\"Silk-Hitam.jpg\\\",\\\"Lilac\\\":\\\"Silk-Lilac.jpg\\\"}\"', 58000.00, 50, 140, 'Kilau mewah elegan cocok untuk pesta, wisuda, dan acara formal.', 'Pashmina silk.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(5, 'Hijab Sport', 'Bergo', '\"[\\\"Hitam\\\",\\\"Navy\\\",\\\"Dusty Pink\\\",\\\"Coksu\\\",\\\"Grey\\\",\\\"Olive\\\"]\"', '\"{\\\"Hitam\\\":\\\"Sport-hitam.jpg\\\",\\\"Navy\\\":\\\"Sport-navy.jpg\\\",\\\"Dusty Pink\\\":\\\"Sport-pink.jpg\\\",\\\"Coksu\\\":\\\"Sport-coksu.jpg\\\",\\\"Grey\\\":\\\"Sport-grey.jpg\\\",\\\"Olive\\\":\\\"Sport-olive.jpg\\\"}\"', 20000.00, 70, 29, 'Menggunakan bahan jatuh dan pet tebal yang cocok dipakai untuk olahraga dan aktivitas sehari-hari.', 'Hijab sport.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(6, 'Bella Square Prem', 'Segi Empat', '\"[\\\"Coksu\\\",\\\"Navy\\\",\\\"Putih\\\",\\\"Mocca\\\",\\\"Maroon\\\",\\\"Grey\\\",\\\"Olive\\\"]\"', '\"{\\\"Coksu\\\":\\\"Bella-coksu.jpg\\\",\\\"Navy\\\":\\\"Bella-navy.jpg\\\",\\\"Putih\\\":\\\"Bella-putih.jpg\\\",\\\"Mocca\\\":\\\"Bella-mocca.jpg\\\",\\\"Maroon\\\":\\\"Bella-maroon.jpg\\\",\\\"Grey\\\":\\\"Bella-grey.jpg\\\",\\\"Olive\\\":\\\"Bella-olive.jpg\\\"}\"', 25000.00, 90, 110, 'Bahan premium anti mleyot, tegak paripurna, cocok digunakan untuk berbagai acara.', 'bella square prem.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(7, 'Pashmina Inner', 'Pashmina', '\"[\\\"Hitam\\\",\\\"Maroon\\\",\\\"Navy\\\",\\\"Abu\\\",\\\"Ivory\\\",\\\"Coklat\\\",\\\"Putih\\\"]\"', '\"{\\\"Hitam\\\":\\\"Inner-hitam.jpg\\\",\\\"Maroon\\\":\\\"Inner-maroon.jpg\\\",\\\"Navy\\\":\\\"Inner-navy.jpg\\\",\\\"Abu\\\":\\\"Inner-abu.jpg\\\",\\\"Ivory\\\":\\\"Inner-ivory.jpg\\\",\\\"Coklat\\\":\\\"Inner-coklat.jpg\\\",\\\"Putih\\\":\\\"Inner-putih.jpg\\\"}\"', 35000.00, 100, 140, 'Pashmina yang sudah menyatu dengan ciput/inner ninja anti ribet.', 'pashmina inner.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(8, 'Paris Jadul', 'Segi Empat', '\"[\\\"Coffe\\\",\\\"Burgundy\\\",\\\"Maroon\\\",\\\"Sage\\\",\\\"Ivory\\\",\\\"Coklat\\\",\\\"Biscuit\\\"]\"', '\"{\\\"Coffe\\\":\\\"Jadul-coffe.jpg\\\",\\\"Burgundy\\\":\\\"Jadul-burgundy.jpg\\\",\\\"Maroon\\\":\\\"Jadul-maroon.jpg\\\",\\\"Sage\\\":\\\"Jadul-sage.jpg\\\",\\\"Ivory\\\":\\\"Jadul-ivory.jpg\\\",\\\"Coklat\\\":\\\"Jadul-coklat.jpg\\\",\\\"Biscuit\\\":\\\"Jadul-biscuit.jpg\\\"}\"', 25000.00, 90, 40, 'Bahan paris original, ringan, mudah diatur dan tidak menerawang saat dilipat dua.', 'paris jadul.jpg', '2026-10-23 20:08:13', '2026-10-23 20:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BezEHtzAW0gUcIWsALCUMCp7XE8ijZPvdliPe7SG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJNMDRqeUNJSmxva2lEMW8wQ1hkbkhCRjJ4aFpLUThsSU8xVmdZUVhFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jaGVja291dFwvNT93YXJuYV9kaXBpbGloPUNva3ByYW0iLCJyb3V0ZSI6ImNoZWNrb3V0LnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvY2hlY2tvdXRcLzU/d2FybmFfZGlwaWxpaD1Db2twcmFtIn19', 1792811637);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Jilbab Mart', 'admin@gmail.com', 'admin', NULL, '$2y$12$0jy9qwPpOX5kp.THrLd3quSRfBbd3ZglvKhDmgd18q03jHc2lpuSK', NULL, '2026-10-23 20:08:13', '2026-10-23 20:08:13'),
(2, 'Pembeli Jilbab Mart', 'pembeli@gmail.com', 'customer', NULL, '$2y$12$qCq0gIodYESH08awn63Xp.fb9oHLrJMaoPyccLtkYyGYwR3O.0uYS', NULL, '2026-10-23 20:08:13', '2026-10-23 20:08:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
