-- ==========================================
-- DATABASE DATA GURU
-- ==========================================

CREATE DATABASE IF NOT EXISTS `data_guru`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `data_guru`;


-- ==========================================
-- TABEL DATA GURU
-- ==========================================

DROP TABLE IF EXISTS `data_guru`;

CREATE TABLE `data_guru` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL,
    nip VARCHAR(120) NOT NULL,
    mapel VARCHAR(120) NOT NULL,
    no_hp VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- DATA AWAL
-- ==========================================

INSERT INTO `data_guru` (
    nama,
    nip,
    mapel,
    no_hp
) VALUES (
    'Contoh Nama',
    '198001012020011001',
    'Pemrograman Web',
    '081234567890'
);