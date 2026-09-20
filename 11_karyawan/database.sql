-- ==========================================
-- DATABASE KARYAWAN
-- ==========================================

CREATE DATABASE IF NOT EXISTS `karyawan`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `karyawan`;

-- Hapus tabel jika sudah ada
DROP TABLE IF EXISTS `karyawan`;

-- ==========================================
-- TABEL KARYAWAN
-- ==========================================

CREATE TABLE `karyawan` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL,
    jabatan VARCHAR(120) NOT NULL,
    gaji DECIMAL(12,2) NOT NULL,
    status VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==========================================
-- DATA CONTOH
-- ==========================================

INSERT INTO `karyawan` (
    nama,
    jabatan,
    gaji,
    status
) VALUES (
    'Contoh Nama',
    'Staff',
    50000,
    'Tetap'
);