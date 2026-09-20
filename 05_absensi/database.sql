CREATE DATABASE IF NOT EXISTS `absensi` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `absensi`;
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL, kelas VARCHAR(120) NOT NULL, tanggal DATE NOT NULL, status VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `absensi` (nama, kelas, tanggal, status) VALUES ('Contoh Nama', 'Contoh', '2026-09-19', 'Hadir');
