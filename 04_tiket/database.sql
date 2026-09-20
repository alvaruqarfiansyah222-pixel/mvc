-- ==========================================
-- DATABASE TIKET
-- ==========================================

CREATE DATABASE IF NOT EXISTS `04_tiket`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `04_tiket`;


-- ==========================================
-- TABEL TIKETS
-- ==========================================

DROP TABLE IF EXISTS `tikets`;

CREATE TABLE `tikets` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kategori VARCHAR(30) NOT NULL,
    jumlah INT NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- DATA AWAL
-- ==========================================

INSERT INTO `tikets` (
    nama,
    kategori,
    jumlah,
    harga,
    total
) VALUES (
    'Tiket Konser',
    'Konser',
    2,
    25000,
    50000
);