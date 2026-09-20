-- ==========================================
-- DATABASE KASIR
-- ==========================================

CREATE DATABASE IF NOT EXISTS `kasir`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `kasir`;


-- ==========================================
-- TABEL KASIR
-- ==========================================

DROP TABLE IF EXISTS `kasir`;

CREATE TABLE `kasir` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produk VARCHAR(120) NOT NULL,
    kategori VARCHAR(120) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    jumlah INT NOT NULL,
    subtotal DECIMAL(12,2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- DATA AWAL
-- ==========================================

INSERT INTO `kasir` (
    produk,
    kategori,
    harga,
    jumlah,
    subtotal
) VALUES (
    'Contoh Produk',
    'Makanan',
    50000,
    2,
    100000
);