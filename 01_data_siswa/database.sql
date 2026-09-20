-- ==========================================
-- DATABASE DATA SISWA
-- ==========================================

CREATE DATABASE IF NOT EXISTS `data_siswa`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `data_siswa`;


-- ==========================================
-- TABEL DATA SISWA
-- ==========================================

DROP TABLE IF EXISTS `data_siswa`;

CREATE TABLE `data_siswa` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL,
    kelas VARCHAR(120) NOT NULL,
    jurusan VARCHAR(120) NOT NULL,
    no_hp VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- DATA AWAL
-- ==========================================

INSERT INTO `data_siswa` (
    nama,
    kelas,
    jurusan,
    no_hp
) VALUES (
    'Contoh Nama',
    'XII RPL 3',
    'Rekayasa Perangkat Lunak',
    '081234567890'
);