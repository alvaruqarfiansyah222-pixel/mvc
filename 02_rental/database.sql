-- ==========================================
-- DATABASE RENTAL
-- ==========================================

CREATE DATABASE IF NOT EXISTS `02_rental`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `02_rental`;


-- ==========================================
-- TABEL RENTALS
-- ==========================================

DROP TABLE IF EXISTS `rentals`;

CREATE TABLE `rentals` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    barang VARCHAR(50) NOT NULL,
    lama INT NOT NULL,
    jumlah INT NOT NULL,
    harga_per_hari DECIMAL(12,2) NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- DATA AWAL
-- ==========================================

INSERT INTO `rentals` (
    nama,
    barang,
    lama,
    jumlah,
    harga_per_hari,
    total
) VALUES (
    'Contoh Nama',
    'Laptop',
    2,
    1,
    50000,
    100000
);